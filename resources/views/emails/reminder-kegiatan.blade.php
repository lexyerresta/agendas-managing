<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda Kegiatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            background-color: #F4F4F4;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary">
                        <img src="{{ asset('img/logo-bnn.png') }}" alt="logo-bnn" width="250" class="mx-auto d-block mb-1">
                        <h3 class="text-center text-white mb-1">Pengingat Agenda Kegiatan</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-center mb-4">Jangan lupa untuk menghadiri agenda kegiatan yang akan datang, War On Drugs, Speed Up Never Let Up !</p>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Agenda</th>
                                    <th>Divisi</th>
                                    <th>Perihal</th>
                                    <th>Waktu</th>
                                    <th>Tempat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agendas as $agenda)
                                    <tr>
                                        <td>{{ $agenda->nama_agenda }}</td>
                                        <td>{{ $agenda->division->name }}</td>
                                        <td>{{ $agenda->perihal }}</td>
                                        <td>{{ $agenda->waktu_pelaksanaan }}</td>
                                        <td>{{ $agenda->tempat_pelaksanaan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
