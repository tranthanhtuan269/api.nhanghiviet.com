<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{	
    protected $fillable = ['name', 'slug', 'short_name'];

    public function district()
    {
    	return $this->belongsTo(District::class);
    }

    public function users()
    {
    	return $this->hasMany(User::class);
    }
}
