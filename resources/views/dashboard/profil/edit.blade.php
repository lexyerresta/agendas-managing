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
    <h1 class="h2">Edit Profil BNNP Bali</h1>
</div>

<div class="col-lg-8">
    <form action="{{ route('profilbnnp.update',['id'=>$profil->id]) }}" method="POST" enctype="multipart/form-data">
        @method('put')
    @csrf
      <div class="mb-3">
        <label for="judul_profil" class="form-label">Judul Profil</label>
        <input type="text" class="form-control @error('judul_profil') is-invalid @enderror" id="judul_profil" name="judul_profil" required autofocus value="{{ old('judul_profil', $profil->judul_profil) }}">
        @error('judul_profil')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="isi_profil" class="form-label">Isi Profil</label>
        <input id="isi_profil" type="hidden" name="isi_profil" value="{{ old('isi_profil', $profil->isi_profil) }}">
        <trix-editor input="isi_profil"></trix-editor>
        @error('isi_profil')
        <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Ubah Profil BNNP Bali</button>
    </form>
</div>

<script>
    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
    })
</script>

@endsection