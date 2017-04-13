<?php

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use App\Music;
use Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/', function () {
    echo Carbon\Carbon::now()->year;
});

Route::get('/music', function (Request $request) {
    //all music
        $response = new BinaryFileResponse(storage_path('/music/2017/butterfly.mp3'));
    BinaryFileResponse::trustXSendfileTypeHeader();
    return $response;
});
Route::get('/music/{year}/{name}', function (Request $request) {
    dd($request->all());
});
Route::post('/music/create', function (Request $request) {
    $request = $request->all();
    //$year = Carbon\Carbon::now()->year;
    dd($request);
    $music_file = $request->input('music_file');
    //if(isset($music_file)){
        $filename = $music_file->getClientOriginalName(); 
        $location = storage_path('/music/' . $year); 
        $music_file->move($location,$filename); 
    //}
    //$name = $request->input('name');
    //Music::create([
        //'name' => $filename,
        //'year' => $year,
        //'type' => $request->input('type')
    //]);
});

Route::post('/music', function (Request $request) {
    dd($request->all());
});
Route::post('/music/delete/{year}/{id}', function (Request $request) {
    dd($request->all());
});
Route::post('/music/update/{year}/{id}', function (Request $request) {
    dd($request->all());
});
