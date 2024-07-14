<?php

namespace App\Models\Other;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static get()
 * @method static orderBy(string $string, string $string1)
 */
class FormQuestion extends Model{
    use HasFactory;

    protected $table = 'form__questions';
    protected $guarded = ['id'];

    public function answersRel(): HasMany{
        return $this->hasMany(FormQuestionAnswer::class, 'question_id', 'id');
    }
}
