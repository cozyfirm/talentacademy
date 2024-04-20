<?php

namespace App\Models\Other\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, int $int)
 */
class Blog extends Model{
    use HasFactory;

    protected $table = 'blog';
    protected $guarded = ['id'];
}
