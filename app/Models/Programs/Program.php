<?php

namespace App\Models\Programs;

use App\Models\Core\File;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

/**
 * @method static create(array $all)
 * @method static where(string $string, $id)
 * @method static pluck(string $string, string $string1)
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
        return ProgramSession::where('program_id', $this->id)->where('presenter_id', '!=', 0)->where('presenter_id', '!=', null)->get()->unique('presenter_id');
    }
    public function uniqueDateSessions(): Collection{
        /*
         *  First, let's extract sessions
         */
        return ProgramSession::where('program_id', $this->id)->orderBy('date')->get()->unique('date');
    }
    public function uniqueLecturerDateSessions($presenter_id): Collection{
        /*
         *  First, let's extract sessions
         */
        return ProgramSession::where('program_id', $this->id)->where('presenter_id', $presenter_id)->orderBy('date')->get()->unique('date');
    }

    public function imageRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'image_id');
    }
    public function isSubmitted(): bool{
        try{
            $submitted = ProgramApplication::where('program_id', $this->id)->where('attendee_id', Auth::user()->id)->first();
            if(!$submitted) return false;
            if($submitted->status == 'submitted') return true;
        }catch (\Exception $e){ return false; }
    }
    public function acceptedStatus(): string{
        try{
            $submitted = ProgramApplication::where('program_id', $this->id)->where('attendee_id', Auth::user()->id)->first();

            if(!$submitted) return "not-submitted";
            else return $submitted->app_status;
        }catch (\Exception $e){  return "not-submitted"; }
    }
}
