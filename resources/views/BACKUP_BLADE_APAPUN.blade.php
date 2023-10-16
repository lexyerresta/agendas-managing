@extends('dashboard.layouts.main')

@section('container')

<style>
  
  .card-color-1 .card-header {
    background-color: #ff5733; /* Warna cerah 1 */
  }
  
  .card-color-2 .card-header {
    background-color: #ffbd33; /* Warna cerah 2 */
  }
  
  .card-color-3 .card-header {
    background-color: #d8ff33; /* Warna cerah 3 */
  }
  </style>
  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-0 mb-3">
    <h1 class="h2">Agenda Kegiatan</h1>
    <a href="/dashboard/agendas/create" class="btn btn-primary mb-2">Buat Agenda Baru</a>
  </div>

@if (session()->has('success'))
  <div class="alert alert-success col-lg-12" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="row">
  @foreach ($agendas as $index => $agenda)
  <div class="col-md-4 col-lg-4 mb-4">
    <div class="card card-color-{{ ($index % 3) + 1 }}">
          <div class="card-header">
              <h5 class="card-title">{{ $agenda->nama_agenda }}</h5>
          </div>
          <div class="card-body">
            <p class="card-text"><strong>Divisi:</strong> {{ $agenda->division->name }}</p>
            <p class="card-text"><strong>Tanggal & Waktu Kegiatan:</strong> {{ $agenda->tanggal_pelaksanaan }}</p>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary btn-sm btn-modal" data-id="{{ $agenda->id }}"><span data-feather="eye"></span> Lihat</button>
              <a href="/dashboard/agendas/{{ $agenda->id }}/edit" class="btn btn-warning btn-sm"><span data-feather="edit"></span> Edit</a>
              @can('admin')
              <form action="/dashboard/agendas/{{ $agenda->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin untuk menghapus?')"><span data-feather="x-circle"></span> Hapus</button>
              </form>
              @endcan
          </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modal-agenda-{{ $agenda->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-agenda-{{ $agenda->id }}-label" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="modal-agenda-{{ $agenda->id }}-label">{{ $agenda->nama_agenda }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <p><strong>Divisi:</strong> {{ $agenda->division->name }}</p>
                      <p><strong>Perihal:</strong> {{ $agenda->perihal }}</p>
                      <p><strong>Notulensi:</strong> Ini Notulen</p>
                      <p><strong>Tanggal Pelaksanaan:</strong> {{ $agenda->tanggal_pelaksanaan }}</p>
                      <p><strong>Tempat Pelaksanaan:</strong> ITB STIKOM BALI </p>
                      <p><strong>Link Dokumentasi:</strong> Link Google Drive </p>
                      <p><strong>Cetak Laporan:</strong> Link Cetak Laporan </p>
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
    // Ambil id agenda dari data-id pada tombol "lihat"
    var agendaId = $(this).data('id');

    // Tampilkan modal dengan id modal-agenda-{agendaId}
    $('#modal-agenda-' + agendaId).modal('show');
  });

  // Ketika tombol "Tutup" di-klik
  $('.modal').on('click', '[data-dismiss="modal"]', function() {
    // Tutup modal
    $(this).closest('.modal').modal('hide');
    });
  });

</script>

@endsection