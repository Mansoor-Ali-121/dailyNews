<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $fillable = [


'country_id',
'city_name',
'zip_code',
'city_status',
'city_slug'

    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
