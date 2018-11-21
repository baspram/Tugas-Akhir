<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use \Storage;

class Map extends Model
{
    public $timestamps = false;
    //
    protected $fillable = [
      'tilesFileName',
      'tilesFilePath',
      'osmFileName',
      'osmFilePath'
    ];

    // protected $appends = [
    // 	'tiles',
    //     'osm'
    // ];

    // public function getTilesAttribute()    {
    // 	$file = Storage::get($this->tilesFilePath);
    // 	return base64_encode($file);
    // }

    // public function getOsmAttribute(){
    //     $file = Storage::get($this->osmFilePath);
    //     return base64_encode($file);
    // }
}
