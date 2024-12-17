<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        return view('frontend.product');  // Trả về view 'product.blade.php'
    }
    public function product_detail()
    {
        return view('frontend.product-detail');  // Trả về view 'product.blade.php'
    }
}
