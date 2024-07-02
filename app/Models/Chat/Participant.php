<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model{
    use HasFactory;

    protected $table = 'chat__participants';
    protected $guarded = ['id'];
}
