<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PressRelease extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_am',
        'title_ru',
        'banner',
        'date',
        'time',
        'logo',
        'description_en',
        'description_am',
        'description_ru'

    ];

    public function files()
    {
        return $this->morphToMany(File::class, 'fileable');
    }

    public function links()
    {
        return $this->morphToMany(Link::class, 'linkable');
    }

    public function press_release_translations()
    {
        return $this->hasMany(PressReleaseTranslation::class);
    }

    public function translation($lng_id){
        return $this->hasOne(PressReleaseTranslation::class)->where('language_id', $lng_id)->first();
    }
}
