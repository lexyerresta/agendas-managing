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
    <h1 class="h2">Tambah Pengumuman</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/pengumumans" class="mb-5" enctype="multipart/form-data">
    @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Judul Pengumuman</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
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
      <div class="mb-3">
        <label for="body" class="form-label">Isi Pengumuman</label>
        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        <trix-editor input="body"></trix-editor>
        @error('body')
        <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Tambah Pengumuman</button>
    </form>
</div>

<script>
    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
    })
</script>

@endsection
