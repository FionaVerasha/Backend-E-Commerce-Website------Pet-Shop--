<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $cat_food_products = Product::where('category', 'cat-food')->get();
        $dog_food_products = Product::where('category', 'dog-food')->get();
        $pet_essentials_products = Product::where('category', 'pet-essentials')->get();
        $premium_products = Product::where('category', 'premium')->get();

        return view('shop', compact(
            'cat_food_products',
            'dog_food_products',
            'pet_essentials_products',
            'premium_products'
        ));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('product-detail', compact('product'));
    }
}
