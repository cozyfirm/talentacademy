<?php

namespace App\Models\Programs;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSessionNote extends Model{
    use HasFactory;

    protected $table = 'programs__sessions_notes';
    protected $guarded = ['id'];

    public function time(){
        return Carbon::parse($this->created_at)->format('H:i:s');
    }
}
