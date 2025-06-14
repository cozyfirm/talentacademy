<?php

namespace App\Models\Programs;

use App\Models\Core\File;
use App\Models\User;
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

    /* Automatically append img_path when serializing */
    protected $appends = ['image_path'];

    /**
     * Accessor for a fixed image path prefix + stored filename
     */
    public function getImagePathAttribute(): string{
        return 'files/programs/' . ($this->imageRel->name ?? 'default.png');
    }

    public function seasonRel(): HasOne{
        return $this->hasOne(Season::class, 'id', 'season_id');
    }
    public function sessionsRel(): HasMany{
        return $this->hasMany(ProgramSession::class, 'program_id', 'id')->orderBy('datetime_from');
    }
    public function uniquePresenterSessions(): Collection{
        /*
         *  First, let's extract sessions
         */

        return User::whereHas('sessionsPresenterRel.sessionRel.programRel.seasonRel', function ($q){
            $q->where('active', '=', 1);
        })->whereHas('sessionsPresenterRel.sessionRel.programRel', function ($q){
            $q->where('id', '=', $this->id);
        })->where('role', 'presenter')->get();

        //return ProgramSession::where('program_id', $this->id)
        //    ->whereHas('presentersRel', function ($q) { $q->where('presenter_id'); })
        //    ->where('presenter_id', '!=', null)
        //    ->orderBy('datetime_from')
        //    ->get()
        //    ->unique('presenter_id');
    }
    public function uniqueDateSessions(): Collection{
        /*
         *  First, let's extract sessions
         */
        return ProgramSession::where('program_id', $this->id)->orderBy('date')->orderBy('datetime_from')->get()->unique('date');
    }
    public function uniqueLecturerDateSessions($presenter_id): Collection{
        /*
         *  First, let's extract sessions
         */

       return ProgramSession::whereHas('presentersRel', function ($q) use($presenter_id){
           $q->where('presenter_id', '=', $presenter_id);
       })->whereHas('programRel.seasonRel', function ($q){
           $q->where('active', '=', 1);
       })->where('program_id', $this->id)->orderBy('datetime_from')->get()->unique('date');

        // return ProgramSession::where('program_id', $this->id)->where('presenter_id', $presenter_id)->orderBy('datetime_from')->get()->unique('date');
    }

    public function imageRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'image_id');
    }
    public function appRel(): HasMany{
        return $this->hasMany(ProgramApplication::class, 'program_id', 'id');
    }
    public function isSubmitted(): bool{
        try{
            $submitted = ProgramApplication::where('program_id', $this->id)->where('attendee_id', Auth::user()->id)->first();
            if(!$submitted) return false;
            if($submitted->status == 'submitted') return true;
        }catch (\Exception $e){ return false; }
        return false;
    }
    public function acceptedStatus(): string{
        try{
            $submitted = ProgramApplication::where('program_id', $this->id)->where('attendee_id', Auth::user()->id)->first();

            if(!$submitted) return "not-submitted";
            else return $submitted->app_status;
        }catch (\Exception $e){  return "not-submitted"; }
    }
}
