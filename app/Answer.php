<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use Orderable;

    protected $table = 'answers';
	
    protected $fillable = ['content'];
}
