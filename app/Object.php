<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use \Storage;

class Object extends Model
{
    public $timestamps = false;
    //
    protected $fillable = [
      'object_id',
    	'name',
      'availability',
      'duration',
      'marker_path',
      'marker_name'   
    ];

    // protected $appends = [
    //   'marker',
    //   'image',
    //   'video'
    // ];

    // public function getImageAttribute(){
      
    //   $check = storage_path('app').'/'.$this->imagePath;
    //   if (file_exists($check)){
    //       $file = Storage::get($this->imagePath);
    //       return base64_encode($file);
    //   }
    //   return null;
    // }

    // public function getMarkerAttribute(){
      
    //   $check = storage_path('app').'/'.$this->markerPath;
    //   if (file_exists($check)){
    //       $file = Storage::get($this->markerPath);
    //       return base64_encode($file);
    //   }
    //   return null;
    // }

    // public function getVideoAttribute(){
      
    //   $check = storage_path('app').'/'.$this->videoPath;
    //   if (file_exists($check)){
    //       $file = Storage::get($this->videoPath);
    //       return base64_encode($file);
    //   }
    //   return null;
    // }
}
