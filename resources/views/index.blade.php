<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinic</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="index.js"></script>
</head>
<body>
    <!-- NAVBAR -->
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('index') }}">Klinic</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#layanan">Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listArticle') }}">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tentang">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Kontak</a>
                        </li>
                    </ul>
                    <a class="btn btn-primary" href="{{route('login')}}">Login</a>
                </div>
            </div>
        </nav>
    </section>

    <!-- BANNER -->
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="slogan">Klinic siap menjadi teman kesehatan anda selama 24/7S</p>
                    <p>Kami adalah pusat kesehatan terpercaya yang memberikan layanan berkualitas tinggi untuk Anda dan
                        keluarga.
                    </p>
                    <a class="btn btn-primary" href="{{route('register')}}">Get Started</a>
                </div>
                <div class="col-md-6 text-center">
                    <img src="assets/hero.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- LAYANAN -->
    <section id="layanan">
        <div class="container text-center">
            <h1 class="title">Ada apa aja sih?</h1>
            <div class="row text-center">
                <div class="col-md-3 layanan">
                    <img src="assets/gambar.svg" alt="" class="img-layanan">
                    <h4>layanan</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a condimentum urna. Ut nunc tellus,
                        porta eget condimentum ut, lobortis.</p>
                </div>
                <div class="col-md-3 layanan">
                    <img src="assets/gambar.svg" alt="" class="img-layanan">
                    <h4>layanan</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a condimentum urna. Ut nunc tellus,
                        porta eget condimentum ut, lobortis.</p>
                </div>
                <div class="col-md-3 layanan">
                    <img src="assets/gambar.svg" alt="" class="img-layanan">
                    <h4>layanan</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a condimentum urna. Ut nunc tellus,
                        porta eget condimentum ut, lobortis.</p>
                </div>
                <div class="col-md-3 layanan">
                    <img src="assets/gambar.svg" alt="" class="img-layanan">
                    <h4>layanan</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a condimentum urna. Ut nunc tellus,
                        porta eget condimentum ut, lobortis.</p>
                </div>
            </div>
            <button type="button" class="btn btn-primary"> lainnya </button>
        </div>
    </section>

    <!-- Tentang -->
    <Section id="tentang">
        <div class="container text-center">
            <h1 class="title text-center">Tentang Kami</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fermentum, libero in porttitor
                condimentum, est quam sollicitudin dolor, congue porta elit metus rhoncus nunc. Donec risus nunc,
                dapibus quis dui at, rhoncus tincidunt velit. Class aptent taciti sociosqu ad litora torquent per
                conubia nostra, per inceptos himenaeos. Morbi ullamcorper leo nunc, sit amet dictum sapien laoreet a.
                Proin condimentum enim eu eros scelerisque, eget facilisis urna ornare. Cras vitae eros est. Vivamus
                pharetra dui quis lacus convallis lacinia. Fusce fringilla gravida viverra. Suspendisse vulputate rutrum
                lectus, sed iaculis nisi interdum ut.</p>
            <p>Nulla cursus nunc ut nisi porttitor, sit amet porta orci tempus. Vestibulum pulvinar sapien at orci
                ultricies, ut feugiat nibh pellentesque. Cras ultrices massa ac suscipit scelerisque. Maecenas ut mi at
                sapien rutrum hendrerit. Sed tincidunt pulvinar lorem sit amet porta. Integer at ligula sed urna
                suscipit semper. Fusce sollicitudin ac turpis pharetra elementum. Pellentesque habitant morbi tristique
                senectus et netus et malesuada fames ac turpis egestas. Aliquam odio elit, volutpat et feugiat non,
                feugiat in urna.</p>
        </div>
    </Section>

    <!-- ARTIKEL -->
    <Section id="artikel" class="overflow-hidden">
        <h1 class="title text-center">Artikel</h1>
        <div class="container position-relative">
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
    </Section>

    <!-- Contact -->
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
