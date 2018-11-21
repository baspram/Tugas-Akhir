<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
	public $timestamps = false;
    protected $fillable = [
    	'object_id',
    	'category_id',
    	'video_name',
    	'video_path'
    ];
}
