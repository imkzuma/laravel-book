<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pengarang;
use Illuminate\Http\Request;

class BukuController extends Controller
{
  private $pagination = 10;

  public function index(Request $request)
  {
    $keyword = $request->input('keyword');
    
    if(!$keyword){
      $bukus = Buku::with('kategori', 'pengarang')->paginate($this->pagination);
      return view('index', compact('bukus'));
    }

    $bukus = Buku::with('kategori', 'pengarang')
      ->where('judul', 'LIKE', "%$keyword%") // keyword sesuai dengan judul
      ->orWhere('tahun', 'LIKE', "%$keyword%") // keyword sesuai dengan tahun
      ->orWhereHas('kategori', function ($query) use ($keyword) { // keyword sesuai dengan nama kategori
        $query->where('nama_kategori', 'LIKE', "%$keyword%");
      })
      ->orWhereHas('pengarang', function ($query) use ($keyword) { // keyword sesuai dengan nama pengarang
        $query->where('nama_pengarang', 'LIKE', "%$keyword%");
      })
      ->paginate($this->pagination);
      
    return view('index', compact('bukus', 'keyword'));
  }

  public function DashboardIndex(Request $request)
  {
    $sortField = $request->input('sort', 'id');
    $sortOrder = $request->input('order', 'asc');

    $bukus = Buku::orderBy($sortField, $sortOrder)->paginate($this->pagination);

    return view('dashboard.index', compact('bukus', 'sortField', 'sortOrder'));
  }

  public function PublicDetail($id)
  {
    $buku = Buku::with('kategori', 'pengarang')->findOrFail($id);
    return view('detail', compact('buku'));
  }

  public function DashboardDetail($id)
  {
    $buku = Buku::with('kategori', 'pengarang')->findOrFail($id);
    $kategoris =  Kategori::all();
    
    return view('dashboard.detail', compact('buku', 'kategoris'));
  }

  public function store(Request $request)
  {
    if ($request->hasFile('sampul')) {

      $image = $request->file('sampul');
      $imageData = file_get_contents($image->getRealPath());

      $nama_pengarang = strtolower($request->nama_pengarang);
      $pengarang = Pengarang::whereRaw('LOWER(nama_pengarang) = ?', [$nama_pengarang])->first();

      if (!$pengarang) {
        $newPengarang = Pengarang::create([
          'nama_pengarang' => $request->nama_pengarang
        ]);
        $id_pengarang = $newPengarang->id;
      } else {
        $id_pengarang = $pengarang->id;
      }

      Buku::create([
        'sampul' => $imageData,
        'judul' => $request->judul,
        'tahun' => $request->tahun,
        'id_kategori' => $request->id_kategori,
        'id_pengarang' => $id_pengarang,
      ]);

      Alert::success('Sukses', 'Buku berhasil ditambahkan', 'success');
    } else {
      Alert::error('Failed', 'Tidak ada gambar yang diunggah.', 'error');
    }

    return redirect()->back();
  }

  public function update(Request $request)
  {
    $buku = Buku::findOrFail($request->id);

    if ($request->hasFile('sampul')) {

      $image = $request->file('sampul');
      $imageData = file_get_contents($image->getRealPath());

      $buku->sampul = $imageData;
    }

    $pengarang = Pengarang::whereRaw('LOWER(nama_pengarang) = ?', [strtolower($request->pengarang)])->first();
    if(!$pengarang){
      $newPengarang = Pengarang::create([
        'nama_pengarang' => $request->pengarang
      ]);
      $id_pengarang = $newPengarang->id;
    }else{
      $id_pengarang = $pengarang->id;
    }

    $buku->judul = $request->judul;
    $buku->tahun = $request->tahun;
    $buku->id_kategori = $request->id_kategori;
    $buku->id_pengarang = $id_pengarang;
    $buku->save();

    Alert::success('Sukses', 'Buku berhasil diubah', 'success');
    return redirect()->back();
  }

  public function delete($id)
  {
    $buku = Buku::findOrFail($id);
    $buku->delete();

    Alert::success('Sukses', 'Buku berhasil dihapus', 'success');
    return redirect()->back();
  }
}
