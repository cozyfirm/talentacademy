<?php

namespace App\Models\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string)
 */
class Country extends Model{
    use HasFactory;
    protected $table = 'api__countries';
    protected $guarded = ['id'];
}
