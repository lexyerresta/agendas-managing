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
    <div class="col-lg-5">

      @if (session()->has('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="card shadow">
        <div class="card-body">
          <div style="display: flex; align-items: center; justify-content: center;">
            <img src="img/logo-bnn.png" alt="logo-bnn" width="350">
          </div>
          <h1 class="h3 mb-3 fw-normal text-center">Silahkan Login</h1>
          <form action="/login" method="post">
            @csrf
            <div class="form-floating">
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Name@example.com" autofocus required value="{{ old('email') }}">
              <label for="email">Email address</label>
              @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
  
            <div class="form-floating mb-3">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
              <label for="password">Password</label>
            </div>
  
            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
          </form>
          <small class="d-block text-center m-3">Belum memiliki akun? <a href="/register" class="text-decoration-none text-blue">Registrasi Sekarang!</a></small>
          <p class="mt-1 mb-0 text-body-secondary text-center">&copy; 2023 Badan Narkotika Nasional (BNN) Provinsi Bali</p>

        </div>
      </div>
    </div>
  </div>  

@endsection