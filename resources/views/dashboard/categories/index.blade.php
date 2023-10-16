@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kategori Artikel</h1>
    </div>

    {{-- @if (session()->has('success'))
    <div class="alert alert-success col-lg-6" role="alert">
      {{ session('success') }}
    </div>
    @endif --}}

    <div class="table-responsive col-lg-6">
      <a href="/dashboard/categories/create" class="btn btn-primary mb-2">Buat Kategori Baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Kategori</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $category->name }}</td>  
              <td>
                <a href="/dashboard/categories/{{ $category->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                {{-- <form action="/dashboard/categories/{{ $category->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Yakin untuk menghapus?')"><span data-feather="toggle-right"></span></button>
                </form> --}}
                @if ($category->status)
                        <form action="/dashboard/categories/{{ $category->id }}/unactive" method="post" class="d-inline">
                            @method('put')
                            @csrf
                            <button class="badge bg-danger border-0"><span data-feather="toggle-right"></span></button>
                        </form>
                        @else
                        <form action="/dashboard/categories/{{ $category->id }}/active" method="post" class="d-inline">
                            @method('put')
                            @csrf
                            <button class="badge bg-secondary border-0"><span data-feather="toggle-left"></span></button>
                        </form>
                    @endif
              </td>
            </tr>  
            @endforeach
          </tbody>
        </table>
      </div>
@endsection