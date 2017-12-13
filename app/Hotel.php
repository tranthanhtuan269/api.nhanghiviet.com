<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Orderable;

use App\City;
use App\District;
use App\Town;

class Hotel extends Model
{
	use Orderable;

    protected $table = 'users';
	
    protected $fillable = ['name', 'phone', 'city', 'district', 'town', 'address', 'images', 'lat', 'lng'];


    public function city()
    {
    	return $this->belongsTo(City::class);
    }

    public function district()
    {
    	return $this->belongsTo(District::class);
    }

    public function town()
    {
    	return $this->belongsTo(Town::class);
    }
}
