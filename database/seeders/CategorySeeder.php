<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Laptop', 'image' => 'laptop.png', 'is_featured' => true],
            ['name' => 'Monitor', 'image' => 'monitor.png'],
            ['name' => 'RAM', 'image' => 'ram.png', 'is_featured' => true],
            ['name' => 'Graphic Card', 'image' => 'gc.png', 'is_featured' => true],
            ['name' =>'Power Suply', 'image' => 'psu.png'],
            ['name' => 'PC Case', 'image' => 'case-pc.png'],
            ['name' => 'SSD', 'image' => 'SSD.png', 'is_featured' => true],
            ['name' => 'HDD', 'image' => 'hdd.png'],
            ['name' => 'Keyboard', 'image' => 'keyboard.png', 'is_featured' => true],
            ['name' =>'Mouse', 'image' => 'mouse.png'],
            ['name' =>'Headset', 'image' => 'headset.png'],
            ['name' =>'Webcam', 'image' => 'webcam.png'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'image' => $category['image'],
                'slug' => Str::slug($category['name']),
                'is_featured' => $category['is_featured'] ?? false,
                ]);
        }
    }
}
