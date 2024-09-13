<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
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
                            <a class="nav-link" href="#layanan">Layanan</a>
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

    <!-- Caraousel -->
    <section id="caraousel">
        <div id="carousel" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                @foreach($articles as $index => $article)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="/storage/photos/{{ $article->image }}" class="d-block w-100" alt="{{ $article->title }}">
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- layanan -->
    <section id="layanan">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 layanan" type="button">
                    <img src="assets/gambar.svg" alt="" class="img-layanan">
                    <h4>tanya dokter</h4>
                </div>
                <div class="col-md-3 layanan" type="button">
                    <img src="assets/gambar.svg" alt="" class="img-layanan">
                    <h4>apotek</h4>
                </div>
                <div class="col-md-3 layanan" type="button">
                    <img src="assets/gambar.svg" alt="" class="img-layanan">
                    <h4>lab & vaksinasi</h4>
                </div>
                <div class="col-md-3 layanan" type="button" onclick="location.href='{{route('checkup.show')}}'">
                    <img src="assets/gambar.svg" alt="" class="img-layanan">
                    <h4>medikal checkup</h4>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- artikel -->
    <section id="artikel">
        <div class="container">
            <h2 class="text-start mb-4">Yuk Baca Artikel</h2>
            <div class="d-flex justify-content-start mb-4">
                <a href="{{ route('listArticle') }}" class="btn btn-primary">Lihat Semua</a>
            </div>
            <div class="row">
                @foreach($articles as $article)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="/storage/photos/{{ $article->image }}" class="card-img-top" alt="{{ $article->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text"><span class="badge bg-secondary">{{ $article->category }}</span></p>
                            <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                            <a class="btn btn-primary" href="{{ route('article', $article->id) }}">lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <a href="#">Klinic</a>
            <div class="row">
                <div class="col-md-4">
                    <h4>Site Map</h4>
                    <ul>
                        <li>FAQ</li>
                        <li>Blog</li>
                        <li>S&K</li>
                        <li>Kebijakan Privasi</li>
                    </ul>
                </div>
                <div class="col-md-4 text-center">
                    <h4>Lorem ipsum</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fermentum, libero in porttitor
                        condimentum, est quam sollicitudin dolor, congue porta elit metus rhoncus nunc.</p>
                </div>
                <div class="col-md-4 text-end">
                    <h4>Download App di</h4>
                </div>
            </div>
        </div>
    </section>


</body>

</html>