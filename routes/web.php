<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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
AVAILABLE ROUTE TYPE IN LARAVEL

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


Route::get('/', function () { //this function is default page
    return 'Default';
});

*/

/*
WAYS TO CONNECT ROUTE AND CONTROLLER


#include route for the new controller class created
#           linkName  className              functionName
Route::get('/newControl', [UserController::class, 'index']);


Route::get('/newControl/{id}', [UserController::class, 'passParameter'])
        //middleware help prevent access from unauthorize user trying to access the system
        //if there is no logged in an error will displayed, you can remove this yet if there is no login function yet
        //->middleware('auth')
        ;
*/

/*
COMMON PRACTICE IN ROUTE NAMING
1. index - show all data by default
2. show - show single data
3. create - show a form to new user
4. store - save data
5. edit - show form for edit
6. update - update process of data
7. destroy - deletes a data
*/

/* ROUTES FOR STUDENT DATABASE */
Route::get('/', [StudentController::class, 'index']); //default
Route::get('/login', [UserController::class, 'login']); // navigate to login function in UserController
Route::get('/register', [UserController::class, 'register']); // navigate to view register webpage function in UserController

//PROCESSING
Route::post('/store', [UserController::class, 'store']); // process signup using post method
Route::post('/logout', [UserController::class, 'logout']); // post method is used in the form
