@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengumuman</h1>
    </div>

    <a href="/dashboard/pengumumans/create" class="btn btn-primary mb-2">Tambah Pengumuman Baru</a>

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
                  <th scope="col">Divisi</th>
                  <th scope="col">Judul Pengumuman</th>
                  <th scope="col">Yang Membuat</th>
                  <th scope="col">Tanggal Dibuat</th>
                  <th scope="col">Aksi</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($pengumumans as $pengumuman)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengumuman->division->name }}</td>
                <td>{{ $pengumuman->title }}</td>
                <td>{{ $pengumuman->user->name}}</td>
                <td>{{ $pengumuman->formatted_created_at }}</td>
                  <td>
                    <button class="badge bg-primary btn-sm btn-modal border-0" data-id="{{ $pengumuman->id }}"><span data-feather="eye"></span></button>
                    <a href="/dashboard/pengumumans/{{ $pengumuman->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>

                    @can('admin')
                      {{-- <form action="/dashboard/pengumumans/{{ $pengumuman->id }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="badge bg-danger border-0" onclick="return confirm('Yakin untuk menghapus?')"><span data-feather="x-circle"></span></button>
                      </form> --}}
                      @if ($pengumuman->status)
                      <form action="/dashboard/pengumumans/{{ $pengumuman->id }}/unactive" method="post" class="d-inline">
                          @method('put')
                          @csrf
                          <button class="badge bg-danger border-0"><span data-feather="toggle-right"></span></button>
                      </form>
                      @else
                      <form action="/dashboard/pengumumans/{{ $pengumuman->id }}/active" method="post" class="d-inline">
                          @method('put')
                          @csrf
                          <button class="badge bg-secondary border-0"><span data-feather="toggle-left"></span></button>
                      </form>
                  @endif
                    @endcan
                  </td>
              </tr>
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
    var pengumumanId = $(this).data('id');

    // Tampilkan modal dengan id modal-agenda-{agendaId}
    $('#modal-pengumuman-' + pengumumanId).modal('show');
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
              "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ pengumuman"
          },
          "columnDefs": [
              { "searchable": false, "targets": 3 }
          ]
      });
  });
</script>

@endsection