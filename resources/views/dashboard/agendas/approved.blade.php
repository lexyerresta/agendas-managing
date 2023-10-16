@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-0 mb-3">
        <h1 class="h2">Riwayat Agenda Selesai</h1>
    </div>

    @if(auth()->user()->level_user == 'admin')
    <form action="{{ route('approved.rekap') }}" class="" method="get" id="form_filter" name="form_filter">
        <div class="row mt-2 d-flex justify-content-start">
            <div class="mb-3 col-md-2">
                {{-- <label for="start_date">Start</label> --}}
                <input type="date" class="form-control border border-2 p-2" id="start_date" name="start_date">
            </div>
            <div class="mb-3 col-md-2">
                {{-- <label for="end_date">End</label> --}}
                <input type="date" class="form-control border border-2 p-2" id="end_date" name="end_date">
            </div>

            <div class="mb-3 col-md-2">
                {{-- <label for="division" class="form-label">Divisi</label> --}}
                <select class="form-select @error('division') is-invalid @enderror border border-2 p-2" id="division" name="division">
                    <option value="">All</option>
                    @foreach ($divisions as $division)
                        @if ($division->name !== 'Masyarakat')
                        <option value="{{ $division->id }}" {{ old('division') == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('division')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>            

            <div class="mb-3 col-md-2">
                <button class="btn btn-primary border border-2 p-2" type="submit" id="filterBtn">Rekap Agenda</button>
            </div>
        </div>
    </form>

    @else
        @include('partials.date_sorting')
    @endif



    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Agenda</th>
                    <th>Divisi</th>
                    <th>Tanggal Selesai</th>
                    <th>Waktu Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agendas as $agenda)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $agenda->nama_agenda }}</td>
                        <td>{{ $agenda->division->name }}</td>
                        <td>{{ $agenda->formatted_waktu_pelaksanaan }}</td>
                        <td>{{ \Carbon\Carbon::parse($agenda->waktu_pelaksanaan)->format('H:i') }} - {{ \Carbon\Carbon::parse($agenda->tanggal_selesai)->format('H:i') }} WITA</td>
                        <td>
                            <button class="badge bg-primary btn-sm btn-modal border-0" data-id="{{ $agenda->id }}"><span data-feather="eye"></span></button>
                            <a href="/dashboard/agendas/{{ $agenda->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>

                            {{-- @can('admin')
                            <form action="/dashboard/agendas/{{ $agenda->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Yakin untuk menghapus?')"><span data-feather="x-circle"></span></button>
                            </form>
                            @endcan --}}
                    
                            {{-- coba --}}
                            <a href="{{ route('approved.print',['id'=>$agenda->id]) }}" class="badge bg-dark"><span data-feather="printer"></span></a>

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
                                <p><strong>Waktu Pelaksanaan :</strong> {{ \Carbon\Carbon::parse($agenda->waktu_pelaksanaan)->format('H:i') }} - {{ \Carbon\Carbon::parse($agenda->tanggal_selesai)->format('H:i') }} WITA</p>
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
        "lengthMenu": [10, 25, 50, 75, 100 ],
        "language": {
            "paginate": {
                "next": "Selanjutnya",
                "previous": "Sebelumnya",
                "first": false,
                "last": false
            },
            "search": "Cari:",
            "lengthMenu": "Tampilkan _MENU_ data per halaman",
            "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ riwayat agenda selesai"
        },
        "columnDefs": [
            { "searchable": false, "targets": 3 }
        ]
    });
});

//Disable end date
const startDateInput = document.querySelector('#start_date');
const endDateInput = document.querySelector('#end_date');
const filterBtn = document.querySelector('#filterBtn');
// const form = document.querySelector('#form_filter'); // Replace with your form ID

endDateInput.disabled = true;

startDateInput.addEventListener('input', function() {
  if (startDateInput.value !== '') {
    endDateInput.disabled = false;
  } else {
    endDateInput.disabled = true;
  }
});

startDateInput.addEventListener('change', function() {
  endDateInput.disabled = false;
  endDateInput.min = startDateInput.value;
});
</script>
@endsection
