<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {

        $topCategories = Category::where('is_featured', true)->get();

        $otherCategories = Category::where('is_featured', false)->get();

        $categories = Category::withCount('products')->get();

        $products = Product::with('category')->get();
        
        $products = Product::where('id', '<=', 5) -> orderBy('id', 'desc') -> take(4) -> get();

        return view('home', compact('products', 'topCategories', 'otherCategories', 'categories'));
    }
}
