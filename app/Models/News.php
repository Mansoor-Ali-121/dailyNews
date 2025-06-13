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
        'news_discripton',
        'news_image',
        'news_status'

    ];
}
