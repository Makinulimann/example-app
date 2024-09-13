<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('index') }}">Klinic</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </section>

    <section id="login">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title d-flex justify-content-center">Register</h4>
                        <form action="{{ route('registerPost') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" required value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group d-flex justify-content-center">
                                <input class="btn btn-primary" type="submit" value="Register">
                            </div>
                        </form>
                        <p>Sudah punya akun? <a href="{{ route('login') }}">Login disini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="background-video">
        <video autoplay muted loop class="myVideo">
            <source src="assets/video.mp4" type="video/mp4">
        </video>
    </section>
</body>

</html>
