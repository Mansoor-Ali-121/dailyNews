<?php

namespace App\Models;

use App\Models\News;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;

class BreakingNews extends Model
{
    protected $fillable = [

   
        'news_id',
        'author_id',
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
     public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
    
}
