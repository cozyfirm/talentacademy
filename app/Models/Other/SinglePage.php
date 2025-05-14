<?php

namespace App\Models\Other;

use App\Models\Core\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, mixed $page_id)
 * @method static orderBy(string $string, string $string1)
 */
class SinglePage extends Model{
    use HasFactory;

    protected $table = '__single_pages';
    protected $guarded = ['id'];

    public function fileRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'image_id');
    }
}
