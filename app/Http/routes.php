<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@home');

Route::get('/category', 'CategoryController@index');
Route::get('/category/create', 'CategoryController@create');
Route::post('/category', 'CategoryController@store');

Route::resource('objects', 'ObjectsController');
Route::resource('maps', 'MapsController');
Route::resource('paths', 'PathsController');

Route::get('descriptions/{object}/create', 'DescriptionsController@create');
Route::get('descriptions/{object}/edit', 'DescriptionsController@edit');
Route::patch('descriptions/{object}', 'DescriptionsController@update' );
Route::delete('descriptions/{object}', 'DescriptionsController@destroy');
Route::post('descriptions', 'DescriptionsController@store');

Route::get('photos/{object}/create', 'PhotosController@create');
Route::get('photos/{object}/edit', 'PhotosController@edit');
Route::patch('photos/{object}', 'PhotosController@update' );
Route::delete('photos/{object}', 'PhotosController@destroy');
Route::post('photos', 'PhotosController@store');

Route::get('videos/{object}/create', 'VideosController@create');
Route::get('videos/{object}/edit', 'VideosController@edit');
Route::patch('videos/{object}', 'VideosController@update' );
Route::delete('videos/{object}', 'VideosController@destroy');
Route::post('videos', 'VideosController@store');

Route::group(['prefix' => 'api'], function(){
        Route::get('image', 'APIController@image');
        Route::get('image/{param}', 'APIController@getImage');
        Route::get('marker/{id}', 'APIController@getMarker');
		Route::post('objects', 'APIController@objects');
        Route::post('objects/update', 'APIController@objectsUpdateValue');
        Route::post('objects/data', 'APIController@objectsData');
		Route::get('objects/media/{id}', 'APIController@objectsMedia');
		Route::post('maps', 'APIController@maps');
        Route::post('objects/post', 'APIController@postObject');
        Route::get('category', 'APIController@getCategory');
});


Route::get('/player', function () {
		$path = App\Videos::findOrFail(3);
    // $video = "video/os_simpsons_s25e22_720p.mp4";
    $video = "video/" . $path["video_name"];
    $mime = "video/mp4";
    $title = $path["video_name"];
    return view('player')->with(compact('video', 'mime', 'title'));
});
Route::get('/video/{filename}', function ($filename) {
    // Pasta dos videos.
    $destinationPath = config('app.fileDestinationPath').'/'.$filename;
    $check = storage_path('app').'/'.$destinationPath;
    if (file_exists($check)) {
        $stream = new App\VideoStream($check);
        return response()->stream(function() use ($stream) {
            $stream->start();
        });
    }
    return response("File doesn't exists", 404);
});