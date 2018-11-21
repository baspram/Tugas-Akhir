<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use App\Http\Requests;

use App\Object;

use App\Map;

use App\Path;

use App\Values;

use App\Photos;

use App\ObjectCategories;

use App\Description;

use App\Videos;

use \Storage;


class APIController extends Controller
{
    //
    //
    public function objects(Request $request){
      $input = $request->all();
      $cat = $input['category'];
      $catId = 0;

      $categories = ObjectCategories::all();
      foreach($categories as $category){
        if($category["category"] == $cat){
          $catId = $category["id"];
        }
      }

      $values = Values::where('category_id', '=', $catId)
                        ->get();
      // return $values;
      $values = json_decode(json_encode($values), true);
      shuffle($values);

      foreach($values as $value){
        $sort[] = $value['values'];        
      }
      array_multisort($sort, SORT_DESC, $values);
      // return $values;
      // return $values;
      $results = [];
      $count = 0;
      $durationCounter = 0;
      foreach($values as $value){
        $thisObject = Object::where('id', '=' , $value['object_id'])->get();
        $thisObject = $thisObject[0];
        if ($input['duration'] >= ($durationCounter + intval($thisObject['duration'])) && $thisObject['availability'] == 1){
            $results[$count] = $thisObject['object_id'];
            $durationCounter = $durationCounter + intval($thisObject['duration']);
        }        
        $count++;
      }
      $final = [];
      $final['id'] = "";
      $count = 0;
      foreach($results as $result){
        if ($count == 0){
          $string = $result;
          $count++;
        } else {
          $string = $final['id'] . "-" . $result;
        }
        
        $final["id"] = $string;
      }
      return $final;
  	}

    public function objectsMedia($id){
      $temps = Object::get()->toArray();
      $objects = [];
      $count = 0;
      foreach ($temps as $temp){
        $objects[$count] = array_only($temp, ['image', 'marker', 'video']);
        $count++;
      }
      return $objects;
    }

  	public function paths(){

  		$paths = Path::get();
  		return $paths;
  	}

  	public function maps(){
  		$maps = Map::find(1);
      $result = [];
      $map = $maps['tilesFilePath'];
      $check = storage_path('app').'/'.$map;
      $string = explode(".", $map);
      $extension = $string[count($string)-1];
      if (file_exists($check)){
        $file = Storage::get($map); 
        return response($file, 200)->header('Content-Type', 'image/' . $extension);
      }
      $tile = $maps['osmFilePath'];
  		return $maps;
  	}

    public function postObject(Request $request){
      $post = $request->all();
      $object_id = $post["object_id"];
      $values = [];
      $values["values"] = $post["values"];
      $values["object_id"] = $object_id;
      $newValue = Values::where('object_id', '=', $object_id)
                          ->update($values);

      $temp["message"] = "DONE";
      return $temp;
    }

    public function getCategory(){
      $categories = ObjectCategories::all();
      
      return $categories;
    }

    public function image(){
        $object = Object::find(1);
        $path = $object['marker_path'];
        $check = storage_path('app').'/'.$path;
        $string = explode(".", $path);
        $extension = $string[count($string)-1];
        if (file_exists($check)){
          $file = Storage::get($path); 
          return response($file, 200)->header('Content-Type', 'image/' . $extension);
        }
    }

    public function getMarker($id){
      $object = Object::where('object_id', '=', $id)->get();
      $object = $object[0];
      $path = $object['marker_path'];
      $check = storage_path('app').'/'.$path;
      $string = explode(".", $path);
      $extension = $string[count($string)-1];
      if (file_exists($check)){
        $file = Storage::get($path); 
        return response($file, 200)->header('Content-Type', 'image/' . $extension);
      }
    }

    public function getImage($param){
      $input = explode("-", $param);
      
      $id = $input[0];
      $cat = $input[1];
      $catId = 0;
      $objId = 0;

      $objId = Object::where('object_id', '=', $id)
                        ->get();
      $objId = $objId[0]['id'];

      $categories = ObjectCategories::all();
      foreach($categories as $category){
        if($category["category"] == $cat){
          $catId = $category["id"];
        }
      }

      $image = Photos::where('object_id', '=', $objId)
                        ->where('category_id', '=', $catId)
                        ->get();
      if(count($image) == 0){
        $image = Photos::where('object_id', '=', $objId)
                        ->where('category_id', '=', null)
                        ->get();
      }

      if(count($image) > 0){
        $image = $image[0];
        $path = $image['photo_path'];
        $check = storage_path('app').'/'.$path;
        $string = explode(".", $path);
        $extension = $string[count($string)-1];
        if (file_exists($check)){
          $file = Storage::get($path); 
          return response($file, 200)->header('Content-Type', 'image/' . $extension);
        }
      } else {
        return null;
      }
    }

    public function objectsUpdateValue(Request $request){
      $input = $request->all();
      $id = $input['id'];
      $cat = $input['category'];
      $param = $input['param'];
      $objId = 0;
      $catId = 0;

      $objId = Object::where('object_id', '=', $id)
                        ->get();
      $objId = $objId[0]['id'];

      $categories = ObjectCategories::all();
      foreach($categories as $category){
        if($category["category"] == $cat){
          $catId = $category["id"];
        }
      }

      $value = Values::where('object_id', '=', $objId)
                        ->where('category_id', '=', $catId)
                        ->get();
      
      $newVal = [];
      $newVal['object_id'] = $objId;
      $newVal['category_id'] = $catId;
      $newVal['values'] = "";
      if($param == "up"){
        $newVal['values'] = $value[0]->values + 3;
      } elseif($param == "semi-up") {
        $newVal['values'] = $value[0]->values + 1;
      } elseif($param == "semi-down") {
        $newVal['values'] = $value[0]->values - 1;
      } else {
        $newVal['values'] = $value[0]->values - 3;
      }
      
      $newValue = Values::where('object_id', '=', $objId)
                            ->where('category_id', '=', $catId)
                            ->update($newVal);
      if($newValue){
        $dummy['status'] = 'success';
        return $dummy;
      }
    
    }

    public function objectsData(Request $request){
      $input = $request->all();
      $id = $input['id'];
      $cat = $input['category'];
      $objId = 0;
      $catId = 0;

      $categories = ObjectCategories::all();
      foreach($categories as $category){
        if($category["category"] == $cat){
          $catId = $category["id"];
        }
      }
      
      $object = Object::where('object_id', '=', $id)->get();
      $object = $object[0];
      $objId = $object['id'];

      $description = Description::where('object_id', '=', $objId)
                      ->where('category_id', '=', $catId)
                      ->get();
      if (count($description) == 0){
        $description = Description::where('object_id', '=', $objId)
                      ->where('category_id', '=', null)
                      ->get();
      }

      $description = $description[0];

      $video = Videos::where('object_id', '=', $objId)
              ->where('category_id', '=', $catId)
              ->get();

      if (count($video) == 0){
        $video = Videos::where('object_id', '=', $objId)
              ->where('category_id', '=', null)
              ->get();
        if (count($video) == 0){
          $video['video_name'] = "null";
        } else{
          $video = $video[0]; 
        }        
      } else {
        $video = $video[0];   
      }    

      $result = [];
      $result['id'] = $id;
      $result['title'] = $object['name'];
      $result['description'] = $description['content'];
      $result['video'] = $video['video_name'];

      return $result;
    }
}
