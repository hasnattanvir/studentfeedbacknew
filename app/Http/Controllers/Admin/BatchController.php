<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BatchModel;
use DB;

class BatchController extends Controller
{
    
     public function index()
    {
        $users = DB::table('batch')->orderBy('id','desc')->paginate(30);
        return view('admin/batch_page',compact('users'));
    }



 



  public function destroy(Request $request,$myid)
    {
            $service = BatchModel::findorFail($request->id);
            $service->delete();
            return redirect()->back()->with('status', ' Data Delete success !');
    }




  public function update(Request $request, $id)
    {

      $request->validate([
        'batchname' => 'required'
    

        
         
     ]);

          $post = BatchModel::find($request->id);
          $post->batchname = $request->batchname;
      

      
            

              $post->update();
              return redirect()->back()->with('status', ' Data update success !');
    }




     public function store(Request $request)
    {   
       



       
         

         

            if ($request->batchname=="") {
                 return response()->json([
                   'message'   => 'Field Must not empty !',
                    ]);
            }else{


                $admindata = new BatchModel();
                $admindata->batchname = $request->batchname;

           


         
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
