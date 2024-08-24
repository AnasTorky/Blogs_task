<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class Author extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function authors_blogs(){
        return $this->hasMany(Blog::class,'id');
    }
}
