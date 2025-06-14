<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Chat\Participant;
use App\Models\Models\Core\Country;
use App\Models\Other\Inbox\InboxTo;
use App\Models\Programs\Program;
use App\Models\Programs\ProgramApplication;
use App\Models\Programs\ProgramSession;
use App\Models\Programs\ProgramSessionEvaluation;
use App\Models\Programs\ProgramSessionNote;
use App\Models\Programs\SessionPresenter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property mixed $email
 * @property mixed $name
 * @method static whereHas(string $string, \Closure $param)
 * @method static orderBy(string $string, string $string1)
 * @method static where(string $string, string $string1, mixed $email)
 */
class User extends Authenticatable{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'email_verified_at',
        'password',
        'api_token',
        'role',
        'prefix',
        'phone',
        'birth_date',
        'address',
        'city',
        'country',
        'about',
        'photo_uri',
        'instagram',
        'facebook',
        'twitter',
        'linkedin',
        'web',
        'title',
        'institution',
        'presenter_role',
        'short_description',
        'description',
        'interview'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /* Automatically append img_path when serializing */
    protected $appends = ['photo_path'];

    /**
     * Accessor for a fixed image path prefix + stored filename
     */
    public function getPhotoPathAttribute(): string{
        return 'files/images/public-part/users/' . ($this->photo_uri ?? 'default.png');
    }

    public function photoUri(){
        return ($this->photo_uri) ? $this->photo_uri : 'silhouette.png';
    }
    public function birthDate(): string {
        return Carbon::parse($this->birth_date)->format('d.m.Y');
    }
    public function emailVerifiedAt(): string {
        return Carbon::parse($this->email_verified_at)->format('d.m.Y H:i:s');
    }
    public function countryRel(): HasOne{
        return $this->hasOne(Country::class, 'id', 'country');
    }
    public function sessionsRel(): HasMany{
        return $this->hasMany(SessionPresenter::class, 'presenter_id', 'id');
        // return $this->hasMany(ProgramSession::class, 'presenter_id', 'id');
    }
    public function applicationRel(): HasMany{
        return $this->hasMany(ProgramApplication::class, 'attendee_id', 'id');
    }
    public function acceptedAppRel(): HasMany{
        return $this->hasMany(ProgramApplication::class, 'attendee_id', 'id')->where('app_status', '=', 'accepted');
    }

