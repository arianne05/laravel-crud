<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(){
        /* 
            DIFFERENT TYPES OF STRUCTURAL QUERY IN LARAVEL
            $student_data=Students::all(); //get all data in the table
            $student_data=Students::where('id', 1)->get(); //get specific data in the id table where value is 1
            $student_data=Students::where('first_name', 'like', '%b%')->get(); //use wildcard to get data with same value like bert
            $student_data=Students::where('age', '>', 19)->get(); //use operation to display age greater than 19
            $student_data=Students::where('age', '>', 19)->orderby('first_name','asc')->get(); //used of order by
            $student_data=Students::where('age', '>', 19)->limit(5)->get(); //use of limit you can connect it after orderby but always last is get()
            
            ERROR HANDLING
            $student_data=Students::where('id', 101)->firstOrFail()->get(); //firstOrFail if id is not existed throw/display error else display if existed
            $student_data=Students::findOrFail($id)->get(); //findOrFail if there is a parameter passed and not existed it shows error instead if existed showt the result
        */
       
        /* GROUP BY AND COUNT
        $count_data = DB::table('students')
                ->select(DB::raw('count(*) as gender_count, gender'))
                ->groupBy('gender')
                ->get();
        */


         /* Sample 01: To display data in the index with group by
            $student_data=Students::where('age', '>', 19)->limit(5)->get();
            return view('students.index', ['students'=> $student_data], ['counts'=> $count_data]); //access views folder and file of index.blade.php
        */

        // Sample 02: call students.index since the query is integrated in AppServiceProvider.php
        return view('students.index');
    }
}
