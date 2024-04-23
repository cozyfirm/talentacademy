<?php

namespace App\Models\Programs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, int $program_id)
 */
class ProgramApplication extends Model{
    use HasFactory, SoftDeletes;

    protected $table = 'programs__applications';
    protected $guarded = ['id'];
}
