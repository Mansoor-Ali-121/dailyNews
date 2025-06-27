<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;

class BreakingNews extends Model
{
    protected $fillable = [

   
        'news_id',
        'description',
        'title',
        'image',
        'breakingnews_slug',
        'breakingnews_status'

    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
