<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

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

        $data = array("students" => DB::table('students')->orderBy('created_at', 'desc')->paginate(10));
        return view('students.index', $data);
    }

    //ADD NEW STUDENT TEMPLATE
    public function newstudent(){
        return view('students.newstudent')->with('title', 'Add User');
    }

    //PROCESS ADD STUDENT IN THE DB
    public function process_add(Request $request){
        $validated = $request->validate([
            "first_name" => ['required', 'min:4'],
            "last_name" => ['required', 'min:4'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email', Rule::unique('students', 'email')] //check students table if the email column should be unique
       ]); //set rule in validation

       if($request->hasFile('student_image')){ //Validate for image
        $request->validate([
            "student_image" => 'mimes:jpeg,png,bmp,tiff |max:4096' //rules to validate image must be on jpeg,png and 4mb
        ]);
        
        $filenameWithExtension = $request->file("student_image");
        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
        $extension = $request->file("student_image")->getClientOriginalExtension();

        $filenameToStore = $filename.'_'.time().'.'.$extension;
        $smallThumbnail= $filename.'_'.time().'.'.$extension;

        $request->file('student_image')->storeAs('public/student_profile', $filenameToStore);
        $request->file("student_image")->storeAs('public/student_profile/thumbnail', $smallThumbnail);
        
        $thumbnail = 'storage/student_profile/thumbnail/'.$smallThumbnail;
        $this->createThumbnail($thumbnail, 150, 93);

        $validated['student_image'] = $filenameToStore; //save to the student_image col in the db
        }


       Students::create($validated); //insert validated data in the database

       return redirect('/')->with('message', 'Student Added Successfully!');
    }

    //VIEW STUDENT DATA
    public function viewstudent($id){
        $data = Students::findOrFail($id);
        return view('students.editstudent', ['student'=>$data]);
    }

    //PROCESS EDIT/UPDATE
    public function process_update(Request $request, Students $student){
        $validated = $request->validate([
            "first_name" => ['required', 'min:4'],
            "last_name" => ['required', 'min:4'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email']
       ]);

       if($request->hasFile('student_image')){ //Validate for image
            $request->validate([
                "student_image" => 'mimes:jpeg,png,bmp,tiff |max:4096' //rules to validate image must be on jpeg,png and 4mb
            ]);
            
            $filenameWithExtension = $request->file("student_image");
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file("student_image")->getClientOriginalExtension();

            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $smallThumbnail= $filename.'_'.time().'.'.$extension;

            $request->file('student_image')->storeAs('public/student_profile', $filenameToStore);
            $request->file("student_image")->storeAs('public/student_profile/thumbnail', $smallThumbnail);
            
            $thumbnail = 'storage/student_profile/thumbnail/'.$smallThumbnail;
            $this->createThumbnail($thumbnail, 150, 93);

            $validated['student_image'] = $filenameToStore; //save to the student_image col in the db
       }

       $student->update($validated); //query to update
       return back()->with('message', 'Data Successfully Updated');
    }

    //PROCESS DELETE DATA
    public function process_delete(Students $student){
        $student->delete();
        return redirect('/')->with('message','Deleted Successfully');
    }

    //UPLOAD FILE/IMG BY GETTING THE NAME PATH
    public function createThumbnail($path, $width, $height){
        $img = Image::make($path)->resize($width, $height, function($constraint){
            $constraint->aspectRatio();
        });
        $img->save($path);

    }
}
