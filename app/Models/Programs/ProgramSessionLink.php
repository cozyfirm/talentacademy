<?php

namespace App\Models\Programs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSessionLink extends Model{
    use HasFactory;

    protected $table = 'programs__sessions_links';
    protected $guarded = ['id'];
}
