@extends('layouts.dashboard')

@section('title', 'Kategori')

@section('content')

<div class="row justify-content-md-center">
  <div class="col-md-6 col-lg-4 py-5">
  <div class="py-4 vstack gap-4">
    <a href="{{ route('dashboard.index') }}"
      class="btn d-flex ps-0 gap-3 align-items-center" 
      style="width: fit-content"
    >
      <i class="fa-solid fa-chevron-left"></i>
      Kembali
    </a>

    <h4 class="fw-semibold">Buat Kategori</h4>

    <form action="{{ route('dashboard.kategori') }}" method="POST" class="vstack gap-3">
      @csrf
      <div class="form-group">
        <label class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" name="nama_kategori" required />
      </div>

      <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('dashboard.index') }}" class="btn btn-outline-danger">
          Cancel
        </a>
        <button type="submit" class="btn btn-primary">
          Tambah Kategori
        </button>
      </div>
    </form>
  </div>
  </div>
      
@endsection