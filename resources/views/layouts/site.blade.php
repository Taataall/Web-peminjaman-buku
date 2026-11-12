<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f4ebdd">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <title>@yield('title', 'Website Peminjaman Buku') · Ruang Baca</title>
    <meta name="description" content="Jelajahi katalog dan pinjam buku pilihan di Ruang Baca.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="site-shell">
        <header class="masthead">
            <a class="wordmark" href="{{ route('home') }}" aria-label="Ruang Baca, halaman utama">
                <span class="wordmark-mark">RB</span>
                <span><strong>RUANG BACA</strong><small>PERPUSTAKAAN · SEJAK 2026</small></span>
            </a>
            <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-navigation">Menu</button>
            <nav class="site-nav" id="site-navigation" aria-label="Navigasi utama">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('books.index') }}">Katalog</a>
                <a href="{{ url('/admin/loans') }}">Peminjaman</a>
                <a class="nav-login" href="{{ url('/admin/login') }}">{{ auth()->check() ? 'Dashboard' : 'Masuk' }} <span aria-hidden="true">↗</span></a>
            </nav>
        </header>

        <main>@yield('content')</main>

        <footer class="site-footer">
            <a class="footer-brand" href="{{ route('home') }}">RUANG BACA</a>
            <p>Temukan cerita yang tinggal lebih lama.</p>
            <span>WEBSITE PEMINJAMAN BUKU · 2026</span>
        </footer>
    </div>
    <script>
        const menuButton = document.querySelector('.menu-toggle');
        const navigation = document.querySelector('.site-nav');

        menuButton?.addEventListener('click', () => {
            const isOpen = menuButton.getAttribute('aria-expanded') === 'true';
            menuButton.setAttribute('aria-expanded', String(!isOpen));
            navigation?.classList.toggle('is-open', !isOpen);
        });
    </script>
</body>
</html>
