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

      @if (session()->has('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="card shadow">
        <div class="card-body">
          <div style="display: flex; align-items: center; justify-content: center;">
            <img src="img/logo-bnn.png" alt="logo-bnn" width="350">
          </div>
          <h1 class="h3 mb-3 fw-normal text-center">Form Permintaan Kunjungan</h1>
          <form action="/kunjungan" method="post">
            @csrf
            <div class="form-floating">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama" required value="{{ old('name') }}">
                <label for="name">Nama Pemohon</label>
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="datetime-local" name="waktu_kunjungan" class="form-control @error('waktu_kunjungan') is-invalid @enderror" id="waktu_kunjungan" placeholder="Waktu Kunjungan" required value="{{ old('waktu_kunjungan') }}">
                <label for="waktu_kunjungan">Waktu Kunjungan</label>
                @error('waktu_kunjungan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="keperluan" class="form-control @error('keperluan') is-invalid @enderror" id="keperluan" placeholder="keperluan" required value="{{ old('keperluan') }}">
                <label for="keperluan">Keperluan</label>
                @error('keperluan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="asal" class="form-control @error('asal') is-invalid @enderror" id="asal" placeholder="Asal" required>
                <label for="asal">Asal Instansi</label>
                @error('asal')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
              <input type="tel" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Nomor Telepon" required value="{{ old('no_hp') }}">
              <label for="no_hp">Nomor Telepon</label>
              @error('no_hp')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>        
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Ajukan Permintaan</button>
          </form>
          <p class="mt-1 mb-0 text-body-secondary text-center">&copy; 2023 Badan Narkotika Nasional (BNN) Provinsi Bali</p>
      </div>
    </div>
  </div>
</div>  
@endsection

<script>
  // document.addEventListener('DOMContentLoaded', function() {
  //   const today = new Date();
  //   today.setDate(today.getDate() + 1); // Adding 1 day to today's date
  //   const tomorrow = today.toISOString().slice(0, 16); // Format the date as YYYY-MM-DDTHH:mm

  //   document.getElementById('waktu_kunjungan').min = tomorrow;
  // });
  document.addEventListener('DOMContentLoaded', function() {
  const today = new Date();
  const timeZoneOffset = 8; // GMT +8 (Asia)
  today.setUTCHours(today.getUTCHours() + timeZoneOffset); // Adjust to local time in GMT +8
  today.setDate(today.getDate() + 1); // Adding 1 day to today's date
  const tomorrow = today.toISOString().slice(0, 16); // Format the date as YYYY-MM-DDTHH:mm

  document.getElementById('waktu_kunjungan').min = tomorrow;
});
</script>