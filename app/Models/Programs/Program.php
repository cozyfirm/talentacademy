<?php

namespace App\Models\Programs;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use MongoDB\Driver\Session;

/**
 * @method static create(array $all)
 * @method static where(string $string, $id)
 */
class Program extends Model{
    use HasFactory, SoftDeletes;

    protected $table = 'programs';
    protected $guarded = ['id'];

    public function sessionsRel(): HasMany{
        return $this->hasMany(ProgramSession::class, 'program_id', 'id');
    }
    public function uniquePresenterSessions(): Collection{
        /*
         *  First, let's extract sessions
         */
        return ProgramSession::where('program_id', $this->id)->get()->unique('presenter_id');
    }
}
