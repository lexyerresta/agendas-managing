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
    <h1 class="h2">Edit Agenda</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/agendas/{{ $agenda->id }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf
      <div class="mb-3">
        <label for="nama_agenda" class="form-label">Nama Agenda</label>
        <input type="text" class="form-control @error('nama_agenda') is-invalid @enderror" id="nama_agenda" name="nama_agenda" required autofocus value="{{ old('nama_agenda', $agenda->nama_agenda) }}">
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
                <option value="{{ $division->id }}" {{ old('division', $agenda->division_id) == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
            @endforeach
        </select>
        @error('division')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      @endcan

      <div class="mb-3">
        <label for="perihal" class="form-label">Perihal</label>
        <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" required value="{{ old('perihal', $agenda->perihal) }}">
        @error('perihal')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="notulensi" class="form-label">Notulensi</label>
        <input id="notulensi" type="hidden" name="notulensi" value="{{ old('notulensi', $agenda->notulensi) }}">
        <trix-editor input="notulensi"></trix-editor>
        @error('notulensi')
        <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="waktu_pelaksanaan" class="form-label">Waktu Pelaksanaan</label>
        <input type="datetime-local" class="form-control @error('waktu_pelaksanaan') is-invalid @enderror" id="waktu_pelaksanaan" name="waktu_pelaksanaan" required value="{{ old('waktu_pelaksanaan', $agenda->waktu_pelaksanaan ? \Carbon\Carbon::parse($agenda->waktu_pelaksanaan)->format('Y-m-d\TH:i') : '') }}">
        @error('waktu_pelaksanaan')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="tempat_pelaksanaan" class="form-label">Tempat Pelaksanaan</label>
        <input type="text" class="form-control @error('tempat_pelaksanaan') is-invalid @enderror" id="tempat_pelaksanaan" name="tempat_pelaksanaan" required value="{{ old('tempat_pelaksanaan', $agenda->tempat_pelaksanaan) }}">
        @error('tempat_pelaksanaan')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="link_dokumentasi" class="form-label">Link Dokumentasi</label>
        <input type="text" class="form-control @error('link_dokumentasi') is-invalid @enderror" id="link_dokumentasi" name="link_dokumentasi" required value="{{ old('link_dokumentasi', $agenda->link_dokumentasi) }}">
        @error('link_dokumentasi')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Ubah Agenda</button>
    </form>
</div>

<script>
    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
    })
</script>

@endsection