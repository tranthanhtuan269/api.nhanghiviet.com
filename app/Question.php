<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['content', 'correct_answer'];

    public function answers()
    {
    	return $this->hasMany(Answer::class);
    }

    public function object()
    {
    	return $this->belongsTo(Object::class);
    }

    public function unit()
    {
    	return $this->belongsTo(Unit::class);
    }
}
