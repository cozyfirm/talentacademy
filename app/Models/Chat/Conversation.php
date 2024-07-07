<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
