<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Satuan as Model;

class SatuanController extends Controller
{
    private static $folder = 'layouts.contents.satuan.';

    public function index()
    {
        $data = Model::all();
        return view(self::$folder.'satuan-list', compact('data'));
    }

    public function create()
    {
        return view(self::$folder.'satuan-create');
    }

    public function show($id)
    {
        $data = Model::find($id);
        return view(self::$folder.'satuan-edit', compact('data'));
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

        return redirect()->route('satuan-list')->with('success','Surat Bukti Penindakan Berhasil Tersimpan');
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
}
