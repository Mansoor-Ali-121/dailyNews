<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [

        'category_name',
        'category_slug',
        'category_status',
        'language',

    ];

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }
    public function posts()
{
    return $this->hasMany(News::class, 'category_id');
}

}
