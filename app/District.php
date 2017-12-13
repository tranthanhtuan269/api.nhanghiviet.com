<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
	
    protected $fillable = ['name', 'city', 'slug', 'short_name'];

    public function city()
    {
    	return $this->belongsTo(City::class);
    }

    public function towns()
    {
    	return $this->hasMany(Town::class);
    }
}
