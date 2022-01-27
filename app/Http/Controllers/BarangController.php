<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    private static $folder = 'layouts.contents.barang.';

    public function index()
    {
        $barang = Barang::all();
        return view(self::$folder.'barang-list', compact('barang'));
    }

    public function trash()
    {
        $barang = Barang::onlyTrashed()->get();
        return view(self::$folder.'barang-trash', compact('barang'));
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return redirect()->back()->with('success', 'Barang Berhasil Terhapus.');
    }

    public function destroyPermanent($id)
    {
        $barang = Barang::onlyTrashed()->find($id);
        $barang->forceDelete();

        return redirect()->back()->with('success', 'Barang Berhasil Dihapus Permanen.');
    }

    public function restore($id)
    {
        $barang = Barang::onlyTrashed()->find($id);
        $barang->restore();

        return redirect()->back()->with('success', 'Barang Berhasil Dikembalikan.');
    }
}
