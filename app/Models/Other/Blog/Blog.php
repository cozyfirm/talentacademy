<?php

namespace App\Models\Other\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static where(string $string, string $string1, int $int)
 */
class Blog extends Model{
    use HasFactory;

    protected $table = 'blog';
    protected $guarded = ['id'];

    public function imageRel(): HasMany{
        return $this->hasMany(BlogImage::class, 'blog_id', 'id');
    }
}
