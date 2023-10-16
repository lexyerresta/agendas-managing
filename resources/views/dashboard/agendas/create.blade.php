@extends('dashboard.layouts.main')

@section('container')

{{-- Trix Editor --}}
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

<style>
  trix-toolbar [data-trix-button-group="file-tools"] {
    display:none;
  }
</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Agenda</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/agendas" class="mb-5" enctype="multipart/form-data">
    @csrf
      <div class="mb-3">
        <label for="nama_agenda" class="form-label">Nama Agenda</label>
        <input type="text" class="form-control @error('nama_agenda') is-invalid @enderror" id="nama_agenda" name="nama_agenda" required autofocus value="{{ old('nama_agenda') }}">
        @error('nama_agenda')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      @can('admin')
      <div class="mb-3">
        <label for="division" class="form-label">Divisi</label>
        <select class="form-select @error('division') is-invalid @enderror" id="division" name="division">
            @foreach ($divisions as $division)
                <option value="{{ $division->id }}" {{ old('division') == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
            @endforeach
        </select>
        @error('division')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      @else

      <div class="mb-3">
        <label for="division" class="form-label" hidden>Divisi</label>
        <select class="form-select @error('division') is-invalid @enderror" id="division" name="division" disabled hidden>
          @foreach ($divisions as $division)
            <option value="{{ $division->id }}" {{ old('division') == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
          @endforeach
        </select>
        <input type="hidden" id="division" name="division" value="{{ Auth::user()->division_id }}">
        <label for="division" class="form-label visually-hidden">{{ Auth::user()->division->name }}</label>
        @error('division')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>      

      @endcan

      <div class="mb-3">
        <label for="perihal" class="form-label">Perihal</label>
        <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" required value="{{ old('perihal') }}">
        @error('perihal')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="notulensi" class="form-label">Notulensi</label>
        <input id="notulensi" type="hidden" name="notulensi" value="{{ old('notulensi') }}">
        <trix-editor input="notulensi"></trix-editor>
        @error('notulensi')
        <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="waktu_pelaksanaan" class="form-label">Waktu Pelaksanaan</label>
        <input type="datetime-local" class="form-control @error('waktu_pelaksanaan') is-invalid @enderror" id="waktu_pelaksanaan" name="waktu_pelaksanaan" required value
        ="{{ old('waktu_pelaksanaan') }}">
        @error('waktu_pelaksanaan')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
        @enderror
        </div>
        <div class="mb-3">
        <label for="tempat_pelaksanaan" class="form-label">Tempat Pelaksanaan</label>
        <input type="text" class="form-control @error('tempat_pelaksanaan') is-invalid @enderror" id="tempat_pelaksanaan" name="tempat_pelaksanaan" required value="{{ old('tempat_pelaksanaan') }}">
        @error('tempat_pelaksanaan')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
        @enderror
        </div>
        <div class="mb-3">
        <label for="link_dokumentasi" class="form-label">Link Dokumentasi</label>
        <input type="text" class="form-control @error('link_dokumentasi') is-invalid @enderror" id="link_dokumentasi" name="link_dokumentasi" required value="{{ old('link_dokumentasi') }}">
        @error('link_dokumentasi')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
        @enderror
        </div>
        {{-- <button type="submit" class="btn btn-primary">Tambah Agenda</button> --}}
        {{-- coba --}}
        <form method="post" action="{{ route('agendas.store') }}" class="mb-5" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="user_id" value="{{ Auth::id() }}">
          <!-- form input lainnya -->
          <button type="submit" class="btn btn-primary">Tambah Agenda</button>
      </form>
      
        </form>
</div>

<script>
  document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
  })

  // document.addEventListener('DOMContentLoaded', function() {
  //     const today = new Date();
  //     const todayFormatted = today.toISOString().slice(0, 16); // Format the date as YYYY-MM-DDTHH:mm

  //     document.getElementById('waktu_pelaksanaan').min = todayFormatted;
  // });
  document.addEventListener('DOMContentLoaded', function() {
  const today = new Date();
  const timeZoneOffset = 8; // GMT +8 (Asia)
  today.setUTCHours(today.getUTCHours() + timeZoneOffset); // Adjust to local time in GMT +8
  const todayFormatted = today.toISOString().slice(0, 16); // Format the date as YYYY-MM-DDTHH:mm

  document.getElementById('waktu_pelaksanaan').min = todayFormatted;
});

</script>

@endsection