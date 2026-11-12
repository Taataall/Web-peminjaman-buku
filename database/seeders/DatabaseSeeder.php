<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if (! User::query()->where('role', 'admin')->exists()) {
            User::create([
                'email' => 'admin@gmail.com',
                'name' => 'Admin',
                'password' => 'password',
                'role' => 'admin',
            ]);
        }

        User::updateOrCreate(
            ['email' => 'siswa@perpus.test'],
            [
                'name' => 'Taehyung',
                'password' => 'password',
                'role' => 'siswa',
                'kelas' => 'XII RPL 2',
            ],
        );

        $books = [
            [
                'title' => 'Bumi Manusia',
                'author' => 'Pramoedya Ananta Toer',
                'publisher' => 'Lentera Dipantara',
                'year' => 1980,
                'stock' => 3,
            ],
            [
                'title' => 'Negeri 5 Menara',
                'author' => 'Ahmad Fuadi',
                'publisher' => 'Gramedia Pustaka Utama',
                'year' => 2009,
                'stock' => 2,
            ],
            [
                'title' => 'Laut Bercerita',
                'author' => 'Leila S. Chudori',
                'publisher' => 'Kepustakaan Populer Gramedia',
                'year' => 2017,
                'stock' => 5,
            ],
        ];

        $previousBookTitles = [
            'Bumi Manusia' => ['Laskar Pelangi', 'Ronggeng Dukuh Paruk'],
            'Negeri 5 Menara' => ['Bumi', 'Perahu Kertas'],
            'Laut Bercerita' => ['Belajar Laravel', 'Pulang'],
        ];

        foreach ($books as $book) {
            $previousBook = Book::query()
                ->whereIn('title', $previousBookTitles[$book['title']])
                ->orderBy('id')
                ->first();

            if ($previousBook) {
                $previousBook->update($book);
            }

            Book::updateOrCreate(
                ['title' => $book['title']],
                $book,
            );
        }
    }
}
