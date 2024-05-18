<?php

namespace App\Models\Programs;

use App\Models\Core\File;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, int $program_id)
 */
class ProgramApplication extends Model{
    use HasFactory, SoftDeletes;

    protected $table = 'programs__applications';
    protected $guarded = ['id'];

    public function programRel(): HasOne{
        return $this->hasOne(Program::class, 'id', 'program_id');
    }
    public function userRel(): HasOne{
        return $this->hasOne(User::class, 'id', 'attendee_id');
    }

    public function cvRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'cv');
    }
    public function mlRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'motivation_letter');
    }
    public function otherRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'other');
    }
}
