@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Agenda Kegiatan</h1>
    </div>

    <a href="/dashboard/agendas/create" class="btn btn-primary mb-2 me-3">Tambah Agenda Baru</a>

    @can('admin')
    <a href="/dashboard/agendas/reminder" class="btn btn-warning mb-2"><span data-feather="mail"></span> Pengingat Via Email</a>
    @endcan
    @include('partials.date_sorting')


    {{-- @if (session()->has('success'))
    <div class="alert alert-success col-lg-10" role="alert">
      {{ session('success') }}
    </div>
    @endif --}}

    <div class="table-responsive col-lg-10">
      <table class="table table-striped table-sm">
          <thead>
              <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Agenda</th>
                  <th scope="col">Divisi</th>
                  <th scope="col">Hari/Tanggal</th>
                  <th scope="col">Waktu</th>
                  <th scope="col">Aksi</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($agendas as $agenda)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $agenda->nama_agenda }}</td>
                  <td>{{ $agenda->division->name }}</td>
                  <td>{{ $agenda->formatted_waktu_pelaksanaan }}</td>
                  <td>{{ \Carbon\Carbon::parse($agenda->waktu_pelaksanaan)->format('H:i') }} WITA - Selesai</td>
                  
                  <td>
                    {{-- @if (!$agenda->tanggal_selesai) --}}
                    <button class="badge bg-primary btn-sm btn-modal border-0" data-id="{{ $agenda->id }}"><span data-feather="eye"></span></button>
                    <a href="/dashboard/agendas/{{ $agenda->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>

                    @can('admin')
                        @if ($agenda->status)
                            <form action="/dashboard/agendas/{{ $agenda->id }}/unactive" method="post" class="d-inline">
                                @method('put')
                                @csrf
                                <button class="badge bg-danger border-0"><span data-feather="toggle-right"></span></button>
                            </form>
                            @else
                            <form action="/dashboard/agendas/{{ $agenda->id }}/active" method="post" class="d-inline">
                                @method('put')
                                @csrf
                                <button class="badge bg-secondary border-0"><span data-feather="toggle-left"></span></button>
                            </form>
                        @endif
                    @endcan
                    
                    <form action="{{ route('dashboard.agendas.approve', $agenda->id) }}" method="POST" class="d-inline">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="badge bg-success border-0"><span data-feather="check-circle"></span></button>
                    </form> 

                    {{-- @else
                        Diselesaikan pada {{ $agenda->tanggal_selesai }}
                    @endif --}}
                  </td>
              </tr>
              <!-- Modal -->
              <div class="modal fade" id="modal-agenda-{{ $agenda->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-agenda-{{ $agenda->id }}-label" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="modal-agenda-{{ $agenda->id }}-label">{{ $agenda->nama_agenda }}</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <p><strong>Nama Agenda : </strong> {{ $agenda->nama_agenda }}</p>
                              <p><strong>Divisi : </strong> {{ $agenda->division->name }}</p>
                              <p><strong>Perihal :</strong> {{ $agenda->perihal }}</p>
                              <p><strong>Notulensi :</strong> {!! $agenda->notulensi !!}</p>
                              <p><strong>Tanggal Pelaksanaan :</strong> {{ $agenda->formatted_waktu_pelaksanaan }}</p>
                              <p><strong>Waktu Pelaksanaan :</strong> {{ \Carbon\Carbon::parse($agenda->waktu_pelaksanaan)->format('H:i') }} WITA - Selesai</p>
                              <p><strong>Tempat Pelaksanaan :</strong> {{ $agenda->tempat_pelaksanaan }}</p>
                              <p><strong>Link Dokumentasi :</strong> {{ $agenda->link_dokumentasi }}</p>
                              <p><strong>Terakhir diedit oleh :</strong> {{ $agenda->user->name }}</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                            </div>                
                        </div>
                    </div>
                </div>
              </div>
              {{-- End Modal --}}
              @endforeach
          </tbody>
      </table>
  </div>
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script> --}}

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

{{-- Searching --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function() {
      $('.table').DataTable({
          "pagingType": "full_numbers",
          "searching": true,
          "ordering": true,
          "lengthMenu": [ 10, 25, 50, 75, 100 ],
          "language": {
              "paginate": {
                  "next": "Selanjutnya",
                  "previous": "Sebelumnya",
                  "first": false,
                  "last": false
              },
              "search": "Cari:",
              "lengthMenu": "Tampilkan _MENU_ data per halaman",
              "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ agenda kegiatan"
          },
          "columnDefs": [
              { "searchable": false, "targets": 3 }
          ]
      });
  });
  
</script>


@endsection