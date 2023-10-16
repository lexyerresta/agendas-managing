@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Recycle Bin</h1>
    </div>
    <a href="/dashboard/narasumbers" class="btn btn-primary mb-2 me-3">Kembali Ke Permintaan Narasumber</a>
    @include('partials.date_sorting')

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
            <th scope="col">Hari/Tanggal</th>
            <th scope="col">Waktu Acara</th>
            <th scope="col">Tempat</th>
            <th scope="col">Asal Instansi</th>
            <th scope="col">No WA</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($narasumbers as $narasumber)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $narasumber->name }}</td>  
                <td>{{ $narasumber->formatted_tanggal_acara }}</td>  
                <td>{{ \Carbon\Carbon::parse($narasumber->tanggal_acara)->format('H:i') }} WITA - Selesai</td>  
                <td>{{ $narasumber->tempat }}</td>  
                <td>{{ $narasumber->asal }}</td>  
                <td>{{ $narasumber->no_hp }}</td>  
                <td>
                    @if (!$narasumber->tanggal_approve)
                        @can('admin')
                            <form action="{{ route('dashboard.narasumbers.restore', $narasumber->id) }}" method="post" class="d-inline">
                                @method('post')
                                @csrf
                                <button type="submit" class="badge bg-primary border-0">
                                    <span data-feather="refresh-cw"></span>
                                </button>
                            </form>
                        
                            <form action="/dashboard/narasumbers/{{ $narasumber->id }}/forcedelete" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge bg-danger border-0" onclick="event.preventDefault(); confirmDelete(this);">
                                    <span data-feather="x-circle"></span>
                                </button>
                            </form>                            
                        @endcan
                    @else
                        Sudah diapprove pada {{ $narasumber->tanggal_approve }}
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
            "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ permintaan narasumber"
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
        text: "Data akan dihapus permanen!",
        icon: 'warning',
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