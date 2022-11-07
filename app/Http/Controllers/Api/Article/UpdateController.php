<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Article\UpdateRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Article $article){
        $data = $request->validated();
        $article->update($data);
        return response()->json(['success' => 'updated successfully']);
    }
}
