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
        $satuan = Model::find($id);
        return view(self::$folder.'satuan-edit', compact('satuan'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'kode' => 'required|max:30|unique:satuan,kode',
            'nama' => 'required|max:20'
        ]);

        $satuan = new Model();
        $satuan->kode = $request->kode;
        $satuan->nama = $request->nama;
        $satuan->save();

        return redirect()->route('satuan.list')->with('success','Satuan Berhasil Tersimpan');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'kode' => "required|max:30|unique:satuan,kode,$id",
            'nama' => 'required|max:20'
        ]);
        $satuan = Model::find($id);
        $satuan->kode = $request->kode;
        $satuan->nama = $request->nama;
        $satuan->save();

        return redirect()->route('satuan.list')->with('success',' Satuan Berhasil Diubah');
    }

    public function destroy($id)
    {
        $satuan = Model::find($id);
        $satuan->delete();

        return redirect()->route('satuan.list')->with('success','Satuan Berhasil Terhapus');
    }
}
