<?php

namespace App\Models\Programs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSessionAttendee extends Model{
    use HasFactory;

    protected $table = 'programs__sessions_attendees';
    protected $guarded = ['id'];
}
