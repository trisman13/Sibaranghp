<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratBuktiPenindakan as Model;
use App\Models\Satuan;

class SbpController extends Controller
{
    private static $folder = 'layouts.contents.SBP.';

    public function index()
    {
        $sbp = Model::all();
        return view(self::$folder.'sbp-list', compact('sbp'));
    }

    public function trash()
    {
        $sbp = Model::onlyTrashed()->get();
        return view(self::$folder.'sbp-trash', compact('sbp'));
    }

    public function create()
    {
        $satuan = satuan::all();
        return view(self::$folder.'sbp-create', compact('satuan'));
    }

    public function show($id)
    {
        $sbp = SuratBuktiPenindakan::find($id);
        return view('sbp-edit', compact('sbp'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nomor_surat' => 'required|max:30|unique:surat_bukti_penindakan,nomor_surat',
            'tanggal_keluar_surat' => 'required|date|max:20'
        ]);

        $sbp = new Model();
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
        $sbp = Model::find($id);
        $sbp->nomor_surat = $request->nomor_surat;
        $sbp->tanggal_keluar_surat = $request->tanggal_keluar_surat;
        $sbp->save();

        return redirect()->route('sbp-list')->with('success','Surat Bukti Penindakan Berhasil Diubah');
    }

    public function destroy($id)
    {
        $sbp = Model::find($id);
        $sbp->delete();

        return redirect()->route('sbp-list')->with('success','Surat Bukti Penindakan Berhasil Terhapus');
    }

    public function destroyPermanen($id)
    {
        $sbp = Model::onlyTrashed()->find($id)->forceDelete();

        return redirect()->back()->with('success','Surat Bukti Penindakan Berhasil Terhapus Permanen');
    }

    public function restore($id)
    {
        $sbp = Model::onlyTrashed()->find($id)->restore();

        return redirect()->back()->with('success','Surat Bukti Penindakan Berhasil dikembalikan');
    }
}
