@extends('layouts.dashboard')

@section('title', 'Home Page')

@section('content')
  <div class="pt-5 pb-3 d-flex justify-content-between align-items-center">
    <h2 class="fw-bold">Daftar Buku</h2>
    <a 
      class="btn btn-outline-primary" 
      href="{{ route('dashboard.create') }}" 
      class="btn btn-primary"
    >
      <i class="fa-solid fa-plus"></i>
      Tambah Buku
    </a>
  </div>
  <table class="table table-responsive table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th class="py-2 text-center">No</th>
        <th class="py-2 text-center">
          <a href="{{ 
              route('dashboard.index', [
                  'sort' => 'judul', 
                  'order' => $sortField === 'judul' && $sortOrder === 'asc' ? 'desc' : 'asc',
                  'page' => $bukus->currentPage(),
              ]) 
            }}"
            class="btn btn-sm"
          >
            <i class="fa-solid fa-sort"></i>
          </a>
          Judul
        </th>
      
        <th class="py-2 text-center">
          <a href="{{ 
              route('dashboard.index', [
                  'sort' => 'tahun', 
                  'order' => $sortField === 'tahun' && $sortOrder === 'asc' ? 'desc' : 'asc',
                  'page' => $bukus->currentPage(),
              ]) 
            }}"
            class="btn btn-sm"
          >
            <i class="fa-solid fa-sort"></i>
          </a>
          Tahun
        </th>
        <th class="py-2 text-center">Kategori</th>
        <th class="py-2 text-center">Pengarang</th>
        <th class="py-2 text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($bukus as $index => $buku)
        <tr>
          <td class="align-middle text-center">
            {{ $index + 1 }} 
          </td>
          <td class="align-middle text-center">
            {{ $buku->judul }} 
          </td>
          <td class="align-middle text-center">
            {{ $buku->tahun }} 
          </td>
          <td class="align-middle text-center">
            {{ $buku->kategori['nama_kategori'] }} 
          </td>
          <td class="align-middle text-center">
            {{ $buku->pengarang['nama_pengarang'] }} 
          </td>

          <td class="d-flex justify-content-center gap-2 align-middle text-center">
            <a href="{{ route('dashboard.edit', $buku->id) }}"  
              class="btn btn-sm btn-warning"
            >
              <i class="fa-solid fa-pen"></i>
            </a>

            <form action="{{ route('dashboard.delete', $buku->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">
                <i class="fa-solid fa-trash"></i>
              </button>
            </form>

            <a href="{{ route('detail', $buku->id) }}" 
              class="btn btn-sm btn-primary"
            >
              <i class="fa-solid fa-eye"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $bukus->appends(['sort' => $sortField, 'order' => $sortOrder])->links() }} 

  

@endsection