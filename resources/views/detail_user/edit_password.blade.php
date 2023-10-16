@extends('layouts.main')

@section('container')
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-dark">Home</a></li>
                        <li class="breadcrumb-item"><a href="/userprofile" class="text-decoration-none text-dark">User Profile</a></li>
                        <li class="breadcrumb-item"><a href="/userprofile/editpassword" class="text-decoration-none">Change Password</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-3">Change Password</h5>
                        <form action="{{ route('userprofile.updatepassword',['id'=>$user->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                    id="current_password" name="current_password" placeholder="Current Password">
                                <label for="current_password">Password Sekarang</label>
                                @error('current_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control"
                                    id="password" name="password" placeholder="New Password">
                                <label for="password">Password Baru</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
