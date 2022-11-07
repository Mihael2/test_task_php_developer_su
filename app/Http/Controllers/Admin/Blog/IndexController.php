<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (auth()->user()->blog) {
            $blog_id = $blog = auth()->user()->blog->id;
            if (Cache::get('blog_' . $blog_id)) {
                $blog = Cache::get('blog_' . $blog_id);
            } else {
                Cache::remember('blog_' . $blog_id, Carbon::now()->addMinutes(1), function () use ($blog_id) {
                    return Blog::findOrFail($blog_id);
                });
                $blog = Cache::get('blog_' . $blog_id);
            }
            return view('admin.blogs.index', compact('blog'));
        } else {
            return view('admin.blogs.create');
        }
    }
}
