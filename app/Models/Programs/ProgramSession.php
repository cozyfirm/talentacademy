<?php

namespace App\Models\Programs;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $all)
 * @method static where(string $string, $id)
 */
class ProgramSession extends Model{
    use HasFactory, SoftDeletes;

    protected $table = 'programs__sessions';
    protected $guarded = ['id'];

    public function date(): string{
        return Carbon::parse($this->date)->format('d.m.Y');
    }
    public function presenterRel(): HasOne{
        return $this->hasOne(User::class, 'id', 'presenter_id');
    }
}
