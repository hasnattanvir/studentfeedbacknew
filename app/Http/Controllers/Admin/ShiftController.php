<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShiftModel;
use DB;

class ShiftController extends Controller
{
   


     public function index()
    {
        $users = DB::table('shift')->orderBy('id','desc')->paginate(30);
        return view('admin/shift_page',compact('users'));
    }



 



  public function destroy(Request $request,$myid)
    {
            $service = ShiftModel::findorFail($request->id);
            $service->delete();
            return redirect()->back()->with('status', ' Data Delete success !');
    }




  public function update(Request $request, $id)
    {

      $request->validate([
        'shiftname' => 'required'
    

        
         
     ]);

          $post = ShiftModel::find($request->id);
          $post->shiftname = $request->shiftname;
      

      
            

              $post->update();
              return redirect()->back()->with('status', ' Data update success !');
    }




     public function store(Request $request)
    {   
       



       
         

         

            if ($request->shiftname=="") {
                 return response()->json([
                   'message'   => 'Field Must not empty !',
                    ]);
            }else{


                $admindata = new ShiftModel();
                $admindata->shiftname = $request->shiftname;

           


         
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
