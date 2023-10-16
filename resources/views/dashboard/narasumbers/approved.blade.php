@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-0 mb-3">
        <h1 class="h2">Riwayat Permintaan Narasumber</h1>
    </div>

@include('partials.date_sorting')

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemohon</th>
                    <th>Hari/Tanggal</th>
                    <th>Waktu Acara</th>
                    <th>Tempat</th>
                    <th>Asal Instansi</th>
                    <th>No WA</th>
                    <th>Waktu Approve</th>
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
                        <td>{{ \Carbon\Carbon::parse($narasumber->tanggal_approve)->format('H:i:s') }} WITA</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
                "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ riwayat permintaan narasumber"
            },
            "columnDefs": [
                { "searchable": false, "targets": 3 }
            ]
        });
    });
    </script>
@endsection
