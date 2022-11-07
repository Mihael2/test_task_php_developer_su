<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(){
        if(auth()->user()->blog){
            return view('admin.article.index');
        } else{
            return redirect()->route('admin.blog.create');
        }  
    }
}
