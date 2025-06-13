<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    
    protected $fillable = [

        
        'country_code',
        'country_slug',
        'country_status',
        'country_name',
        'country_slug'

    ];
  public function cities()
    {
        return $this->hasMany(Cities::class);
    }

}
