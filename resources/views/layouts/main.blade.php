<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BNNP Bali | {{ $title }}</title>
    <link rel="icon" href="https://bali.bnn.go.id/konten/unggahan/2019/03/cropped-bnn-512x512-100x100.png" sizes="32x32">
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    
    {{-- My Styles --}}
    <link rel="stylesheet" href="/css/style.css">

  </head>

  <style>
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    
    html {
        height: 100%;
    }
    
    .container {
        min-height: 100%;
    }
  </style>

  <body>

    @include('partials.navbar')

    {{-- Isi Body --}}
    <div class="container mt-4">
        @yield('container')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    @include('partials.footer')

  </body>
</html>

<script>
//Delete alert
function confirmDelete(button) {
    const form = button.parentElement;
    Swal.fire({
        title: 'Yakin Untuk Menghapus?',
        text: "Anda tidak akan dapat mengembalikan ini!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus ini!'
    }).then((result) => {
        if (result.isConfirmed) {
        form.submit(); // submit the form after the confirmation
        }
    });
    }
</script>