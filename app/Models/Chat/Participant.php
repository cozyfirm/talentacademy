<?php

namespace App\Models\Chat;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, $id)
 * @method static create(array $array)
 */
class Participant extends Model{
    use HasFactory;

    protected $table = 'chat__participants';
    protected $guarded = ['id'];

    public function userRel(): HasOne{
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function conversationRel(): HasOne{
        return $this->hasOne(Conversation::class, 'id', 'conversation_id');
    }
}
