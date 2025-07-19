<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'category_id',
        'author_id',
        'city_id',
        'country_id',
        'blog_title',
        'blog_slug',
        'blog_description',
        'blog_image',
        'blog_status',
        'blog_content',
        'language'
    ];

     public function city()
    {
        // Adjust pivot table name and foreign keys if different in your migrations
        return $this->belongsTo(Cities::class);
    }
  public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
