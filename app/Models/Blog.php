<?php

namespace App\Models;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    protected $guarded = false;

    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
