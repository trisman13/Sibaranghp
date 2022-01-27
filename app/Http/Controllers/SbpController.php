<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\SuratBuktiPenindakan;

class SbpController extends Controller
{
    public function index()
    {
        $sbp = SuratBuktiPenindakan::all();
        return view('layouts.contents.SBP.sbp-list', compact('sbp'));
    }

    public function trash()
    {
        $sbp = SuratBuktiPenindakan::onlyTrashed()->get();
        return view('layouts.contents.SBP.sbp-trash', compact('sbp'));
    }

    public function create()
    {
        return view('layouts.contents.SBP.sbp-create');
    }

    public function show($id)
    {
        $sbp = SuratBuktiPenindakan::find($id);
        return view('layouts.contents.SBP.sbp-edit', compact('sbp'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nomor_surat' => 'required|max:30|unique:surat_bukti_penindakan,nomor_surat',
            'tanggal_keluar_surat' => 'required|date|max:20'
        ]);

        $sbp = new SuratBuktiPenindakan();
        $sbp->nomor_surat = $request->nomor_surat;
        $sbp->tanggal_keluar_surat = $request->tanggal_keluar_surat;
        $sbp->save();

        return redirect()->route('sbp-list')->with('success','Surat Bukti Penindakan Berhasil Tersimpan');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nomor_surat' => "required|max:30|unique:surat_bukti_penindakan,nomor_surat,$id",
            'tanggal_keluar_surat' => 'required|date|max:20'
        ]);
        $sbp = SuratBuktiPenindakan::find($id);
        $sbp->nomor_surat = $request->nomor_surat;
        $sbp->tanggal_keluar_surat = $request->tanggal_keluar_surat;
        $sbp->save();

        return redirect()->route('sbp-list')->with('success','Surat Bukti Penindakan Berhasil Diubah');
    }

    public function destroy($id)
    {
        $sbp = SuratBuktiPenindakan::find($id);
        $sbp->delete();

        return redirect()->route('sbp-list')->with('success','Surat Bukti Penindakan Berhasil Terhapus');
    }

    public function destroyPermanen($id)
    {
        $sbp = SuratBuktiPenindakan::onlyTrashed()->find($id)->forceDelete();

        return redirect()->back()->with('success','Surat Bukti Penindakan Berhasil Terhapus Permanen');
    }

    public function restore($id)
    {
        $sbp = SuratBuktiPenindakan::onlyTrashed()->find($id)->restore();

        return redirect()->back()->with('success','Surat Bukti Penindakan Berhasil dikembalikan');
    }
}
