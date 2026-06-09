<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">Toko Fayyad</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/products">Katalog Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">Tentang Kami</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="/cart">
                        Keranjang
                        @if(session('cart'))
                            <span class="badge bg-danger">{{ count(session('cart')) }}</span>
                        @endif
                    </a>
                </li>
            </ul>
            <div class="d-flex gap-2 ms-3">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-sm">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-light btn-sm">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-warning btn-sm">Daftar</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
