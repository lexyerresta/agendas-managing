@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Permintaan Kunjungan</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/kunjungans/{{ $kunjungan->id }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nama Pemohon</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $kunjungan->name) }}">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="waktu_kunjungan" class="form-label">Rencana Kunjungan</label>
        <input type="datetime-local" class="form-control @error('waktu_kunjungan') is-invalid @enderror" id="waktu_kunjungan" name="waktu_kunjungan" required value="{{ old('waktu_kunjungan', $kunjungan->waktu_kunjungan ? \Carbon\Carbon::parse($kunjungan->waktu_kunjungan)->format('Y-m-d\TH:i') : '') }}">
        @error('waktu_kunjungan')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="keperluan" class="form-label">Keperluan</label>
        <input type="text" class="form-control @error('keperluan') is-invalid @enderror" id="keperluan" name="keperluan" required autofocus value="{{ old('keperluan', $kunjungan->keperluan) }}">
        @error('keperluan')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="asal" class="form-label">Asal Instansi</label>
        <input type="text" class="form-control @error('asal') is-invalid @enderror" id="asal" name="asal" required autofocus value="{{ old('asal', $kunjungan->asal) }}">
        @error('asal')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>      
      <div class="mb-3">
        <label for="no_hp" class="form-label">No WA</label>
        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" required autofocus value="{{ old('no_hp', $kunjungan->no_hp) }}">
        @error('no_hp')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Ubah Permintaan Kunjungan</button>
    </form>
</div>

@endsection