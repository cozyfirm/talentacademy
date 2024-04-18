<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class File extends Model{
    use HasFactory;

    protected $table = '__files';
    protected $guarded = ['id'];
}
