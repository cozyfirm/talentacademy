<?php

namespace App\Models\Other;

use App\Models\Models\Core\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, string $string1, int $int)
 * @method static create(array $all)
 * @method static pluck(string $string, string $string1)
 * @method static get()
 * @method static take(int $int)
 * @method static inRandomOrder()
 */
class Location extends Model{
    use HasFactory;

    protected $table = '__locations';
    protected $guarded = ['id'];

    /** Automatically append img_path when serializing */
    protected $appends = ['photo_path'];
    /** Accessor for a fixed image path prefix + stored filename */
    public function getPhotoPathAttribute(): string{ return 'files/images/public-part/locations/'; }

    public function countryRel(): HasOne{
        return $this->hasOne(Country::class, 'id', 'country');
    }
}
