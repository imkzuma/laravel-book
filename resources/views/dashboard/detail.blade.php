@extends('layouts.dashboard')

@section('title', 'Detail Buku')

@section('content')
  <div class="py-4 vstack gap-4">
    <a href="{{ route('dashboard.index') }}"
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
          class="img-fluid rounded" 
          alt="{{ $buku->judul }}"
        >
      </div>
      <form action="{{ route('dashboard.update', $buku->id) }}" method="POST" enctype="multipart/form-data" class="col-md-5 col-lg-4">
        @csrf
        @method('PUT')
        <div class="vstack py-4 py-lg-0 gap-4">
          <h5 class="fw-semibold">
            Edit Buku
          </h5>
          <div class="form-group">
            <label class="form-label">Judul</label>
            <input type="text" class="form-control" value="{{ $buku->judul }}" name="judul">
          </div>

          <div class="form-group">
            <label class="form-label">Sampul</label>
            <input type="file" class="form-control" value="{{ $buku->sampul }}" name="sampul">
          </div>

          <div class="form-group">
            <label class="form-label">Tahun Rilis</label>
            <input type="date" class="form-control" value="{{ $buku->tahun }}" name="tahun">
          </div>
          
          <div class="form-group">
            <label class="form-label">Kategori</label>
            <select name="id_kategori" class="form-control" required>
              <option value="{{$buku->kategori['id']}}" selected>
                {{$buku->kategori['nama_kategori']}}
              </option>
              @foreach ($kategoris as $kategori)
                @if ($kategori->id !== $buku->kategori['id'])
                  <option option value="{{ $kategori->id }}">
                    {{ $kategori->nama_kategori }}
                  </option>          
                @endif
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label class="form-label">Pengarang</label>
            <input type="text" class="form-control" value="{{ $buku->pengarang->nama_pengarang }}" name="pengarang">
          </div>

          <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('dashboard.index') }}" class="btn btn-outline-danger">
              Cancel
            </a>
            <button type="submit" class="btn btn-primary">
              Submit
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection