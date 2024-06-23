<?php

namespace App\Models\Programs;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, mixed $id)
 */
class ProgramSessionNote extends Model{
    use HasFactory;

    protected $table = 'programs__sessions_notes';
    protected $guarded = ['id'];

    public function time(): string{
        return Carbon::parse($this->created_at)->format('H:i:s');
    }
    public function sessionRel(): HasOne{
        return $this->hasOne(ProgramSession::class, 'id', 'session_id');
    }
}
