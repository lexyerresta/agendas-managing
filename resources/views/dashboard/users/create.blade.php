@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah User Baru</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/users" class="mb-5" enctype="multipart/form-data">
    @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('username') }}">
        @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ old('email') }}">
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="division" class="form-label">Divisi</label>
        <select class="form-select" name="division_id">
            @foreach ($divisions as $division)
                @if ($division->name !== 'Masyarakat')
                    @if(old('division_id') == $division->id)
                        <option value="{{ $division->id }}" selected>{{ $division->name }}</option>
                    @else
                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                    @endif
                @endif
            @endforeach
        </select>
      </div>    
      <div class="mb-3">
        <label for="level_user" class="form-label">Level User</label>
        <select class="form-select" name="level_user">
          @foreach ($users as $user)
              @if(old('level_user') == $user->level_user)
                  <option value="{{ $user->level_user }}" selected>{{ ucfirst($user->level_user) }}</option>
              @else
                  <option value="{{ $user->level_user }}">{{ ucfirst($user->level_user) }}</option>
              @endif
          @endforeach
        </select>
      </div>   
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus value="{{ old('password') }}">
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
          <label for="password_confirmation" class="form-label">Re-type Password</label>
          <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required autofocus>
          @error('password_confirmation')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
      </div>
    
      <button type="submit" class="btn btn-primary">Tambah User</button>
    </form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
      fetch('/dashboard/articles/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
    })

    function previewImage() {
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
</script>

@endsection