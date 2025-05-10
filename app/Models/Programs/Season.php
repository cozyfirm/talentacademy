<?php

namespace App\Models\Programs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Season extends Model{
    use HasFactory, SoftDeletes;

    protected $table = '__seasons';
    protected $guarded = ['id'];
}
