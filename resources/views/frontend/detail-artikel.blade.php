<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/Logo-b.png') }}" type="image/x-icon">
    <title>WebArtikel</title>

    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
</head>

<body>
    <nav class="navbar py-4 bg-soft-blue">
        <div class="container justify-content-between">
            <a href="." class="logo">
                <img src="{{ asset('frontend/assets/images/Logo-b.png') }}" alt="WebArtikel">
                <span>WebArtikel</span>
            </a>
            @auth
                <a href="{{ route('admin.dashboard') }}" class="link">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
            @endauth
        </div>
    </nav>

    <section class="bg-soft-blue">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="text-dark fw-bold">
                        {{ $detailArtikel->title }}
                    </h1>
                    <p class="mb-0 text-secondary fs-7">Dipublish pada
                        {{ Carbon\Carbon::parse($detailArtikel->created_at)->translatedFormat('d F Y') }}
                        oleh
                        {{ $detailArtikel->user->name }}</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <img src="{{ url('storage/' . $detailArtikel->thumbnail) }}" alt="Image" class="rounded-2 mb-5">

                    <div class="text-secondary">
                        {!! $detailArtikel->body !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-5 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5>About Us</h5>
                    <p>WebArtikel adalah website yang menampilkan berita terbaru seputar pemrograman</p>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Home</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Courses</a></li>
                        <li><a href="#" class="text-white text-decoration-none">About Us</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5>Contact Us</h5>
                    <p>Jl. Bumi Manti III NO.157</p>
                    <p>Email: maulana.ikhsan2060@gmail.com</p>
                    <p>Phone: +62 896-3375-5424</p>
                </div>
            </div>
            <hr class="my-4 text-secondary">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
                <p class="mb-0 fs-7 text-secondary text-center w-100">
                    &copy; 2024 Maulana Ikhsan <br>
                </p>
                <div class="social-icons">
                    <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('frontend/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
