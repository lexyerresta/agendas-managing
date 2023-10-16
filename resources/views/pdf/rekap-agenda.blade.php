<!DOCTYPE html>
<html>
<head>
	{{-- <title>{{ $agendas->nama_agenda }}</title> --}}
    <link rel="icon" href="https://bali.bnn.go.id/konten/unggahan/2019/03/cropped-bnn-512x512-100x100.png" sizes="32x32">
    <style>
        .table-responsive {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
            color: #212529;
        }
        
        table thead {
            /* background-color: #343a40; */
            color: #343a40;
        }
        
        table th,
        table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        
        table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        table tbody tr:hover {
            background-color: #e9ecef;
        }
        
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <center>
        <table>
            <tr>
                <td style="text-align: center"><img style="display:block;" src="{{ asset('img/logo-bnn.png') }}" width="150">
                    <font size="3"><b>PROVINSI BALI</b></font></td>
                <td style="padding-top: 25px;">
                
                    <font size="5"><b>BADAN NARKOTIKA NASIONAL PROVINSI BALI</b></font><br>
                    <font size="3">JALAN KAMBOJA NO. 8 DENPASAR</font><br>
                    <font size="3">TELP        : (0361) 232472, 7800179, 263860</font><br>
                    <font size="3">FAX         : (0361) 232472</font><br>
                    <font size="3">EMAIL       : bnnp_bali@bnn.go.id</font><br>
                    
                </td>
            </tr>
            <tr>
                <td colspan="3" class="text-center">
                @if ($division)
                    @if ($start_date && $end_date)
                        <h3>Rekap Kegiatan Divisi {{ $division->name }} <br> Tanggal {{ \Carbon\Carbon::parse($start_date)->locale('id')->isoFormat('D MMMM YYYY') }} - {{ \Carbon\Carbon::parse($end_date)->locale('id')->isoFormat('D MMMM YYYY') }}</h3>
                
                    @elseif ($start_date)
                        <h3>Rekap Kegiatan Divisi {{ $division->name }} <br> Tanggal {{ \Carbon\Carbon::parse($start_date)->locale('id')->isoFormat('D MMMM YYYY') }}</h3>
                    
                    @else
                        <h3>Rekap Kegiatan Divisi {{ $division->name }}</h3>
                    @endif
                @else
                    @if ($start_date && $end_date)
                        <h3>Rekap Kegiatan Seluruh Divisi <br> Tanggal {{ \Carbon\Carbon::parse($start_date)->locale('id')->isoFormat('D MMMM YYYY') }} - {{ \Carbon\Carbon::parse($end_date)->locale('id')->isoFormat('D MMMM YYYY') }}</h3>
                
                    @elseif ($start_date)
                        <h3>Rekap Kegiatan Seluruh Divisi <br> Tanggal {{ \Carbon\Carbon::parse($start_date)->locale('id')->isoFormat('D MMMM YYYY') }}</h3>
                    
                    @else
                        <h3>Rekap Kegiatan Seluruh Divisi</h3>
                    @endif
                @endif
                
                </td>
            </tr>
        </table>

    <div class="table-responsive col-lg-10" style="margin-top: -16px;">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Agenda</th>
                    <th scope="col">Divisi</th>
                    <th scope="col">Hari/Tanggal</th>
                    <th scope="col">Waktu</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($agendas as $agenda)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $agenda->nama_agenda }}</td>
                    <td>{{ $agenda->division->name }}</td>
                    <td>{{ $agenda->formatted_waktu_pelaksanaan }}</td>
                    <td>{{ \Carbon\Carbon::parse($agenda->waktu_pelaksanaan)->format('H:i') }} WITA - Selesai</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Data tidak ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</center>
</body>
</html>

<script type="text/javascript">
    window.print();
    var beforePrint = function() {
        console.log('Functionality to run before printing.');
    };

    var afterPrint = function() {
        // window.history.back();
        location.href = "{{ route('dashboard.agendas.approved') }}";

    };

    if (window.matchMedia) {
        var mediaQueryList = window.matchMedia('print');
        mediaQueryList.addListener(function(mql) {
            if (mql.matches) {
                beforePrint();
            } else {
                afterPrint();
            }
        });
    }

    window.onbeforeprint = beforePrint;
    window.onafterprint = afterPrint;
</script>