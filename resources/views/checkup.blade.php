<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical checkup</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</head>

<body>

    <!-- NAVBAR -->
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">Klinic</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#layanan">Medikal Checkup</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listArticle') }}">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}">Hi, {{Auth::user()->name}}</a>
                        </li>

                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    <!-- FORM SECTION -->
    <section id="form-section" class="mt-5">
        <div class="container">
            <h2 class="mb-4">Form Pendaftaran Medical Check Up</h2>
            
            <!-- Table of checkup data -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Data Checkup</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Nomor HP</th>
                                    <th>Tinggi Badan (cm)</th>
                                    <th>Berat Badan (kg)</th>
                                    <th>Rumah Sakit</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($checkups as $c)
                                <tr>
                                    <td>{{ $c->nama }}</td>
                                    <td>{{ $c->age }}</td>
                                    <td>{{ $c->phone }}</td>
                                    <td>{{ $c->height }}</td>
                                    <td>{{ $c->weight }}</td>
                                    <td>{{ $c->rumah_sakit }}</td>
                                    <td>{{ $c->status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Form inside card -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Isi Formulir</h5>
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Umur</label>
                            <input type="number" class="form-control" id="age" name="age" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="height" class="form-label">Tinggi Badan (cm)</label>
                            <input type="number" class="form-control" id="height" name="height" required>
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Berat Badan (kg)</label>
                            <input type="number" class="form-control" id="weight" name="weight" required>
                        </div>
                        <div class="mb-3">
                            <label for="rumah_sakit" class="form-label">Rumah Sakit</label>
                            <select name="rumah_sakit" id="rumah_sakit" class="form-control" required>
                                <option value="RS Medika">RS Medika</option>
                                <option value="RS Brawijaya">RS Brawijaya</option>
                                <option value="RS Unisma">RS Unisma</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </section>
</body>

</html>
