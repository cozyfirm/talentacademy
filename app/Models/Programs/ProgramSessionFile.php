<?php

namespace App\Models\Programs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSessionFile extends Model{
    use HasFactory;

    protected $table = 'programs__sessions_files';
    protected $guarded = ['id'];
}
