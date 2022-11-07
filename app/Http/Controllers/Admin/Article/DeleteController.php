<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Article $article){
        $article->delete(); 
        return response()->json(['success' => 'deleted successfully']);
    }
}
