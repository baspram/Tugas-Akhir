<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjectCategories extends Model
{	
		public $timestamps = false;
    protected $fillable = [
    	'category'
    ];
}
