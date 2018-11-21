<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
	public $timestamps = false;
    protected $fillable = [
    	'object_id',
    	'category_id',
    	'photo_name',
    	'photo_path'
    ];
}
