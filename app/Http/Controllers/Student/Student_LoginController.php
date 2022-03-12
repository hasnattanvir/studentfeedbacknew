<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Models\Assign_Teacher_Model;
use Illuminate\Support\Facades\Hash;
use DB;

class Student_LoginController extends Controller
{
      


    public function student_dash()
    {
      $data = DB::table('students')->where('id','=',session('LoggedStudent'))->first();
      $assignteacher = DB::table('assign_teacher')->join('teacher_name', 'teacher_name.id', '=', 'assign_teacher.teacherid')
        ->select('teacher_name.name as tname','teacher_name.id as tid','assign_teacher.*')->where('batch','=',$data->batch)->paginate(30);
    $checkstudent = DB::table('students')->where('id','=',session('LoggedStudent'))->first();
      return view('student/student_dash',compact('assignteacher','checkstudent')); 
        
    }


   public function student_profile()
    {
      $data = DB::table('students')->where('id','=',session('LoggedStudent'))->get();
      return view('student/student_profile',compact('data')); 
        
    }



    public function student_profile_update(Request $request){
        $request->validate([
            'name' => 'required',
            'number' => 'required'
          ]);


        $updateprofile = StudentModel::find($request->id);
        $updateprofile->name = $request->name;
        $updateprofile->phone = $request->number;
        $updateprofile->update();

        return redirect()->back()->with('status', ' Update success');

    }

 public function student_login()
    {

      return view('auth/student_login'); 
        
    }



    public function student_logout()
    {
     
     if (session()->has('LoggedStudent')) {
         session()->pull('LoggedStudent');
         return redirect()->route('student_login');
     }
        
    }



    public function student_login_submit(Request $request)
            
             {

          $request->validate([
            'regi' => 'required',
            'batch' => 'required',
            'shift' => 'required',
            'password' => 'required|min:5|max:11',
          ]);

            $userinfo = StudentModel::where('regi','=',$request->regi)
            ->where('batch','=',$request->batch)->where('shift','=',$request->shift)->first();


            if (!$userinfo) {
                return redirect()->back()->with('error', 'Wrong Information');
            }else{


                if (Hash::check($request->password,$userinfo->password)) {
                    if ($userinfo->status==1) {
                        $request->session()->put('LoggedStudent',$userinfo->id);
                        return redirect()->route('student_dash'); 
                    }else{
                        return redirect()->back()->with('error', ' Your Account is now pending !');
                    }
                    
                }else{

                    return redirect()->back()->with('error', ' Password didnot match !');

                }
      

             }
        
    }



    
}
