<?php

namespace App\Models\Other;

use App\Models\Programs\Program;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $except)
 * @method static where(string $string, mixed $id)
 */
class FAQ extends Model{
    use HasFactory, SoftDeletes;

    protected $table = '__faqs';
    protected $guarded = ['id'];

    public function sectionRel(): HasOne{
        return $this->hasOne(Program::class, 'id', 'what');
    }
}
