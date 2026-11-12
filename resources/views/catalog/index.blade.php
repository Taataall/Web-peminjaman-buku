@extends('layouts.site')

@section('title', 'Katalog Buku')

@section('content')
    <section class="cover-story">
        <div class="cover-copy">
            <p class="eyebrow">PERPUSTAKAAN RUANG BACA</p>
            <h1>Selamat datang!</h1>
            <p class="cover-intro">Cari buku yang ingin dibaca dan cek ketersediaannya di sini.</p>
            <a class="text-link" href="#koleksi">Lihat katalog</a>
        </div>
        <div class="cover-art">
            <p class="eyebrow">REKOMENDASI BUKU</p>
            @if ($featuredBooks->isNotEmpty())
                <a class="featured-book" href="{{ route('books.show', $featuredBooks->first()) }}">
                    <strong>{{ $featuredBooks->first()->title }}</strong>
                    <small>{{ $featuredBooks->first()->author }}</small>
                </a>
            @else
                <p class="featured-empty">Belum ada buku di katalog. Cek lagi nanti, ya.</p>
            @endif
        </div>
    </section>

    <section class="collection-section" id="koleksi">
        <div class="section-heading">
            <div><p class="eyebrow">KOLEKSI PERPUSTAKAAN</p><h2>Daftar Buku</h2></div>
            <p class="catalog-meta">{{ number_format($bookCount) }} judul terarsip<br>{{ number_format($availableCount) }} tersedia dipinjam</p>
        </div>

        <form class="search-bar" action="{{ route('books.index') }}" method="GET" role="search">
            <label class="sr-only" for="book-search">Cari buku atau penulis</label>
            <input id="book-search" type="search" name="q" value="{{ $search }}" placeholder="Cari judul, penulis, atau penerbit...">
            <button type="submit">Cari <span aria-hidden="true">↗</span></button>
        </form>

        @if ($books->isEmpty())
            <div class="empty-state"><p class="eyebrow">BELUM ADA HASIL</p><h3>Rak ini masih menunggu.</h3><p>Coba kata kunci lain untuk menemukan buku yang kamu cari.</p><a class="text-link" href="{{ route('books.index') }}">Tampilkan semua buku</a></div>
        @else
            <div class="book-grid">
                @foreach ($books as $book)
                    <article class="book-card">
                        <a class="book-cover cover-{{ $loop->iteration % 5 }}" href="{{ route('books.show', $book) }}" aria-label="Lihat detail {{ $book->title }}">
                            <span class="cover-kicker">{{ str_pad((string) ($books->firstItem() + $loop->index), 2, '0', STR_PAD_LEFT) }} / RUANG BACA</span>
                            <span class="cover-title">{{ $book->title }}</span>
                            <span class="cover-author">{{ $book->author }}</span>
                            <span class="cover-seal">RB</span>
                        </a>
                        <div class="book-info">
                            <div><p class="book-author">{{ $book->author }}</p><h3><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></h3></div>
                            <span class="availability {{ $book->stock > 0 ? 'is-available' : 'is-unavailable' }}">{{ $book->stock > 0 ? 'Tersedia' : 'Dipinjam' }}</span>
                        </div>
                        <div class="book-meta"><span>{{ $book->publisher }}</span><span>{{ $book->year }}</span></div>
                    </article>
                @endforeach
            </div>

            <div class="pagination-wrap">{{ $books->links() }}</div>
        @endif
    </section>

    <section class="borrow-note">
        <p class="eyebrow">CARA MEMINJAM · 3 LANGKAH</p>
        <div class="borrow-steps">
            <div><span>01</span><h3>Pilih cerita</h3><p>Temukan judul yang ingin kamu baca dari katalog kami.</p></div>
            <div><span>02</span><h3>Masuk akun</h3><p>Login untuk melihat ketersediaan dan mengajukan pinjaman.</p></div>
            <div><span>03</span><h3>Baca perlahan</h3><p>Ambil buku di perpustakaan dan nikmati setiap halamannya.</p></div>
        </div>
        <a class="button-link" href="{{ url('/admin/login') }}">Mulai meminjam <span aria-hidden="true">↗</span></a>
    </section>
@endsection
