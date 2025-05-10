<?php

namespace App\Models\Programs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, string $string1, int $int)
 */
class Season extends Model{
    use HasFactory, SoftDeletes;

    protected $table = '__seasons';
    protected $guarded = ['id'];
}
