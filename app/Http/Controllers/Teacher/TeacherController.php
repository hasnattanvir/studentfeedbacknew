<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teachers_Name_Model;
use App\Models\Assign_Teacher_Model;
use Illuminate\Support\Facades\Hash;
use DB;

class TeacherController extends Controller
{
 


    public function teacher_login()
    {

      return view('auth/teacher_login'); 
        
    }

         public function teacher_profile()
    {
      $data = DB::table('teacher_name')->where('id','=',session('LoggedTeacher'))->get();
      return view('teacher/teacher_profile',compact('data')); 
        
    }




      public function teacher_profile_update (Request $request){
        $request->validate([
            'name' => 'required',
            'cpassword' => 'required'
          ]);

         $userinfo = Teachers_Name_Model::where('id','=',$request->id)->first();
        if (Hash::check($request->cpassword,$userinfo->password)) {
              $updateprofile = Teachers_Name_Model::find($request->id);
                $updateprofile->name = $request->name;
                if (isset($request->npassword)) {
                    $updateprofile->password = Hash::make($request->npassword);
                }
             $submit =  $updateprofile->update();

             if ($submit) {
                 return redirect()->back()->with('status', ' Update success');
             }else{
                return redirect()->back()->with('error', 'Wrong Information');
             }
        }else{
         return redirect()->back()->with('error', 'Password didnot match!');
        }

       

        

    }




     public function teacher_login_submit(Request $request)
            
             {

          $request->validate([
            'email' => 'required',
            'password' => 'required|min:5|max:11',
          ]);

            $userinfo = Teachers_Name_Model::where('email','=',$request->email)->first();


            if (!$userinfo) {
                return redirect()->back()->with('error', 'Wrong Information');
            }else{


                if (Hash::check($request->password,$userinfo->password)) {
                    if ($userinfo->status==1) {
                        $request->session()->put('LoggedTeacher',$userinfo->id);
                        return redirect()->route('teacher_dash'); 
                    }else{
                        return redirect()->back()->with('error', ' Your Account is now pending !');
                    }
                    
                }else{

                    return redirect()->back()->with('error', ' Password didnot match !');

                }
      

             }
        
    }




   public function teacher_dash()
    {
        if (isset($_GET['batch'])) {
            $checkdata = DB::table('feedback')->where('teacherid',session('LoggedTeacher'))
            ->where('batch',$_GET["batch"])->first();
            if ($checkdata) {
                $feedbackdata = DB::table('feedback')
            ->select('feedback.*', DB::raw('SUM(one) as tone'), DB::raw('SUM(two) as ttwo'), DB::raw('SUM(three) as tthree'), DB::raw('SUM(four) as tfour'), DB::raw('SUM(five) as tfive'), DB::raw('SUM(six) as tsix'), DB::raw('SUM(seven) as tseven'), DB::raw('SUM(eight) as teight'), DB::raw('SUM(nine) as tnine'), DB::raw('SUM(ten) as tten'), DB::raw('count(*) as tstudent'))
            ->where('teacherid',session('LoggedTeacher'))
            ->where('batch',$_GET["batch"])
            ->get();
            }else{
               return redirect()->back()->with('error', ' this batch data did not found');
            }
            
        }else{
            $feedbackdata = DB::table('feedback')
            ->select('feedback.*', DB::raw('SUM(one) as tone'), DB::raw('SUM(two) as ttwo'), DB::raw('SUM(three) as tthree'), DB::raw('SUM(four) as tfour'), DB::raw('SUM(five) as tfive'), DB::raw('SUM(six) as tsix'), DB::raw('SUM(seven) as tseven'), DB::raw('SUM(eight) as teight'), DB::raw('SUM(nine) as tnine'), DB::raw('SUM(ten) as tten'), DB::raw('count(*) as tstudent'))
            ->where('teacherid',session('LoggedTeacher'))
            ->get();
        }
      
        $questiondata = DB::table('question')->orderBy('id','asc')->limit(10)->get();
        $teachers = DB::table('teacher_name')->where('id',session('LoggedTeacher'))->get();
         $batchdata = DB::table('batch')->orderBy('id','asc')->get();
      return view('teacher.teacher_dash',compact('feedbackdata','questiondata','teachers','batchdata')); 
        
    }


 public function teacher_logout()
    {
     
     if (session()->has('LoggedTeacher')) {
         session()->pull('LoggedTeacher');
         return redirect()->route('teacher_login');
     }
        
    }




}
