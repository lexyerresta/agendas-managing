@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Permintaan Narasumber</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/narasumbers/{{ $narasumber->id }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nama Pemohon</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $narasumber->name) }}">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="tanggal_acara" class="form-label">Tanggal Acara</label>
        <input type="datetime-local" class="form-control @error('tanggal_acara') is-invalid @enderror" id="tanggal_acara" name="tanggal_acara" required value="{{ old('tanggal_acara', $narasumber->tanggal_acara ? \Carbon\Carbon::parse($narasumber->tanggal_acara)->format('Y-m-d\TH:i') : '') }}">
        @error('tanggal_acara')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="tempat" class="form-label">Tempat Acara</label>
        <input type="text" class="form-control @error('tempat') is-invalid @enderror" id="tempat" name="tempat" required autofocus value="{{ old('tempat', $narasumber->tempat) }}">
        @error('tempat')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="asal" class="form-label">Asal Instansi</label>
        <input type="text" class="form-control @error('asal') is-invalid @enderror" id="asal" name="asal" required autofocus value="{{ old('asal', $narasumber->asal) }}">
        @error('asal')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>      
      <div class="mb-3">
        <label for="no_hp" class="form-label">No WA</label>
        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" required autofocus value="{{ old('no_hp', $narasumber->no_hp) }}">
        @error('no_hp')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Ubah Permintaan Narasumber</button>
    </form>
</div>

@endsection