@extends('layouts.site')

@section('title', $book->title)

@section('content')
    <section class="detail-page">
        <a class="back-link" href="{{ route('books.index') }}">← Kembali ke katalog</a>
        <div class="detail-grid">
            <div class="detail-cover cover-{{ $book->id % 5 }}">
                <span class="cover-kicker">RUANG BACA · {{ $book->year }}</span>
                <span class="cover-title">{{ $book->title }}</span>
                <span class="cover-author">{{ $book->author }}</span>
                <span class="cover-seal">RB</span>
            </div>
            <div class="detail-copy">
                <p class="eyebrow">CATATAN BACAAN · {{ $book->year }}</p>
                <h1>{{ $book->title }}</h1>
                <p class="detail-author">oleh <em>{{ $book->author }}</em></p>
                <div class="detail-rule"></div>
                <dl class="book-facts">
                    <div><dt>Penulis</dt><dd>{{ $book->author }}</dd></div>
                    <div><dt>Penerbit</dt><dd>{{ $book->publisher }}</dd></div>
                    <div><dt>Tahun terbit</dt><dd>{{ $book->year }}</dd></div>
                    <div><dt>Ketersediaan</dt><dd>{{ $book->stock > 0 ? $book->stock.' eksemplar tersedia' : 'Sedang dipinjam' }}</dd></div>
                </dl>
                <p class="detail-note">Setiap buku punya waktu yang tepat untuk ditemukan. Semoga cerita ini menjadi teman baik di sela harimu.</p>
                @if ($book->stock > 0)
                    <a class="button-link" href="{{ url('/admin/login') }}">Masuk untuk meminjam <span aria-hidden="true">↗</span></a>
                @else
                    <span class="button-link is-disabled" aria-disabled="true">Buku sedang dipinjam</span>
                @endif
            </div>
        </div>
    </section>
@endsection
