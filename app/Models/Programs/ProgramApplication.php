<?php

namespace App\Models\Programs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramApplication extends Model{
    use HasFactory, SoftDeletes;

    protected $table = 'programs__applications';
    protected $guarded = ['id'];
}
