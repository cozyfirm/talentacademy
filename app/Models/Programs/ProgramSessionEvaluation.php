<?php

namespace App\Models\Programs;

use App\Models\Other\FormQuestion;
use App\Models\Other\FormQuestionAnswer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, mixed $id)
 * @method static create(array $array)
 */
class ProgramSessionEvaluation extends Model{
    use HasFactory;

    protected $table = 'programs__sessions_evaluations';
    protected $guarded = ['id'];

    public function questionRel(): HasOne{
        return $this->hasOne(FormQuestion::class,'id', 'question_id');
    }
    public function answerRel(): HasOne{
        return $this->hasOne(FormQuestionAnswer::class, 'id', 'answer');
    }
    public function attendeeRel(): HasOne{
        return $this->hasOne(User::class, 'id', 'attendee_id');
    }
    public function getEvaluationsForUser($attendee_id, $session_id){
        return ProgramSessionEvaluation::where('attendee_id', $attendee_id)->where('session_id', $session_id)->orderBy('question_id', 'ASC')->get();
    }
}
