<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
		public $timestamps = false;
    protected $fillable = [
    	'object_id',
    	'category_id',
    	'content'
    ];
}
