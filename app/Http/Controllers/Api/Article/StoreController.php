<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Article\StoreRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $data = $request->validated();
        Article::create($data); 
        return response()->json(['success' => 'created successfully']);
    }
}
