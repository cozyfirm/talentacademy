<?php

namespace App\Models\Programs;

use App\Models\Core\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $array)
 * @method static where(string $string, $id)
 */
class ProgramSessionFile extends Model{
    use HasFactory;

    protected $table = 'programs__sessions_files';
    protected $guarded = ['id'];

    public function fileRel(): HasOne{
        return $this->hasOne(File::class, 'id', 'file_id');
    }
}
