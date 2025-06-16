<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

/**
 * @method static where(string $string, string $string1, int $int)
 */
class Conversation extends Model{
    use HasFactory;

    protected $table = 'chat__conversations';
    protected $guarded = ['id'];

    public function participantsRel(): HasMany{
        return $this->hasMany(Participant::class, 'conversation_id', 'id');
    }
    public function mySide(): HasOne{
        return $this->hasOne(Participant::class, 'conversation_id', 'id')->where('user_id', Auth::user()->id);
    }
    public function getOtherSide(){
        return Participant::where('conversation_id', $this->id)->where('user_id', '!=', Auth::user()->id)->first();
    }

    /** Mobile chat app */
    public function userRel(): HasOne{
        return $this->hasOne(Participant::class, 'conversation_id', 'id')->where('user_id', '!=', Auth::user()->id);
    }
}
