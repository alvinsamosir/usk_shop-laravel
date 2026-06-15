<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat kategori
        $categories = [
    ['name' => 'Pakaian', 'slug' => 'pakaian', 'gambar' => 'images/baju.png'],
    ['name' => 'Aksesoris', 'slug' => 'aksesoris', 'gambar' => 'images/tas.png'],
    ['name' => 'Merchandise', 'slug' => 'merchandise', 'gambar' => 'images/botol.png'],
    ['name' => 'Alat Tulis', 'slug' => 'alat-tulis', 'gambar' => 'images/pulpen.png'],
];

foreach ($categories as $cat) {
    Category::create([
        'name' => $cat['name'],
        'slug' => $cat['slug'],
        'gambar' => $cat['gambar'],
        'is_active' => true,
    ]);
}

        // Buat produk pakai gambar dari public/images/
        $products = [
            ['name' => 'Baju USK', 'category' => 'pakaian', 'price' => 150000, 'gambar' => 'baju.png'],
            ['name' => 'Jaket USK', 'category' => 'pakaian', 'price' => 350000, 'gambar' => 'jacket.png'],
            ['name' => 'Celana USK', 'category' => 'pakaian', 'price' => 200000, 'gambar' => 'celana.png'],
            ['name' => 'Scarf USK', 'category' => 'pakaian', 'price' => 75000, 'gambar' => 'scarf.png'],
            ['name' => 'Sweatshirt USK', 'category' => 'pakaian', 'price' => 250000, 'gambar' => 'sweatshirt.png'],
            ['name' => 'Tshirt USK', 'category' => 'pakaian', 'price' => 120000, 'gambar' => 'tshirt.jpg'],
            ['name' => 'Tas USK', 'category' => 'aksesoris', 'price' => 180000, 'gambar' => 'tas.png'],
            ['name' => 'Totebag USK', 'category' => 'aksesoris', 'price' => 85000, 'gambar' => 'totebag.png'],
            ['name' => 'Case HP USK', 'category' => 'aksesoris', 'price' => 65000, 'gambar' => 'case.png'],
            ['name' => 'Masker USK', 'category' => 'aksesoris', 'price' => 25000, 'gambar' => 'mask.png'],
            ['name' => 'Parfume USK', 'category' => 'merchandise', 'price' => 120000, 'gambar' => 'parfume.png'],
            ['name' => 'Botol USK', 'category' => 'merchandise', 'price' => 95000, 'gambar' => 'botol.png'],
            ['name' => 'Buku USK', 'category' => 'alat-tulis', 'price' => 45000, 'gambar' => 'buku.jpg'],
            ['name' => 'Pulpen USK', 'category' => 'alat-tulis', 'price' => 15000, 'gambar' => 'pulpen.png'],
        ];

        foreach ($products as $prod) {
            $category = Category::where('slug', $prod['category'])->first();
            Product::create([
                'category_id' => $category->id,
                'name' => $prod['name'],
                'slug' => Str::slug($prod['name']),
                'gambar' => ['images/' . $prod['gambar']],
                'description' => 'Produk resmi USK - ' . $prod['name'],
                'price' => $prod['price'],
                'is_active' => true,
                'is_featured' => false,
                'in_stock' => true,
                'on_sale' => false,
            ]);
        }
    }
}