<?php

namespace App\Models\Other;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormQuestionAnswer extends Model{
    use HasFactory;

    protected $table = 'form__questions_answers';
    protected $guarded = ['id'];

}
