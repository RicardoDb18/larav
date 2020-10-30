<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __construct()
    {
        //
    }

    public function index()
    {
        $products = Product::featuredProducts();

        return view('home', compact('products'));
    }
}
