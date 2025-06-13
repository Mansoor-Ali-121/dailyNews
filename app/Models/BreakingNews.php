<?php

namespace App\Models;

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
}
