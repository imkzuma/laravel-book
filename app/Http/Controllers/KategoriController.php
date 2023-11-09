<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
  public function index()
  {
    return view('dashboard.kategori.index');
  }
  
  public function store(Request $request)
  {
    $nama_kategori = $request->nama_kategori;
    $kategori = Kategori::where('nama_kategori', $nama_kategori)->first();

    if ($kategori) {
      Alert::error('Gagal', 'Kategori Sudah Ada');
      return redirect()->back();
    }

    Kategori::create([
      'nama_kategori' => $nama_kategori
    ]);
    Alert::success('Berhasil', 'Kategori Berhasil Ditambahkan');

    return redirect()->back();
  }

  public function GetKategori()
  {
    $kategoris = Kategori::all();
    return view('dashboard.create', compact('kategoris'));
  }
}
