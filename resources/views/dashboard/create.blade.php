@extends('layouts.dashboard')

@section('title', 'Tambah Buku')

@section('content')
<div class="row justify-content-md-center">
  <div class="col-md-6 col-lg-4 py-5">
    <h3 class="fw-semibold pb-3 text-start text-md-center">
      Tambah Buku
    </h3>
    <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data" class="vstack gap-3">
      @csrf
      <div class="form-group">
        <label class="form-label">Judul</label>
        <input type="text" class="form-control" name="judul" required />
      </div>

      <div class="form-group">
        <label class="form-label">Sampul</label>
        <input type="file" class="form-control" name="sampul" required />
      </div>

      <div class="form-group">
        <div class="d-flex justify-content-between align-items-center">
          <label class="form-label my-auto">Kategori</label>
          
          <a href="{{ route('dashboard.kategori') }}"
            class="fs-6 d-flex justify-content-end gap-2 py-1 link-underline link-underline-opacity-0"
            target="_blank"
          >
            Tambah kategori baru
          </a>
        </div>

        <select name="id_kategori" class="form-control" required>
          <option value="" selected disabled>Pilih Kategori</option>
          @foreach ($kategoris as $kategori )
            <option option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>          
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label class="form-label">Tahun Rilis</label>
        <input type="date" class="form-control" name="tahun" required />
      </div>

      <div class="form-group">
        <label class="form-label">Penulis</label>
        <input type="text" class="form-control" name="nama_pengarang" required />
      </div>
  
      <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('dashboard.index') }}" class="btn btn-outline-danger">
          Cancel
        </a>
        <button type="submit" class="btn btn-primary">
          Tambah Buku
        </button>
      </div>

    </form>
  </div>
</div>
@endsection