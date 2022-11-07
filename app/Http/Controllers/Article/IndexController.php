<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(){
        $blogs = Blog::all();
        return view('blog.index', compact('blogs'));
    }
}