    public function submitted(): bool{
        try{
            $app = ProgramApplication::whereHas('programRel.seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->where('attendee_id', $this->id)->where('status', 'submitted')->count();
            return (bool)$app;
        }catch (\Exception $e){ return false; }
    }
    public function myProgram(): bool{
        try{
            $app = ProgramApplication::where('attendee_id', $this->id)->where('app_status', 'accepted')->count();
            return (bool)$app;
        }catch (\Exception $e){ return false; }
    }
    public function presenterProgram(): bool{
        try{
            $app = SessionPresenter::where('presenter_id', '=', $this->id)->count();
            return (bool)$app;
        }catch (\Exception $e){ return false; }
    }

    /* Not so great; Remove it */
    public function whatIsMyProgram($param = null): ProgramApplication | null | string | int{
        try{
            $program = Program::whereHas('appRel', function ($q){
                $q->where('attendee_id', Auth::user()->id)->where('app_status', 'accepted');
            })->first();

            if($param){
                return $program->$param;
            }else return $program;
        }catch (\Exception $e){ return null; }
    }
    public function whatIsMyPresenterProgram($param = null): ProgramApplication | null | string | int{
        try{
            $program = Program::whereHas('sessionsRel.presentersRel', function ($q){
                $q->where('presenter_id', Auth::user()->id);
            })->whereHas('seasonRel', function ($q){
                $q->where('active', '=', 1);
            })->first();

            if($param){
                return $program->$param;
            }else return $program;
        }catch (\Exception $e){ return null; }
    }
    public function getMySessions($passed = null){
        $programApp = ProgramApplication::where('attendee_id', $this->id)->where('app_status', 'accepted')->orderBy('id', 'DESC')->first();
        /* If we want all sessions, call without any arguments */
        if($passed == null){
            return ProgramSession::where('program_id', $programApp->program_id)->orderBy('datetime_from', 'DESC')->get();
        }else{
            if($passed = false){
                /* Future sessions */
            }else{
                /* Passed sessions */
                return ProgramSession::where('program_id', $programApp->program_id)->where('datetime_from', '<', Carbon::now())->orderBy('datetime_from', 'DESC')->get();
            }
        }
    }
    public function totalRealSessions(): int{
        $sessions = $this->getMySessions(true);
        $count = 0;
        foreach ($sessions as $session){
            if($session->type == 'Radionica' or $session->type == 'Predavanje' or $session->type == 'Keynote Predavanje' or $session->type == 'Projekcija filma' or $session->type == 'Posjeta' or $session->type == 'Hakaton') {
                if($this->isSessionEvaluated($session->id, true)) $count++;
            }
        }

        return $count;
    }
    public function getMyLecturers(){
        if($this->role == 'presenter'){
            return User::whereHas('sessionsRel.sessionRel.programRel', function ($q){
                $q->where('id', $this->whatIsMyPresenterProgram('id'));
            })->get();
        }else{
            return User::whereHas('sessionsRel.sessionRel.programRel', function ($q){
                $q->where('id', $this->whatIsMyProgram('id'));
            })->get();
        }
    }

    public function getMyTeamMates(){
        if($this->role == 'presenter'){
            return User::whereHas('applicationRel', function ($q){
                $q->where('program_id', $this->whatIsMyPresenterProgram('id'))->where('app_status', 'accepted');
            })->orderBy('name')->get();
        }else{
            return User::whereHas('applicationRel', function ($q){
                $q->where('program_id', $this->whatIsMyProgram('id'))->where('app_status', 'accepted');
            })->orderBy('name')->get();
        }
    }
    public function getUsersFromMyProgram(){
        if($this->role == 'user'){
            $programID = $this->whatIsMyProgram('id');
            /* User role */
            return User::whereHas('applicationRel', function ($q) use ($programID){
                $q->where('program_id', $programID)->where('app_status', 'accepted');
            })->orWhereHas('sessionsRel.sessionRel.programRel', function ($q) use ($programID){
                $q->where('program_id', $programID);
            })->orderBy('name')->get();
        }else if($this->role == 'presenter'){
            /* Presenter role */
            $programID = $this->whatIsMyPresenterProgram('id');
            return User::whereHas('applicationRel', function ($q) use ($programID){
                $q->where('program_id', $programID)->where('app_status', 'accepted');
            })->orWhereHas('sessionsRel.sessionRel.programRel', function ($q) use ($programID){
                $q->where('program_id', $programID);
            })->orderBy('name')->get();
        }
    }

    public function unreadNotifications(){
        return InboxTo::where('to', $this->id)->whereNull('read_at')->count();
    }
    public function totalNotes(){
        return ProgramSessionNote::where('attendee_id', $this->id)->count();
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /* Session & evaluations */
    /**
     *  Check if user answered specific question about session
     */
    public function isThisAnswer($session_id, $question_id, $answer): string | int{
        return ProgramSessionEvaluation::where('attendee_id', $this->id)->where('session_id', $session_id)->where('question_id', $question_id)->where('answer', $answer)->count();
    }
    public function getAnswer($session_id, $question_id): string | int{
        $evaluation = ProgramSessionEvaluation::where('attendee_id', $this->id)->where('session_id', $session_id)->where('question_id', $question_id)->first();
        return $evaluation->answer ?? '';
    }
    public function isSessionEvaluated($session_id, $evaluated_24h = false): bool{
        $evaluation = ProgramSessionEvaluation::where('attendee_id', $this->id)->where('session_id', $session_id)->first();

        if($evaluation){
            if($evaluated_24h){
                if(Carbon::now()->subDay() < $evaluation->created_at) return false;
                return true;
            }else return true;
        }else return false;
    }

    public function unreadMessages(){
        return Participant::where('user_id', $this->id)->sum('unread');
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /* V2 updates */
    public function presenterHasAccess($session_id): bool{
        if(Auth::user()->role != 'presenter') return false;
        return (bool)SessionPresenter::where('session_id', '=', $session_id)->where('presenter_id', '=', Auth::user()->id)->count();
    }
    public function sessionsPresenterRel(): HasMany{
        return $this->hasMany(SessionPresenter::class, 'presenter_id', 'id');
    }

    /**
     * Check if user has any accepted application for active season (last applications does not count)
     * @return bool|int
     */
    public function hasAcceptedApp(): bool | int{
        return ProgramApplication::whereHas('programRel.seasonRel', function ($q){
            $q->where('active', '=', 1);
        })->where('attendee_id', $this->id)->where('app_status', 'accepted')->count();
    }
}
