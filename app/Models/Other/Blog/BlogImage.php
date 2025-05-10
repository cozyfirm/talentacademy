<?php

namespace App\Models\Other\Blog;

use App\Models\Core\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create()
 * @method static where(string $string, string $string1, $id)
 */
class BlogImage extends Model{
    use HasFactory;

    protected $table = 'blog__galery';
    protected $guarded = ['id'];

    public function fileRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'file_id');
    }
}
