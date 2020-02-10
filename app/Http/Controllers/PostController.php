<?php

namespace App\Http\Controllers;

use App\Cotegory;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function all_post()
    {
        return  Cotegory::with('posts')->get();
    }
}
