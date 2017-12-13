<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	
    protected $fillable = ['name', 'slug', 'short_name'];

    public function districts()
    {
    	return $this->hasMany(District::class);
    }
}
