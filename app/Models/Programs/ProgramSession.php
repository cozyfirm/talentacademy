<?php

namespace App\Models\Programs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSession extends Model{
    use HasFactory;

    protected $table = 'programs__sessions';
    protected $guarded = ['id'];
}
