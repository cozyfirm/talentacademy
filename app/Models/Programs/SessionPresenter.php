<?php

namespace App\Models\Programs;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, string $string1, $session_id)
 * @method static create(array $array)
 */
class SessionPresenter extends Model{
    use HasFactory;

    protected $table = 'programs__sessions_presenters';
    protected $guarded = ['id'];

    public function presenterRel(): HasOne{
        return $this->hasOne(User::class, 'id', 'presenter_id');
    }
    public function sessionRel(): HasOne{
        return $this->hasOne(ProgramSession::class, 'id', 'session_id');
    }
}
