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
use Illuminate\Support\Facades\Auth;

/**
 * @method static create(array $all)
 * @method static where(string $string, $id)
 */
class ProgramSession extends Model{
    use HasFactory, SoftDeletes;

    protected $table = 'programs__sessions';
    protected $guarded = ['id'];
    protected array $_week_days = [ 0 => 'ned', 1 => 'pon', 2 => 'uto', 3 => 'sri', 4 => 'čet', 5 => 'pet', 6 => 'sub' ];
    protected array $_week_days_long = [ 0 => 'Nedjelja', 1 => 'Ponedjeljak', 2 => 'Utorak', 3 => 'Srijeda', 4 => 'Četvrtak', 5 => 'Petak', 6 => 'Subota' ];

    public function date(): string{
        return Carbon::parse($this->date)->format('d.m.Y');
    }
    public function getDay(): string{
        return Carbon::parse($this->date)->format('d');
    }
    public function getWeekDay(): string{
        return $this->_week_days[Carbon::parse($this->date)->dayOfWeek];
    }
    public function getFullWeekDay(): string{
        return $this->_week_days_long[Carbon::parse($this->date)->dayOfWeek];
    }
    public function timeFrom(): string{
        try{
            $time = explode(':', $this->time_from);
            return $time['0'] . 'H' . $time[1];
        }catch (\Exception $e){
            return "09H00";
        }
    }
    public function presenterRel(): HasOne{
        return $this->hasOne(User::class, 'id', 'presenter_id');
    }
    public function presentersRel(): HasMany{
        return $this->hasMany(SessionPresenter::class, 'session_id', 'id');
    }
    public function sessionFileRel(): HasMany{
        return $this->hasMany(ProgramSessionFile::class, 'session_id', 'id');
    }
    public function sessionLinkRel(): HasMany{
        return $this->hasMany(ProgramSessionLink::class, 'session_id', 'id');
    }
    public function programRel(): HasOne{
        return $this->hasOne(Program::class, 'id', 'program_id');
    }
    public function locationRel(): HasOne{
        return $this->hasOne(Location::class, 'id', 'location_id');
    }
    public function noteRel(): HasMany{
        return $this->hasMany(ProgramSessionNote::class, 'session_id', 'id')->where('attendee_id', Auth::user()->id)->orderBy('id', 'desc');
    }
    public function getDayInOrder(){
        $uniqueSessions = ProgramSession::where('program_id', $this->program_id)->orderBy('date')->get()->unique('date');

        $currentDay = 1;
        foreach ($uniqueSessions as $date){
            if($this->date == $date->date) return $currentDay;
            $currentDay++;
        }
        return $currentDay;
    }

    public function evaluationsRel(): HasMany{
        return $this->hasMany(ProgramSessionEvaluation::class, 'session_id', 'id')->orderBy('session_id');
    }
    public function evaluationsByUserRel($attendee_id): HasMany{
        return $this->hasMany(ProgramSessionEvaluation::class, 'session_id', 'id')->where('attendee_id', $attendee_id);
    }
}
