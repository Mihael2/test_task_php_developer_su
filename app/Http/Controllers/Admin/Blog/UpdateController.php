<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\UpdateRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Blog $blog)
    {
        $data = $request->validated();
        $blog = Blog::where('id', $blog->id)->updateOrCreate(['id' => $blog->id],$data);
        $blog_id = $blog->id;
        Cache::remember('blog_' . $blog_id, Carbon::now()->addMinutes(1), function () use ($blog_id) {
            return Blog::findOrFail($blog_id);
        });
        return redirect()->route('admin.blog.index');
    }
}
