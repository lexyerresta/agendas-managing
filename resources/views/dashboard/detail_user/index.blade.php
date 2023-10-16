@extends('dashboard.layouts.main')

@section('container')
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">User</a></li> --}}
              <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none text-dark">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/dashboard/profile" class="text-decoration-none">User Profile</a></li>
            </ol>
          </nav>
        </div>
      </div>
  
      @if (session()->has('success'))
      <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
      </div>
      @endif

      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="{{ asset('img/logo-bnn.png') }}"
                class="rounded-circle img-fluid" style="width: 203px;">
              <h5 class="my-3">{{ $user->name }}</h5>
              <p class="text-muted mb-1"> {{ $user->email }}</p>
              <p class="text-muted mb-4">Divisi {{ $user->division->name }}</p>
            </div>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="card mb-1">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nama Lengkap</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Level User</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ ucwords($user->level_user) }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Divisi</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->division->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Username</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->username }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-start mb-2">
            <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary me-1" style="width: 50%">Edit Profil</a>
            <a href="{{ route('profile.editpassword') }}" class="btn btn-outline-danger" style="width: 50%">Ubah Password</a>
          </div>
        </div>
      </div>
    </div>
@endsection