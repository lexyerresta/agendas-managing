@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Permintaan Kunjungan Kantor BNNP Bali</h1>
    </div>
    @can('admin')
    <a href="/dashboard/kunjungans-softdelete" class="btn btn-danger mb-2 me-3">Recycle Bin</a>
    @include('partials.date_sorting')
    @endcan

    {{-- @if (session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
    {{ session('success') }}
    </div>
    @endif --}}

    <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Pemohon</th>
            <th scope="col">Rencana Kunjungan</th>
            <th scope="col">Waktu Kunjungan</th>
            <th scope="col">Keperluan</th>
            <th scope="col">Asal Instansi</th>
            <th scope="col">No WA</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kunjungans as $kunjungan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kunjungan->name }}</td>  
                <td>{{ $kunjungan->formatted_waktu_kunjungan }}</td>  
                <td>{{ \Carbon\Carbon::parse($kunjungan->waktu_kunjungan)->format('H:i') }} WITA - Selesai</td>  
                <td>{{ $kunjungan->keperluan }}</td>  
                <td>{{ $kunjungan->asal }}</td>  
                <td>{{ $kunjungan->no_hp }}</td>  
                <td>
                    @if (!$kunjungan->tanggal_approve)
                        <a href="/dashboard/kunjungans/{{ $kunjungan->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                        @can('admin')
                            <form action="/dashboard/kunjungans/{{ $kunjungan->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                {{-- <button class="badge bg-danger border-0" onclick="return confirm('Yakin untuk menghapus?')"><span data-feather="x-circle"></span></button> --}}
                                <a type="submit" class="badge bg-danger border-0"
                                onclick="event.preventDefault(); confirmDelete(this);">
                                <span data-feather="x-circle"></span>
                                </a>
                            </form>     
                        @endcan     
                        <form action="{{ route('dashboard.kunjungans.approve', $kunjungan->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="badge bg-success border-0"><span data-feather="check-circle"></span></button>
                        </form>
                    @else
                        Sudah diapprove pada {{ $kunjungan->tanggal_approve }}
                    @endif
                </td>
            </tr>  
            @endforeach            
        </tbody>
        </table>
    </div>
 </div>

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
            "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ permintaan kunjungan"
        },
        "columnDefs": [
            { "searchable": false, "targets": 3 }
        ]
    });
});

//Delete alert
function confirmDelete(button) {
    const form = button.parentElement;
    Swal.fire({
        title: 'Yakin Untuk Menghapus?',
        text: "Data ini akan masuk ke recycle bin",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus ini!'
    }).then((result) => {
        if (result.isConfirmed) {
        form.submit(); // submit the form after the confirmation
        }
    });
    }
</script>

@endsection