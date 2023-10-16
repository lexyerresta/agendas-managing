{{-- @extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat datang, {{ auth()->user()->name }}</h1>
    </div>
@endsection --}}

@extends('dashboard.layouts.main')

@section('container')

<style>
  
  .card-color-1 .card-header {
    background-color: #f5a623; /* Warna cerah 1 */
  }
  
  .card-color-2 .card-header {
    background-color: #44c767; /* Warna cerah 2 */
  }
  
  .card-color-3 .card-header {
    background-color: #ffa500; /* Warna cerah 3 */
  }
  
  .card-color-4 .card-header {
    background-color: #00b4d8; /* Warna cerah 4 */
  }
  
  .card-color-5 .card-header {
    background-color: #ff7878; /* Warna cerah 5 */
  }
  
  .card-color-6 .card-header {
    background-color: #a569bd; /* Warna cerah 6 */
  }
  
</style>
  

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Selamat datang, {{ auth()->user()->name }}</h1>
    <h1 class="h2">Jumlah pengumuman hari ini : {{ $jumlah_pengumuman }}</h1>
</div>
  {{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-0 mb-3">
    <h1 class="h2">Pengumuman</h1>
  </div> --}}

@if (session()->has('success'))
  <div class="alert alert-success col-lg-12" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="row">
  @foreach ($pengumumans as $index => $pengumuman)
  <div class="col-md-4 col-lg-4 mb-4">
    <div class="card card-color-{{ ($index % 6) + 1 }}">
          <div class="card-header">
              <h5 class="card-title">{{ $pengumuman->title }}</h5>
          </div>
          <div class="card-body">
            <p class="card-text"><strong>Untuk Divisi :</strong> {{ $pengumuman->division->name }}</p>
            <p class="card-text"><strong>Pengumuman Dibuat :</strong> {{ $pengumuman->created_at->diffForHumans(['locale' => 'id']) }}</p>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary btn-sm btn-modal" data-id="{{ $pengumuman->id }}"><span data-feather="eye"></span> Lihat</button>
            <a href="/dashboard/pengumumans/{{ $pengumuman->id }}/edit" class="btn btn-warning btn-sm"><span data-feather="edit"></span> Edit</a>

            @can('admin')
              <form action="/dashboard/pengumumans/{{ $pengumuman->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin untuk menghapus?')"><span data-feather="x-circle"></span> Hapus</button>
              </form>
            @endcan
            
          </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modal-pengumuman-{{ $pengumuman->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-pengumuman-{{ $pengumuman->id }}-label" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="modal-pengumuman-{{ $pengumuman->id }}-label">{{ $pengumuman->title }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p><strong>Judul Pengumuman : </strong> {{ $pengumuman->title }}</p>
                    <p><strong>Divisi :</strong> {{ $pengumuman->division->name }}</p>
                    <p><strong>Isi pengumuman :</strong> {!! $pengumuman->body !!}</p>
                    <p><strong>Pengumuman dibuat :</strong> {{ $pengumuman->created_at->diffForHumans(['locale' => 'id']) }}</p>
                    <p><strong>Terakhir diedit oleh :</strong> {{ $pengumuman->user->name }}</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                    </div>                
            </div>
        </div>
    </div>
  </div>
  @endforeach
  
  </div>


<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>

<!-- Modal script -->
<script>
  $(document).ready(function() {
  // Ketika tombol "lihat" di-klik
  $('.btn-modal').on('click', function() {
    // Ambil id pengumuman dari data-id pada tombol "lihat"
    var pengumumanId = $(this).data('id');

    // Tampilkan modal dengan id modal-pengumuman-{pengumumanId}
    $('#modal-pengumuman-' + pengumumanId).modal('show');
  });

  // Ketika tombol "Tutup" di-klik
  $('.modal').on('click', '[data-dismiss="modal"]', function() {
    // Tutup modal
    $(this).closest('.modal').modal('hide');
    });
  });

</script>

@endsection