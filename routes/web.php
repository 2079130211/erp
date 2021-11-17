<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



  
 Route::get('/{query}/{string}', function($query,$string){

 	if($query == "erp"){
 		$query  = array('column_name' => $query,'data' => $string);

 		
 		$query =    json_encode($query);

 		$query =    base64_encode($query);
 		
        return redirect("api/company/".$query);
 	}
 	else{
 		  return view('404');
 	}
 	
 });




 Route::get('/congrats', function () {
    return view('congrats');
});


Route::get('/admin', function () {
    return view('admin.teamDesign');
});


Route::get('/team', function () {
    return view('admin.teamDesign');
});



Route::get('/404', function () {
    return view('404');
});


Route::get('/test', function () {
    return view('testing');
});


 

 Route::post('/testing' , 'test@result' );


 