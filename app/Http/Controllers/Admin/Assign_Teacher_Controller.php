<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assign_Teacher_Model;
use Illuminate\Support\Facades\Hash;
use DB;


class Assign_Teacher_Controller extends Controller
{


     public function index()
    {
        $users = DB::table('assign_teacher')
        ->join('teacher_name', 'teacher_name.id', '=', 'assign_teacher.teacherid')
        ->select('teacher_name.name as tname','teacher_name.id as tid','assign_teacher.*')
        ->orderBy('id','desc')->paginate(30);
        $facultydata = DB::table('faculty')->where('status','1')->orderBy('id','asc')->get();
        $batchdata = DB::table('batch')->orderBy('id','asc')->get();
        $shiftdata = DB::table('shift')->orderBy('id','asc')->get();
        $teacherdata = DB::table('teacher_name')->where('status','1')->orderBy('id','asc')->get();
        $coursedata = DB::table('course')->orderBy('id','asc')->get();
        return view('admin/assign_teacher_page',compact('users','facultydata','batchdata','shiftdata','teacherdata','coursedata'));
    }



 



  public function destroy(Request $request,$myid)
    {
            $service = Assign_Teacher_Model::findorFail($request->id);
            $service->delete();
            return redirect()->back()->with('status', ' Data Delete success !');
    }




  public function update(Request $request, $id)
    {

        $request->validate([
        'teacherid' => 'required',
        'faculty' => 'required',
        'department' => 'required',
        'batch' => 'required',
        'shift' => 'required',
        'course' => 'required',
        'status' => 'required'
    

        
        
    ]);

          $post = Assign_Teacher_Model::find($request->id);
                $post->teacherid = $request->teacherid;
                $post->faculty = $request->faculty;
                $post->department = $request->department;
                $post->batch = $request->batch;
                $post->course = $request->course;
                $post->shift = $request->shift;
                $post->status = $request->status;


              


      
            

              $post->update();
              return redirect()->back()->with('status', ' Data update success !');
    }




     public function store(Request $request)
    {   
       




         

            if ($request->teacherid==""||$request->faculty==""||$request->department==""||$request->batch==""||$request->shift==""||$request->course=="") {
                 return response()->json([
                   'message'   => 'Field Must not empty !',
                    ]);
            }else{


                $admindata = new Assign_Teacher_Model();
                $admindata->teacherid = $request->teacherid;
                $admindata->faculty = $request->faculty;
                $admindata->department = $request->department;
                $admindata->batch = $request->batch;
                $admindata->shift = $request->shift;
                $admindata->course = $request->course;

           


         
             $submitadmit = $admindata->save();

             if ($submitadmit) {
                  return response()->json([
                   'message'   => '1',
                    ]);
             }else{
                  return response()->json([
                   'message'   => 'Something error ! Try again ...',
                    ]);
             }
      


             }
         

         

            
    }
}
