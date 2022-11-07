<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;
use Illuminate\Database\Eloquent\SoftDeletes;


class Article extends Model
{
    use HasFactory;
    use SoftDeletes;
    

    protected $table = 'articles';
    protected $guarded = false; 

    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
