<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [


'category_name',
'category_slug',
'category_status'

    ];
}
