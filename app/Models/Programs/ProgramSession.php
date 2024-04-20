<?php

namespace App\Models\Programs;

use App\Models\Other\Location;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
    public function sessionFileRel(): HasMany{
        return $this->hasMany(ProgramSessionFile::class, 'session_id', 'id');
    }
    public function programRel(): HasOne{
        return $this->hasOne(Program::class, 'id', 'program_id');
    }
    public function locationRel(): HasOne{
        return $this->hasOne(Location::class, 'id', 'location_id');
    }
}
