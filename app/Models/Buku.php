<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
  use HasFactory;

  protected $table = 'tb_buku';

  protected $fillable = [
    'judul',
    'sampul',
    'tahun',
    'id_kategori',
    'id_pengarang',
  ];

  public function kategori()
  {
    return $this->belongsTo(Kategori::class, 'id_kategori');
  }

  public function pengarang()
  {
    return $this->belongsTo(Pengarang::class, 'id_pengarang');
  }
}
