<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionalMonitoringTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id',
        'language_id',
        'title',
    ];

    public function video_link()
    {
        return $this->belongsTo(VideoLink::class);
    }
}
