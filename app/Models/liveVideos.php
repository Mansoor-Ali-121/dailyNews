<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class liveVideos extends Model
{
    protected $fillable = [

        'video_title',
        'video_url',
        'video_status',
        'video_slug',
        'category_id',
        'author_id'
    ];
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
