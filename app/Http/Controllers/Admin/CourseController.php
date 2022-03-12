<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseModel;
use DB;

class CourseController extends Controller
{



     public function index()
    {
        $users = DB::table('course')->orderBy('id','desc')->get();
        return view('admin/course_page',compact('users'));
    }



 



  public function destroy(Request $request,$myid)
    {
            $service = CourseModel::findorFail($request->id);
            $service->delete();
            return redirect()->back()->with('status', ' Data Delete success !');
    }




  public function update(Request $request, $id)
    {

      $request->validate([
        'coursename' => 'required'
    

        
         
     ]);

          $post = CourseModel::find($request->id);
          $post->coursename = $request->coursename;
      

      
            

              $post->update();
              return redirect()->back()->with('status', ' Data update success !');
    }




     public function store(Request $request)
    {   
       



       
         

         

            if ($request->coursename=="") {
                 return response()->json([
                   'message'   => 'Field Must not empty !',
                    ]);
            }else{


                $admindata = new CourseModel();
                $admindata->coursename = $request->coursename;

           


         
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
