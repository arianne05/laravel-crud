<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function index()
    {
        return 'Test Controller';
    }

    public function passParameter($id)
    {

        // WAYS TO CONNECT CONTROLLER TO VIEWS FOLDER

        /* Option 1
        $data =  array( //sample database in an array
        "id" => $id,
        "name" => "Arianne",
        "age" => 22,
        "email" => "arianne@email.com"
        );
        return view('sample', $data); //pass data into sample.blade.php file in views folder
         */

        /* Option 2
        return view('sample')
        ->with('name', 'Arianne')
        ->with('age', 22)
        ->with('id', $id)
        ->with('email', 'arianne@email.com');
         */

        /* Option 3 */
        //you can include a set of different database and join with another single data
        $data = ["data" => "data from database"];

        return view('sample')
            ->with('data', $data)
            ->with('name', 'Arianne')
            ->with('age', 22)
            ->with('id', $id)
            ->with('email', 'arianne@email.com');

    }

    //Login function
    public function login()
    {
        if(View::exists('user.login')){ //check if the file exist
            return view('user.login');
        }else{ //catch the error
            return abort(404);
        }
    }
}
