<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BreakingNews extends Model
{
    protected $table = 'breaking_news';

    protected $fillable = [
        'news_id',
        'author_id',
        'description',
        'title',
        'image',
        'breakingnews_slug',
        'breakingnews_status',
        'language'
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
