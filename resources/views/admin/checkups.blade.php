<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Medikal Checkup</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('adminpage') }}">Klinic</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adminpage') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.checkups') }}">Medikal Checkup</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listArticleAdmin') }}">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}">Hi, {{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('logoutAdmin') }}">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('kelola') }}">Kelola</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    <section id="checkups">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Data Medikal Checkup</h2>
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
                            <td>
                                <form action="{{ route('admin.checkups.updateStatus', $c->id) }}" method="POST">
                                    @csrf
                                    <select name="status" class="form-select" onchange="this.form.submit()">
                                        <option value="pending" {{ $c->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="done" {{ $c->status == 'done' ? 'selected' : '' }}>Done</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>