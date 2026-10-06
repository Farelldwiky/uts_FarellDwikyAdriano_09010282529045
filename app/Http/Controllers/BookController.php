<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'title'       => ['required', 'string', 'max:255'],
            'author'      => ['required', 'string', 'max:255'],
            'publisher'   => ['required', 'string', 'max:255'],
            'year'        => ['required', 'integer', 'min:1000', 'max:' . date('Y')],
            'stock'       => ['required', 'integer', 'min:0'],
        ];
    }

    // READ (daftar) + BONUS: pencarian & filter kategori
    public function index(Request $request)
    {
        $books = Book::with('category')
            ->when($request->q, function ($query, $q) {
                $query->where(function ($w) use ($q) {
                    $w->where('title', 'like', "%{$q}%")
                      ->orWhere('author', 'like', "%{$q}%");
                });
            })
            ->when($request->category_id, fn ($query, $c) => $query->where('category_id', $c))
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('books.index', [
            'books'      => $books,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    // CREATE (form)
    public function create()
    {
        return view('books.create', ['categories' => Category::orderBy('name')->get()]);
    }

    // CREATE (simpan)
    public function store(Request $request)
    {
        Book::create($request->validate($this->rules()));
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    // DETAIL
    public function show(Book $book)
    {
        $book->load('category');
        return view('books.show', compact('book'));
    }

    // UPDATE (form)
    public function edit(Book $book)
    {
        return view('books.edit', [
            'book'       => $book,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    // UPDATE (simpan)
    public function update(Request $request, Book $book)
    {
        $book->update($request->validate($this->rules()));
        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    // DELETE
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}