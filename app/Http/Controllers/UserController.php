<?php

namespace App\Http\Controllers;

// use GuzzleHttp\Psr7\Request;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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

    //Register function
    public function register(){
        return view('user.register');
    }

    //Process Signup/Register
    public function store(Request $request){ //When fetching data request is required as a parameter
       $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|confirmed|min:6'
       ]); //set rule in validation

       $validated['password'] = Hash::make($validated['password']); //encrypt or hash the password | you can also use bycrpt($validated['password'])

       $user = User::create($validated); //insert validated name, email, pass in the database
       //return $user;
       auth()->login($user);
    }

    //Logout Function
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); //reset token

        return redirect('/')->with('message', 'Logout Success');
    }
}
