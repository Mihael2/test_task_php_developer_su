<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Carbon\Carbon;

class EditController extends Controller
{
    public function __invoke(Blog $blog){
        $date = Carbon::parse($blog->user->created_at);
        return view('admin.blogs.edit', compact('blog', 'date'));
    }
}
