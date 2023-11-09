<div class="container py-5 px-3 px-lg-0">
  <div class="text-center">
    <small class="text-primary">
      Perpustakaan Buku
    </small>
    <h2 class="fw-semibold">
      Pencarian Buku
    </h2>
  </div>

  <div class="row justify-content-center py-2">
    <div class="col-md-7">
      <form action="{{ route('index') }}" method="GET">
        <div class="input-group">
          <input 
            type="text" 
            class="form-control" 
            name="keyword" 
            placeholder="Cari buku" 
            value="{{ request()->get('keyword') }}"
          >
          <button class="btn btn-primary" type="submit">
            <i class="fa-solid fa-search"></i>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>