<?php

namespace App\Models\Other\Blog;

use App\Models\Core\File;
use App\Models\Programs\Program;
use App\Models\Programs\Season;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, string $string1, int $int)
 * @method static take(int $int)
 * @method static orderBy(string $string, string $string1)
 */
class Blog extends Model{
    use HasFactory;

    protected $table = 'blog';
    protected $guarded = ['id'];

    public function getDate(){
        return Carbon::parse($this->created_at)->format('d.m.Y');
    }
    public function getDateTime(){
        return Carbon::parse($this->created_at)->format('M d.Y H:i');
    }
    public function imageRel(): HasMany{
        return $this->hasMany(BlogImage::class, 'blog_id', 'id');
    }

    public function mainImg(): HasOne{
        return $this->hasOne(File::class, 'id', 'main_img');
    }
    public function imgOne(): HasOne{
        return $this->hasOne(File::class, 'id', 'img_one');
    }
    public function imgTwo(): HasOne{
        return $this->hasOne(File::class, 'id', 'img_two');
    }
    public function imgThree(): HasOne{
        return $this->hasOne(File::class, 'id', 'img_three');
    }
    public function categoryRel() : HasOne{
        return $this->hasOne(Program::class, 'id', 'category');
    }
    public function createdBy(): HasOne{
       return $this->hasOne(User::class, 'id', 'created_by');
    }

    /* Get category */
    public function getCategory(){
        return (!$this->category) ? __('Globalni post') : $this->categoryRel->title;
    }

    public function seasonRel(): HasOne{
        return $this->hasOne(Season::class, 'id', 'season_id');
    }
}
