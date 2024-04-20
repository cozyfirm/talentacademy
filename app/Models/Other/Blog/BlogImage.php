<?php

namespace App\Models\Other\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model{
    use HasFactory;

    protected $table = 'blog__galery';
    protected $guarded = ['id'];
}
