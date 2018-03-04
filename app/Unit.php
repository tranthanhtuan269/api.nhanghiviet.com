<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['name', 'object', 'slug', 'short_name'];

    public function object()
    {
    	return $this->belongsTo(Object::class);
    }

    public function questions()
    {
    	return $this->hasMany(Question::class);
    }
}
