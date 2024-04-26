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

    public function countryRel(): HasOne{
        return $this->hasOne(Country::class, 'id', 'country');
    }
}
