<?php

namespace App\Models\Other\Inbox;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, $id)
 */
class InboxTo extends Model{
    use HasFactory;

    protected $table = '__inbox__to';
    protected $guarded = ['id'];

    public function toRel(): HasOne{
        return $this->hasOne(User::class, 'id', 'to');
    }
    public function messageRel(): HasOne{
        return $this->hasOne(Inbox::class, 'id', 'inbox_id');
    }
}
