<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FacultyModel;
use Illuminate\Support\Facades\Hash;
use DB;

class FacultyController extends Controller
{


    
     public function index()
    {
        $users = DB::table('faculty')->orderBy('id','desc')->paginate(30);
        return view('admin/faculty_page',compact('users'));
    }



 



  public function destroy(Request $request,$myid)
    {
            $service = FacultyModel::findorFail($request->id);
            $service->delete();
            return redirect()->back()->with('status', ' Data Delete success !');
    }




  public function update(Request $request, $id)
    {

      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'status' => 'required'
    

        
         
     ]);

          $post = FacultyModel::find($request->id);
          $post->name = $request->name;
          $post->status = $request->status;
          $userinfo = FacultyModel::where('id','=',$request->id)->first();
             if ($userinfo->email != $request->email) {
                    $checkemail = Admin::where('email','=',$request->email)->first();

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
       



       
         

          $userinfo = FacultyModel::where('email','=',$request->email)->first();

            if ($request->name=="" || $request->email==""||$request->designation==""||$request->password==""||$request->password_confirmation=="") {
                 return response()->json([
                   'message'   => 'Field Must not empty !',
                    ]);
            }elseif ($userinfo) {
                 return response()->json([
                   'message'   => 'Email Already Exists !',
                    ]);
            }elseif ($request->password_confirmation !=$request->password) {

                return response()->json([
                   'message'   => 'Password didnot match..',
                    ]);

            }else{


                $admindata = new FacultyModel();
                $admindata->name = $request->name;
                $admindata->email = $request->email;
                $admindata->designation = $request->designation;
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
