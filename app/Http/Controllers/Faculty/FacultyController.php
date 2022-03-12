<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FacultyModel;
use App\Models\Assign_faculty_Model;
use Illuminate\Support\Facades\Hash;
use DB;

class FacultyController extends Controller
{



    public function faculty_login()
    {

      return view('auth/faculty_login'); 
        
    }



 public function faculty_profile()
    {
      $data = DB::table('faculty')->where('id','=',session('LoggedFaculty'))->get();
      return view('faculty/faculty_profile',compact('data')); 
        
    }



      public function faculty_profile_update (Request $request){
        $request->validate([
            'name' => 'required',
            'cpassword' => 'required'
          ]);

         $userinfo = FacultyModel::where('id','=',$request->id)->first();
        if (Hash::check($request->cpassword,$userinfo->password)) {
              $updateprofile = FacultyModel::find($request->id);
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



     public function faculty_login_submit(Request $request)
            
             {

          $request->validate([
            'email' => 'required',
            'password' => 'required|min:5|max:11',
          ]);

            $userinfo = FacultyModel::where('email','=',$request->email)->first();


            if (!$userinfo) {
                return redirect()->back()->with('error', 'Wrong Information');
            }else{


                if (Hash::check($request->password,$userinfo->password)) {
                    if ($userinfo->status==1) {
                        $request->session()->put('LoggedFaculty',$userinfo->id);
                        return redirect()->route('faculty_dash'); 
                    }else{
                        return redirect()->back()->with('error', ' Your Account is now pending !');
                    }
                    
                }else{

                    return redirect()->back()->with('error', ' Password didnot match !');

                }
      

             }
        
    }




   public function faculty_dash()
    {
        $feedbackdata = DB::table('teacher_name')
            ->join('feedback', 'feedback.teacherid', '=', 'teacher_name.id')
            ->select('feedback.*','teacher_name.name as tname','teacher_name.id as tid', DB::raw('SUM(feedback.one) as tone'), DB::raw('SUM(feedback.two) as ttwo'), DB::raw('SUM(feedback.three) as tthree'), DB::raw('SUM(feedback.four) as tfour'), DB::raw('SUM(feedback.five) as tfive'), DB::raw('SUM(feedback.six) as tsix'), DB::raw('SUM(feedback.seven) as tseven'), DB::raw('SUM(feedback.eight) as teight'), DB::raw('SUM(feedback.nine) as tnine'), DB::raw('SUM(feedback.ten) as tten'), DB::raw('count(*) as tstudent'))
            ->where('feedback.faculty',session('LoggedFaculty'))
            ->groupBy('feedback.teacherid')
            ->get();
        $questiondata = DB::table('question')->orderBy('id','asc')->limit(10)->get();
      return view('faculty.faculty_dash',compact('feedbackdata','questiondata'));
        
    }







    public function faculty_report_details($tid)
    {
        if (isset($_GET['batch'])) {
            $checkdata = DB::table('feedback')->where('teacherid',$tid)
            ->where('batch',$_GET["batch"])->first();
            if ($checkdata) {
                $feedbackdata = DB::table('feedback')
            ->select('feedback.*', DB::raw('SUM(one) as tone'), DB::raw('SUM(two) as ttwo'), DB::raw('SUM(three) as tthree'), DB::raw('SUM(four) as tfour'), DB::raw('SUM(five) as tfive'), DB::raw('SUM(six) as tsix'), DB::raw('SUM(seven) as tseven'), DB::raw('SUM(eight) as teight'), DB::raw('SUM(nine) as tnine'), DB::raw('SUM(ten) as tten'), DB::raw('count(*) as tstudent'))
            ->where('teacherid',$tid)
            ->where('batch',$_GET["batch"])
            ->get();
            }else{
               return redirect()->back()->with('error', ' this batch data did not found');
            }
            
        }else{
            $feedbackdata = DB::table('feedback')
            ->select('feedback.*', DB::raw('SUM(one) as tone'), DB::raw('SUM(two) as ttwo'), DB::raw('SUM(three) as tthree'), DB::raw('SUM(four) as tfour'), DB::raw('SUM(five) as tfive'), DB::raw('SUM(six) as tsix'), DB::raw('SUM(seven) as tseven'), DB::raw('SUM(eight) as teight'), DB::raw('SUM(nine) as tnine'), DB::raw('SUM(ten) as tten'), DB::raw('count(*) as tstudent'))
            ->where('teacherid',$tid)
            ->get();
        }
      
        $questiondata = DB::table('question')->orderBy('id','asc')->limit(10)->get();
        $teachers = DB::table('teacher_name')->where('id',$tid)->get();
         $batchdata = DB::table('batch')->orderBy('id','asc')->get();
      return view('faculty.faculty_report_details',compact('feedbackdata','questiondata','teachers','batchdata')); 
        
    }






 public function faculty_logout()
    {
     
     if (session()->has('LoggedFaculty')) {
         session()->pull('LoggedFaculty');
         return redirect()->route('faculty_login');
     }
        
    }
}
