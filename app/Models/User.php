<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Models\Core\Country;
use App\Models\Programs\ProgramApplication;
use App\Models\Programs\ProgramSession;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property mixed $email
 * @property mixed $name
 * @method static where(string $string, string $string1)
 * @method static whereHas(string $string, \Closure $param)
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

    public function birthDate(): string {
        return Carbon::parse($this->birth_date)->format('d.m.Y');
    }
    public function countryRel(): HasOne{
        return $this->hasOne(Country::class, 'id', 'country');
    }
    public function sessionsRel(): HasMany{
        return $this->hasMany(ProgramSession::class, 'presenter_id', 'id');
    }
    public function myProgram(): bool{
        try{
            $app = ProgramApplication::where('attendee_id', $this->id)->where('app_status', 'accepted')->count();
            return (bool)$app;
        }catch (\Exception $e){ return false; }
    }
}
