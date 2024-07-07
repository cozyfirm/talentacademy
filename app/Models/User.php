<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Models\Core\Country;
use App\Models\Other\Inbox\InboxTo;
use App\Models\Programs\Program;
use App\Models\Programs\ProgramApplication;
use App\Models\Programs\ProgramSession;
use App\Models\Programs\ProgramSessionNote;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property mixed $email
 * @property mixed $name
 * @method static where(string $string, string $string1)
 * @method static whereHas(string $string, \Closure $param)
 * @method static orderBy(string $string, string $string1)
 */
class User extends Authenticatable{
    use HasApiTokens, HasFactory, Notifiable;

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

    public function photoUri(){
        return ($this->photo_uri) ? $this->photo_uri : 'silhouette.png';
    }
    public function birthDate(): string {
        return Carbon::parse($this->birth_date)->format('d.m.Y');
    }
    public function countryRel(): HasOne{
        return $this->hasOne(Country::class, 'id', 'country');
    }
    public function sessionsRel(): HasMany{
        return $this->hasMany(ProgramSession::class, 'presenter_id', 'id');
    }
    public function applicationRel(): HasMany{
        return $this->hasMany(ProgramApplication::class, 'attendee_id', 'id');
    }
    public function submitted(): bool{
        try{
            $app = ProgramApplication::where('attendee_id', $this->id)->where('status', 'submitted')->count();
            return (bool)$app;
        }catch (\Exception $e){ return false; }
    }
    public function myProgram(): bool{
        try{
            $app = ProgramApplication::where('attendee_id', $this->id)->where('app_status', 'accepted')->count();
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
                return ProgramSession::where('program_id', $programApp->program_id)->where('datetime_from', '<')->orderBy('datetime_from', 'DESC')->get();
            }
        }
    }
    public function getMyLecturers(){
        return User::whereHas('sessionsRel.programRel', function ($q){
            $q->where('id', $this->whatIsMyProgram('id'));
        })->get();
    }

    public function getMyTeamMates(){
        return User::whereHas('applicationRel', function ($q){
            $q->where('program_id', $this->whatIsMyProgram('id'))->where('app_status', 'accepted');
        })->get();
    }

    public function unreadNotifications(){
        return InboxTo::where('to', $this->id)->whereNull('read_at')->count();
    }
    public function totalNotes(){
        return ProgramSessionNote::where('attendee_id', $this->id)->count();
    }
}
