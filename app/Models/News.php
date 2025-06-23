<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [

        'category_id',
        'city_id',
        'country_id',
        'news_title',
        'news_slug',
        'news_description',
        'news_content',
        'news_image',
        'news_status'

    ];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }
  public function category()
    {
        // Adjust pivot table name and foreign keys if different in your migrations
        return $this->belongsTo(Categories::class);
    }


     public function city()
    {
        // Adjust pivot table name and foreign keys if different in your migrations
        return $this->belongsTo(Cities::class);
    }
}
