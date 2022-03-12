<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeedbackModel;
use DB;

class FeedbackController extends Controller
{
    

      public function show($teacherid)
    {
        $questiondata = DB::table('question')->get();
        return view('student/feedback',compact('questiondata','teacherid'));
    }







       public function store(Request $request)
            
             {

             $checkstudent = DB::table('students')->where('id','=',session('LoggedStudent'))->first();
             $assignteacher = DB::table('assign_teacher')->where('teacherid','=',$request->teacherid)->first();

             if ($checkstudent) {
                $admindata = new FeedbackModel();
                $admindata->teacherid = $request->teacherid;
                $admindata->studentid = $checkstudent->id;
                $admindata->faculty = $checkstudent->faculty;
                $admindata->department = $checkstudent->department;
                $admindata->batch = $checkstudent->batch;
                $admindata->course = $assignteacher->course;
                $admindata->shift = $checkstudent->shift;
                $admindata->one = $request->rank1;
                $admindata->two = $request->rank2;
                $admindata->three = $request->rank3;
                $admindata->four = $request->rank4;
                $admindata->five = $request->rank5;
                $admindata->six = $request->rank6;
                $admindata->seven = $request->rank7;
                $admindata->eight = $request->rank8;
                $admindata->nine = $request->rank9;
                $admindata->ten = $request->rank10;

                $submitfeedback =$admindata->save(); 
                if ($submitfeedback) {
                    return redirect()->route('student_dash')->with('status', ' Feedback given successfully !');
                }else{
                   return redirect()->back()->with('error', ' Something Wrong!'); 
                }

             }else{
                 return redirect()->route('student_login')->with('error', ' You are not login !');
             }
           
                

      

             
        
              }

}
