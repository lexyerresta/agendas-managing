@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit User</h1>
</div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/users/{{ $user->id }}">
            @method('patch')
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="division" class="form-label">Divisi</label>
                <select class="form-select @error('division') is-invalid @enderror" id="division" name="division">
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}" {{ old('division', $user->division_id) == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
                    @endforeach
                </select>
                @error('division')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="level_user" class="form-label">Level User</label>
                <select class="form-select @error('level_user') is-invalid @enderror" id="level_user" name="level_user">
                    <option value="admin" {{ old('level_user', $user->level_user) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="staff" {{ old('level_user', $user->level_user) == 'staff' ? 'selected' : '' }}>Staff</option>
                </select>
                @error('level_user')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Re-type Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>            

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
