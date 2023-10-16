@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Artikel</h1>
    </div>

    <a href="/dashboard/articles/" class="btn btn-success mb-2">Artikel Terpublikasi</a>

    @include('partials.date_sorting')

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive col-lg-12">
      <table class="table table-striped table-sm">
          <thead>
              <tr>
                  <th scope="col">No</th>
                  <th scope="col">Judul Artikel</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Author</th>
                  <th scope="col">Tanggal Dibuat</th>
                  <th scope="col">Aksi</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($articles as $article)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $article->title }}</td>
                  <td>{{ $article->category->name }}</td>
                  <td>{{ $article->author->name }}</td>
                  <td>{{ $article->formatted_created_at }}</td>
                  <td>
                      <a href="/dashboard/articles/{{ $article->slug }}" class="badge bg-primary"><span data-feather="eye"></span></a>
                      <a href="/dashboard/articles/{{ $article->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                      @if ($article->status)
                      <form action="/dashboard/articles/{{ $article->slug }}/archive" method="post" class="d-inline">
                          @method('put')
                          @csrf
                          <button class="badge bg-danger border-0" onclick="return confirm('Anda ingin mengarsipkan artikel ini?')"><span data-feather="archive"></span></button>
                      </form>
                      @else
                      <form action="/dashboard/articles/{{ $article->slug }}/publish" method="post" class="d-inline">
                          @method('put')
                          @csrf
                          <button class="badge bg-success border-0" onclick="return confirm('Anda ingin mempublish artikel ini?')"><span data-feather="check-circle"></span></button>
                      </form>
                      @endif
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
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
              "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ artikel"
          },
          "columnDefs": [
              { "searchable": false, "targets": 3 }
          ]
      });
  });
</script>
        
@endsection
