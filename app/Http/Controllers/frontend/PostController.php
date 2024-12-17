<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post_detail()
    {
        return view('frontend.post-detail');  // Trả về view 'product.blade.php'
    }
}
