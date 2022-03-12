<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teachers_Name_Model;
use Illuminate\Support\Facades\Hash;
use DB;

class Teacher_Name_Controller extends Controller
{
     public function index()
    {
        $users = DB::table('teacher_name')
        ->join('faculty', 'faculty.id', '=', 'teacher_name.faculty')
        ->select('faculty.name as fname','faculty.id as fid','teacher_name.*')
        ->orderBy('id','desc')->paginate(30);
        $facultydata = DB::table('faculty')->where('status','1')->orderBy('id','asc')->get();
        return view('admin/teacher_page',compact('users','facultydata'));
    }



 



  public function destroy(Request $request,$myid)
    {
            $service = Teachers_Name_Model::findorFail($request->id);
            $service->delete();
            return redirect()->back()->with('status', ' Data Delete success !');
    }




  public function update(Request $request, $id)
    {

        $request->validate([
        'name' => 'required',
        'faculty' => 'required',
        'email' => 'required',
        'status' => 'required'
    

        
        
    ]);

          $post = Teachers_Name_Model::find($request->id);
          $post->name = $request->name;
          $post->faculty = $request->faculty;
          $post->status = $request->status;
          $userinfo = Teachers_Name_Model::where('id','=',$request->id)->first();
             if ($userinfo->email != $request->email) {
                    $checkemail = Teachers_Name_Model::where('email','=',$request->email)->first();

                    if ($checkemail) {
                        return redirect()->back()->with('error', ' Email Already Exists !');
                    }else{

                       $post->email = $request->email;
                    }
                  }
      

      
            

              $post->update();
              return redirect()->back()->with('status', ' Data update success !');
    }




     public function store(Request $request)
    {   
       




          $userinfo = Teachers_Name_Model::where('email','=',$request->email)->first();

            if ($request->name==""||$request->faculty==""||$request->email==""||$request->password=="") {
                 return response()->json([
                   'message'   => 'Field Must not empty !',
                    ]);
            }elseif ($userinfo) {
                 return response()->json([
                   'message'   => 'Email Already Exists',
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


                $admindata = new Teachers_Name_Model();
                $admindata->name = $request->name;
                $admindata->faculty = $request->faculty;
                $admindata->email = $request->email;
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
