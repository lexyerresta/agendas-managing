{{-- @dd($bulan_ini) --}}
@extends('dashboard.layouts.main')

@section('container')

<style>
  
  .card-color-1 .card-header {
    background-color: #00b4d8; /* Warna cerah 1 */
  }
  
  .card-color-2 .card-header {
    background-color: #a569bd; /* Warna cerah 2 */
  }
  
  .card-color-3 .card-header {
    background-color: #ff7878; /* Warna cerah 3 */
  }

  /* #kunjungan {
  height: 330px !important;
  weigth: auto
  } */

</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Selamat datang, {{ auth()->user()->name }}</h1>
    @can('admin')
    <a href="{{ route('profilbnnp.edit') }}" class="btn btn-primary mb-2 me-3">Ubah Profil BNNP Bali</a>
    @endcan
</div>

  {{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-0 mb-3">
    <h1 class="h2">Pengumuman</h1>
  </div> --}}

{{-- @if (session()->has('success'))
  <div class="alert alert-success col-lg-12" role="alert">
    {{ session('success') }}
  </div>
@endif --}}

<div class="row">
  <div class="col-md-4 col-lg-4 mb-4">
    <div class="card card-color-{{ 1 }}">
          <div class="card-header">
              <h5 class="card-title">Agenda Kegiatan @can('staff') {{ auth()->user()->division->name }} @endcan</h5>
          </div>
          <div class="card-body">
            <p class="card-text"><strong>Jumlah agenda kegiatan hari ini : {{ $agenda_today }}</strong> </p>
            <p class="card-text"><strong>Jumlah agenda kegiatan bulan ini : {{ $agenda_monthly }}</strong> </p>
            {{-- <p class="card-text"><strong>Agenda diselesaikan : {{ $agenda_done }}</strong> </p> --}}
            {{-- <p class="card-text"><strong>Agenda tersisa : {{ $agenda_not_done }}</strong> </p> --}}
          </div>
          <div class="card-footer">
            <a href="{{ $url_agenda }}" class="btn btn-primary btn-sm btn-modal"><span data-feather="eye"></span> Lihat agenda hari ini</a>
          </div>
      </div>
    </div>
      <div class="col-md-4 col-lg-4 mb-4">
        <div class="card card-color-{{ 2 }}">
              <div class="card-header">
                  <h5 class="card-title">Pengumuman @can('staff') {{ auth()->user()->division->name }} @endcan</h5>
              </div>
              <div class="card-body">
                <p class="card-text"><strong>Jumlah pengumuman hari ini : {{ $pengumuman_today }}</strong> </p>
                <p class="card-text"><strong>Jumlah pengumuman bulan ini : {{ $pengumuman_monthly }}</strong> </p>
              </div>
              <div class="card-footer">
                <a href="{{ $url_pengumuman }}" class="btn btn-primary btn-sm btn-modal"><span data-feather="eye"></span> Lihat pengumuman hari ini</a>
              </div>
          </div>
    </div>
    <div class="col-md-4 col-lg-4 mb-4">
      <div class="card card-color-{{ 3 }}">
            <div class="card-header">
                <h5 class="card-title">Artikel</h5>
            </div>
            <div class="card-body">
              <p class="card-text"><strong>Jumlah artikel @can('staff')anda @endcan : {{ $artikel_anda }}</strong> </p>
              @if ($artikel_terbaru)
              <p class="card-text"><strong>Artikel terakhir dibuat: {{ \Carbon\Carbon::parse($artikel_terbaru->created_at)->format('d/m/Y') }}</strong></p>
              @else
                  <p class="card-text"><strong>Tidak ada artikel terbaru</strong></p>
              @endif
            </div>
            <div class="card-footer">
              <a href="{{ route('articles.index') }}" class="btn btn-primary btn-sm btn-modal"><span data-feather="eye"></span> 
                @can('admin')Lihat semua artikel @endcan
                @can('staff')Lihat artikel anda @endcan</a>
            </div>
        </div>
    </div>
      {{-- <!-- Modal -->
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
  </div> --}}
  {{-- {{ $chart->options['chart_title'] }} --}}

  <div class="chart mb-5">
    {{-- <div class="filter">
      <form action="" method="get">
        <label for="chart-filter">Filter:</label>
        <select id="chart-filter" name="filter">
          <option value="tahun" {{ Request::get('filter') == 'tahun' ? 'selected' : '' }}>Tahun</option>
          <option value="bulan" {{ Request::get('filter') == 'bulan' ? 'selected' : '' }}>Bulan</option>
          <option value="minggu" {{ Request::get('filter') == 'minggu' ? 'selected' : '' }}>Minggu</option>
        </select>
        <button type="submit">Filter</button>
      </form>
    </div> --}}
    @include('partials.date_sorting')

    {!! $chart->renderHtml() !!}
  </div>
  
{{-- <div class="chart mb-5">
  {!! $chart->renderHtml() !!}
</div> --}}

  {{-- <canvas id="agenda_kegiatan" class="mb-5" height="330"></canvas> --}}
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
    // Ambil id pengumuman dari data-id pada tombol "lihat"
    var pengumumanId = $(this).data('id');

    // Tampilkan modal dengan id modal-pengumuman-{pengumumanId}
    $('#modal-pengumuman-' + pengumumanId).modal('show');
  });

  // Ketika tombol "Tutup" di-klik
  $('.modal').on('click', '[data-dismiss="modal"]', function() {
    // Tutup modal
    $(this).closest('.modal').modal('hide');
    });
  });

{!! $chart->renderChartJsLibrary() !!}
{!! $chart->renderJs() !!}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  {!! $chart->renderJs() !!}
</script>

@endsection