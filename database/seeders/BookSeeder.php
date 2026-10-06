<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $tek = Category::where('name', 'Teknologi')->first()->id;
        $nov = Category::where('name', 'Novel')->first()->id;
        $sci = Category::where('name', 'Sains')->first()->id;

        $books = [
            ['category_id' => $tek, 'title' => 'Belajar Laravel', 'author' => 'Budi Santoso', 'publisher' => 'Informatika', 'year' => 2022, 'stock' => 10],
            ['category_id' => $tek, 'title' => 'Dasar Pemrograman Web', 'author' => 'Siti Aminah', 'publisher' => 'Andi', 'year' => 2021, 'stock' => 7],
            ['category_id' => $nov, 'title' => 'Laskar Pelangi', 'author' => 'Andrea Hirata', 'publisher' => 'Bentang', 'year' => 2005, 'stock' => 5],
            ['category_id' => $nov, 'title' => 'Bumi Manusia', 'author' => 'Pramoedya A.T.', 'publisher' => 'Hasta Mitra', 'year' => 1980, 'stock' => 3],
            ['category_id' => $sci, 'title' => 'Sejarah Singkat Waktu', 'author' => 'Stephen Hawking', 'publisher' => 'Gramedia', 'year' => 2018, 'stock' => 4],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}