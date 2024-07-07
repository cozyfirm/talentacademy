<?php

namespace App\Models\Chat;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1, $id)
 */
class Message extends Model{
    use HasFactory;

    protected $table = 'chat__messages';
    protected $guarded = ['id'];

    public function conversationRel(): HasOne{
        return $this->hasOne(Conversation::class, 'id', 'conversation_id');
    }
    public function senderRel(): HasOne{
        return $this->hasOne(User::class, 'id', 'sender_id');
    }
}
