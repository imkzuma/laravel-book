<div class="container py-5 px-3 px-lg-0">
  <div class="text-center">
    <small class="text-primary">
      Perpustakaan Buku
    </small>
    <h2 class="fw-semibold">
      List Buku
    </h2>
  </div>

  <div class="row justify-content-center py-4 gap-3 gap-md-0">
    @foreach ($bukus as $buku)
      <div class="col-lg-3">
        <div class="card h-100 border-0 px-2">
          <img 
            src="data:image/*;base64,{{ base64_encode($buku->sampul) }}"
            class="card-img-top img-fluid h-75" 
            alt="{{$buku->judul}}"
          >
          <div class="card-body px-0">
            <h5 class="card-title">
              {{ $buku->judul }}
            </h5>
            <p class="card-text">
              {{ $buku->pengarang->nama_pengarang }}
            </p>
            <a href="{{ route('detail', $buku->id) }}" class="btn btn-outline-primary w-100">
              Detail
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  {{ $bukus->links() }}
</div>