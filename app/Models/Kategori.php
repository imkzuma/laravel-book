<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
  use HasFactory;

  protected $table = 'tb_kategori';

  protected $fillable = [
    'nama_kategori'
  ];

  public $timestamps = false;

  public function buku()
  {
    return $this->hasMany(Buku::class, 'id_kategori');
  }
}
