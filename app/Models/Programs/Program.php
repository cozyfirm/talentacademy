<?php

namespace App\Models\Programs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model{
    use HasFactory;

    protected $table = 'programs';
    protected $guarded = ['id'];
}
