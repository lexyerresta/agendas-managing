@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Status Permintaan Kunjungan Anda</h1>
    </div>

    {{-- @include('partials.date_sorting') --}}

    @if ($kunjungans->isEmpty())
        <p style="font-size: 20px;">Anda belum mengajukan permintaan kunjungan.</p>
    @else

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
            <th scope="col">Status</th>
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
                    <span style="background-color: #8e8e8e; color: #fff; border-radius: 20px; margin: 3px; padding:5px;">Diproses</span>
                @else
                    <span style="background-color: #134784; color: #fff; border-radius: 20px; margin: 3px; padding:5px;">Diterima</span>
                @endif         
                </td>
            </tr>  
            @endforeach                        
        </tbody>
        </table>
    </div>
    @endif
</div>

{{-- Searching --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
}); --}}

@endsection