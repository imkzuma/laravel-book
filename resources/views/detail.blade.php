@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
<div class="container py-4 px-3 px-lg-0">
  <div class="vstack gap-4">
    <a href="{{ route('index') }}"
      class="btn d-flex ps-0 gap-3 align-items-center" 
      style="width: fit-content"
    >
      <i class="fa-solid fa-chevron-left"></i>
      Kembali
    </a>

    <h4 class="fw-semibold text-center text-md-start">
      Detail Buku
    </h4>
    <div class="row gap-lg-3">
      <div class="col-md-7 col-lg-4">
        <img 
          src="data:image/*;base64,{{base64_encode($buku->sampul)}}"
          class="img-fluid rounded w-100" 
          alt="{{ $buku->judul }}"
        >
      </div>
      <div class="col-md-5 col-lg-4">
        <div class="vstack py-4 py-lg-0 gap-4">
          <div class="form-group">
            <label class="form-label">Judul</label>
            <input type="text" class="form-control" value="{{ $buku->judul }}" readonly disabled>
          </div>

          <div class="form-group">
            <label class="form-label">Tahun Rilis</label>
            <input type="date" class="form-control" value="{{ $buku->tahun }}" readonly disabled>
          </div>
          
          <div class="form-group">
            <label class="form-label">Kategori</label>
            <input type="text" class="form-control" value="{{ $buku->kategori->nama_kategori }}" readonly disabled>
          </div>

          <div class="form-group">
            <label class="form-label">Pengarang</label>
            <input type="text" class="form-control" value="{{ $buku->pengarang->nama_pengarang }}" readonly disabled>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection