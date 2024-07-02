<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model{
    use HasFactory;

    protected $table = 'chat__conversations';
    protected $guarded = ['id'];
}
