@extends('layouts.main')

@section('container')

<style>
.card form input {
  border: none;
  border-radius: 0;
  border-bottom: 1px solid #ddd;
  outline: none;
}

.card button {
  background: linear-gradient(to right, #2980B9, #2C3E50);
  border: none;
  border-radius: 25px;
  color: #fff;
  font-weight: bold;
  padding: 10px 20px;
  text-transform: uppercase;
}
</style>

<div class="row justify-content-center p-5 pt-2 m-5">
    <div class="col-lg-6">
      <div class="card shadow">
        <div class="card-body">
          <div style="display: flex; align-items: center; justify-content: center;">
            <img src="img/logo-bnn.png" alt="logo-bnn" width="350">
          </div>
          <h1 class="h3 mb-3 fw-normal text-center">Form Registrasi</h1>
          <form action="/register" method="post">
            @csrf
            <div class="form-floating">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama" required value="{{ old('name') }}">
                <label for="name">Nama</label>
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Registrasi</button>
          </form>
          <small class="d-block text-center m-3">Sudah memiliki akun? <a href="/login" class="text-decoration-none text-blue">Login Sekarang!</a></small>
          <p class="mt-1 mb-0 text-body-secondary text-center">&copy; 2023 Badan Narkotika Nasional (BNN) Provinsi Bali</p>

        </div>
      </div>
    </div>
  </div>  

@endsection