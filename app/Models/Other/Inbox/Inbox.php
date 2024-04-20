<?php

namespace App\Models\Other\Inbox;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $all)
 * @method static where(string $string, $id)
 */
class Inbox extends Model{
    use HasFactory;

    protected $table = '__inbox';
    protected $guarded = ['id'];

    public function fromRel(): HasOne{
        return $this->hasOne(User::class, 'id', 'from');
    }
    public function toRel(){
        return $this->hasMany(InboxTo::class, 'inbox_id', 'id');
    }
}
