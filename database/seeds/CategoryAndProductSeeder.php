<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategoryAndProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Halal',
            'Western',
            'Malay',
            'Chinese',
            'Indian',
            'Arabic',
            'Mexican'
        ];

        $products = [
            'Sate',
            'Nasi Padang',
            'Bakso',
            'Mie Ayam',
            'Ayam Geprek',
            'Mie Aceh',
            'Soto'
        ];
        
        foreach($categories as $category){
            Category::create([
                'name' => $category
            ]);
        }

        foreach($products as $product){
            Product::create([
                'name' => $product
            ]);
        }
    }

}