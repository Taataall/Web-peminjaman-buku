<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q', ''));

        $books = Book::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('author', 'like', "%{$search}%")
                        ->orWhere('publisher', 'like', "%{$search}%");
                });
            })
            ->orderBy('title')
            ->paginate(8)
            ->withQueryString();

        return view('catalog.index', [
            'books' => $books,
            'search' => $search,
            'bookCount' => Book::count(),
            'availableCount' => Book::where('stock', '>', 0)->count(),
            'featuredBooks' => Book::orderByDesc('stock')->orderBy('title')->limit(3)->get(),
        ]);
    }

    public function show(Book $book): View
    {
        return view('catalog.show', compact('book'));
    }
}
