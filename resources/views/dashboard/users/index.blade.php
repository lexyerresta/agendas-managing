@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List User</h1>
    </div>

    {{-- @if (session()->has('success'))
    <div class="alert alert-success col-lg-10" role="alert">
      {{ session('success') }}
    </div>
    @endif --}}

    <div class="table-responsive col-lg-10">
      <a href="/dashboard/users/create" class="btn btn-primary mb-2">Tambahkan User Baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Divisi</th>
              <th scope="col">Level User</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $user->name }}</td>  
              <td>{{ $user->username }}</td>  
              <td>{{ $user->email }}</td>  
              <td>{{ $user->division->name }}</td>  
              <td>{{ ucfirst($user->level_user) }}</td>
              <td>
                @if ($user->level_user == 'eksternal')
                    <a class="badge bg-secondary" disabled><span data-feather="edit"></span></a>
                @else
                    <a href="/dashboard/users/{{ $user->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                @endif
                @if ($user->level_user != 'admin')
                    {{-- <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Yakin untuk menghapus?')"><span data-feather="x-circle"></span></button>
                    </form> --}}
                    @if ($user->status)
                        <form action="/dashboard/users/{{ $user->id }}/unactive" method="post" class="d-inline">
                            @method('put')
                            @csrf
                            <button class="badge bg-danger border-0"><span data-feather="toggle-right"></span></button>
                        </form>
                        @else
                        <form action="/dashboard/users/{{ $user->id }}/active" method="post" class="d-inline">
                            @method('put')
                            @csrf
                            <button class="badge bg-secondary border-0"><span data-feather="toggle-left"></span></button>
                        </form>
                    @endif
                @endif

                {{-- <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Yakin untuk menghapus?')"><span data-feather="x-circle"></span></button>
                </form> --}}
              </td>
            </tr>  
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

{{-- Searching --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function() {
      $('.table').DataTable({
          "pagingType": "full_numbers",
          "searching": true,
          "ordering": true,
          "lengthMenu": [ 10, 25, 50, 75, 100 ],
          "language": {
              "paginate": {
                  "next": "Selanjutnya",
                  "previous": "Sebelumnya",
                  "first": false,
                  "last": false
              },
              "search": "Cari:",
              "lengthMenu": "Tampilkan _MENU_ data per halaman",
              "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ user"
          },
          "columnDefs": [
              { "searchable": false, "targets": 3 }
          ]
      });
  });
</script>

@endsection