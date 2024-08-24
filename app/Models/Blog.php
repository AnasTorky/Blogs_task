<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;

class Blog extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function blog_author(){
        return $this->belongsTo(Author::class,'id');
    }
}
