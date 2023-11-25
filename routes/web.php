<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*

Available Routes in Laravel
Route::get();
Route::post();
Route::put(); //edit all data
Route::patch(); //edit minor data but not recommended to use
Route::delete();
Route::view('/welcome', 'welcome') // redirect without passing any argument
Route::redirect('/welcome', '/'); //when access /welcome into the url it will redirected back on the '/' default

Route::match(['get', 'post'], '/', function (){
    return 'POST and GET';
}); // this route match allowed 2 route function within one route

Route::any('/welcome', function (){
    return 'Any route function';
}); // this route allowed all route function within one route

Route::get('/users', function (Request $request) { //import use Illuminate\Http\Request; this code help to access request library
    dd($request); //dd=die&dump is a tool that exit the execution and help developer to access request and attribute in the webpage to see parameters passed on this function
    return null;
});

*/

/*
WAYS TO UTILIZE ROUTE AND RESPONSE

Route::get('/get-text/{id}', function($id){ //to pass parameter in url encapsulate it in {} and define in function 
    //set status in inspect in 200         //change backg to black
    return response('ID:'.' '.$id, 200) -> header('Content-Type', 'text/plain'); 
});


Route::get('/request-json', function(){ //run json type function in response
    return response() -> json(['name'=>'Arianne', 'age'=>'22']); 
});


Route::get('/request-download', function(){ //ise response to download file from the public folder
    $path = public_path().'/download-sample.txt'; //path and filename
    $name = 'sample-download.txt'; //set file name after download
    $header = array(
        'Content-type: application/text-plain',
    );
    return response()->download($path, $name, $header);
});

*/

Route::get('/', function () { //this function is default page
    return 'Default';
});