<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Teknologi', 'description' => 'Buku seputar komputer dan pemrograman']);
        Category::create(['name' => 'Novel', 'description' => 'Karya fiksi dan sastra']);
        Category::create(['name' => 'Sains', 'description' => 'Buku ilmu pengetahuan alam']);
    }
}