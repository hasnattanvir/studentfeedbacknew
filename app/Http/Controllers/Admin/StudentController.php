<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentModel;
use Illuminate\Support\Facades\Hash;
use DB;

class StudentController extends Controller
{


    
   public function index()
    {
        $users = DB::table('students')
        ->join('faculty', 'faculty.id', '=', 'students.faculty')
        ->select('faculty.name as fname','faculty.id as fid','students.*')
        ->orderBy('id','desc')->paginate(30);
        $facultydata = DB::table('faculty')->where('status','1')->orderBy('id','asc')->get();
        $batchdata = DB::table('batch')->orderBy('id','asc')->get();
        $shiftdata = DB::table('shift')->orderBy('id','asc')->get();
        return view('admin/student_page',compact('users','facultydata','batchdata','shiftdata'));
    }



 



  public function destroy(Request $request,$myid)
    {
            $service = StudentModel::findorFail($request->id);
            $service->delete();
            return redirect()->back()->with('status', ' Data Delete success !');
    }




  public function update(Request $request, $id)
    {

        $request->validate([
        'name' => 'required',
        'roll' => 'required',
        'regi' => 'required',
        'faculty' => 'required',
        'department' => 'required',
        'batch' => 'required',
        'phone' => 'required',
        'shift' => 'required',
        'status' => 'required'
    

        
        
    ]);

          $post = StudentModel::find($request->id);
                $post->name = $request->name;
                $post->faculty = $request->faculty;
                $post->department = $request->department;
                $post->batch = $request->batch;
                $post->phone = $request->phone;
                $post->shift = $request->shift;
                $post->status = $request->status;


              $checkregi = StudentModel::where('regi','=',$request->regi)->first();


             if ($checkregi->regi != $request->regi) {

                    if ($checkregi) {
                        return redirect()->back()->with('error', ' Registration id Already Exists !');
                    }else{

                        $post->regi = $request->regi;
                    }
                  } 



                  $checkroll = StudentModel::where('roll','=',$request->roll)->first();
                if ($checkroll->roll != $request->roll) {

                    if ($checkroll) {
                        return redirect()->back()->with('error', ' Roll Already Exists !');
                    }else{

                        $post->roll = $request->roll;
                    }
                  }
      

      
            

              $post->update();
              return redirect()->back()->with('status', ' Data update success !');
    }




     public function store(Request $request)
    {   
       




          $userinfo = StudentModel::where('regi','=',$request->regi)->first();

            if ($request->name==""||$request->roll==""||$request->regi==""||$request->faculty==""||$request->department==""||$request->batch==""||$request->phone==""||$request->shift==""||$request->password=="") {
                 return response()->json([
                   'message'   => 'Field Must not empty !',
                    ]);
            }elseif ($userinfo) {
                 return response()->json([
                   'message'   => 'Registration Id Already Exists',
                    ]);
            }elseif ($request->password_confirmation !=$request->password) {
                 return response()->json([
                   'message'   => 'Password didnot match..',
                    ]);
            }elseif ($request->password<5) {
                 return response()->json([
                   'message'   => 'Minimum password Lentgh 5 character',
                    ]);
            }else{


                $admindata = new StudentModel();
                $admindata->name = $request->name;
                $admindata->roll = $request->roll;
                $admindata->regi = $request->regi;
                $admindata->faculty = $request->faculty;
                $admindata->department = $request->department;
                $admindata->batch = $request->batch;
                $admindata->phone = $request->phone;
                $admindata->shift = $request->shift;
                $admindata->password = Hash::make($request->password);

           


         
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
