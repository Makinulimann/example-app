<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</head>

<body>
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
                            <a class="nav-link" href="{{ route('profile') }}">Hi, {{Auth::user()->name}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    <section id="Profile">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6 text-end mt-4 mb-4">
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
                <div class="card profile-card mb-4" style="width: 100%;">
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/photos/' . $user->photo) }}" alt="Profile Photo" class="profile-photo">
                        <h1 class="title text-center mb-4">Profile</h1>
                        <div class="row mt-5">
                            <div class="col-md-6 text-start">
                                <h5>Nama</h5>
                                <h5>Email</h5>
                                <h5>Nomor Telepon</h5>
                                <h5>Jenis Kelamin</h5>
                                <h5>Umur</h5>
                                <h5>Berat Badan</h5>
                                <h5>Tinggi Badan</h5>
                            </div>
                            <div class="col-md-6 text-start">
                                <h5>: {{$user->name}}</h5>
                                <h5>: {{$user->email}}</h5>
                                <h5>: {{$user->phone}}</h5>
                                <h5>: {{$user->gender}}</h5>
                                <h5>: {{$user->age}} tahun</h5>
                                <h5>: {{$user->weight}} Kg</h5>
                                <h5>: {{$user->height}} cm</h5>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="photo" class="form-label">Profile Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                            @if ($user->photo)
                            <img src="{{ asset('storage/photos/' .$user->photo) }}" alt="Profile Photo" class="mt-2" width="100">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" class="form-select">
                                <option value="pria" {{ $user->gender == 'pria' ? 'selected' : '' }}>Pria</option>
                                <option value="wanita" {{ $user->gender == 'wanita' ? 'selected' : '' }}>Wanita</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{ $user->age }}">
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight (kg)</label>
                            <input type="number" class="form-control" id="weight" name="weight" value="{{ $user->weight }}">
                        </div>
                        <div class="mb-3">
                            <label for="height" class="form-label">Height (cm)</label>
                            <input type="number" class="form-control" id="height" name="height" value="{{ $user->height }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>