<!DOCTYPE html>
<html>
<head>
	<title>{{ $agenda->nama_agenda }}</title>
    <link rel="icon" href="https://bali.bnn.go.id/konten/unggahan/2019/03/cropped-bnn-512x512-100x100.png" sizes="32x32">
	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}
	</style>
</head>
<body>
	<center>
		<table>
			<tr>
				<td style="text-align: center"><img style="display:block;" src="{{ asset('img/logo-bnn.png') }}" width="150">
                    <font size="3"><b>PROVINSI BALI</b></font></td>
                <td>
				
					<font size="5"><b>BADAN NARKOTIKA NASIONAL PROVINSI BALI</b></font><br>
                    <font size="3">JALAN KAMBOJA NO. 8 DENPASAR</font><br>
					<font size="3">TELP        : (0361) 232472, 7800179, 263860</font><br>
                    <font size="3">FAX         : (0361) 232472</font><br>
                    <font size="3">EMAIL       : bnnp_bali@bnn.go.id</font><br>
                    
                </td>
			</tr>
			<tr>
				<td colspan="3"><hr style="border:1px solid"></td>
			</tr>
		<table width="625">
			<tr>
				<td class="text2"><b>{{ $agenda->formatted_waktu_pelaksanaan }}</b></td>
			</tr>
		</table>
		</table>
		<table>
			{{-- <tr class="text2">
				<td><b>Nomor</b></td>
				<td width="564">: <b>B/00{{ $agenda->id }}/III/Ka/Pc.00/2023/BNNP-BALI</b></td>
			</tr> --}}
            <tr>
				{{-- <td><b>Sifat</b></td>
				<td width="564">: <b>Biasa</b></td> --}}
				<td><b>Nama Agenda</b></td>
				<td width="564">: <b>{{ $agenda->nama_agenda }}</b></td>
			</tr>
            <tr>
				<td><b>Lampiran</b></td>
				<td width="564">: <b>-</b></td>
			</tr>
			<tr>
				<td><b>Perihal</b></td>
				<td width="564">: <b>{{ $agenda->perihal }}</b></td>
			</tr>
		</table>
		<br><br>
		<table width="625">
			<tr>
		       <td>
			       <font size="2">Kpd Yth:<br>{{ $agenda->user->name }} <br>Di tempat</font>
		       </td>
		    </tr>
		</table>
		<br>
        <table width="625">
            <tr>
               <td style="text-align:justify">
                   <font size="2">1.<a style="padding-left: 10px;">Rujukan</a> :
                   <br><br>
                   <p style="padding-left: 30px; margin: 0;">a. Undang—undang Nomor : 35 Tahun 2009 tentang Narkotika.</p>
                   <p style="padding-left: 30px; margin: 0;">b. Peraturan Presiden Nomor 47 Tahun 2019 tentang Perubahan Atas Peraturan Presiden Nomor 23 Tahun 2010 tentang Badan Narkotika Nasional Repub!ik Indonesia.</p>
                   <p style="padding-left: 30px; margin: 0;">c. Intruksi Presiden Nomor 2 Tahun 2020 tenîang Rencana Aksi Nasional Pencegahan dan Pemberantasan Penyalahgunaan dan Peredaran Gelap Narkotika dan Prekursor
                    Narkotika Tahun 2020-2024.</p>
                   <p style="padding-left: 30px; margin: 0;">d. DIPA Badan Narkotika Nasional Provinsi Bali Tahun Anggaran 2023. Nomor : SP 066.01.2.682516/2023 tanggai 30 November 2022.</p>
                    </font>
               </td>
            </tr>
        </table>
		<br>
		</table>
		<table width="625">
            <tr>
               <td style="text-align:justify">
                   <font size="2">2.<span style="padding-left: 10px;">Waktu dan tempat :</span>

                    </font>
               </td>
            </tr>
            <table style="padding-left: 60px;">
                <tr class="text2">
                    <td>Hari Tanggal</td>
                    <td width="541">: {{ $agenda->formatted_waktu_pelaksanaan }} </td>
                </tr>
                <tr>
                    <td>Jam</td>
                    <td width="525">: {{ $waktu_mulai }} s.d {{ $waktu_selesai }}  WITA</td>
                </tr>
                <tr>
                    <td>Tempat</td>
                    <td width="525">: {{ $agenda->tempat_pelaksanaan }}</td>
                </tr>
            </table>
            <br>
            <table width="625">
                <tr>
                    <td style="text-align:justify">
                        <font size="2">3.<span style="padding-left: 10px;">Notulensi :</span>
     
                         </font>
                    </td>
                 </tr>
                <tr>
                   <td style="text-align:justify; padding-left: 28px;">
                       <font size="2">
                            <span style="padding-left: 10px;">
                                {!! $agenda->notulensi !!}
                            </span>
                       </font>
                   </td>
                </tr>
            </table>
        </table>
		<br>
		</table>
		<br>
		<br>
		<table width="625">
			<tr>
				<td width="430"><br><br><br><br></td>
				<td class="text" align="center">Kepala Badan Narkotika Nasional<br>Provinsi Bali<br><br><br><br>Brigjen. Pol. Dr. R. Nurhadi Yuwono, S.I.K., M.Si., CHRMP<br>Brigadir Jendral Polisi</td>
			</tr>
	     </table>
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