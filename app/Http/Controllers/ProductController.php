<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Get all the products from the database
        $products = Product::all();

        // Return the view with the products data
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        // Get the product with the given ID from the database
        $product = Product::findOrFail($id);

        // Return the view with the product data
        return view('products.show', compact('product'));
    }
}
