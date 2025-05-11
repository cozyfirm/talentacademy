<?php

namespace App\Models\Archive;

use App\Models\Programs\Season;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, string $string1, int $int)
 * @method static orderBy(string $string, string $string1)
 */
class Gallery extends Model{
    use HasFactory;

    protected $table = '__archive_gallery';
    protected $guarded = ['id'];

    public function seasonRel(): HasOne{
        return $this->hasOne(Season::class, 'id', 'season_id');
    }
}
