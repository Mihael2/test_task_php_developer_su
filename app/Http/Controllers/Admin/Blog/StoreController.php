<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\StoreRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $blog = Blog::firstOrCreate(['user_id' => $data['user_id']], $data);
        $blog_id = $blog->id;
        Cache::remember('blog_' . $blog_id, Carbon::now()->addMinutes(1), function () use ($blog_id) {
            return Blog::findOrFail($blog_id);
        });
        return redirect()->route('admin.blog.index');
    }
}
