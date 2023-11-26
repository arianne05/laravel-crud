<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return 'Test Controller';
    }

    public function passParameter($id){
        return 'Argument Passed: '.$id;
    }
}
