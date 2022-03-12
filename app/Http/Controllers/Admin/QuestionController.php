<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuestionModel;
use DB;

class QuestionController extends Controller
{
     public function index()
    {
        $users = DB::table('question')->orderBy('id','asc')->paginate(30);
        return view('admin/question_page',compact('users'));
    }



 



  public function destroy(Request $request,$myid)
    {
            $service = QuestionModel::findorFail($request->id);
            $service->delete();
            return redirect()->back()->with('status', ' Data Delete success !');
    }




  public function update(Request $request, $id)
    {

      $request->validate([
        'questionname' => 'required'
    

        
         
     ]);

          $post = QuestionModel::find($request->id);
          $post->questionname = $request->questionname;
      

      
            

              $post->update();
              return redirect()->back()->with('status', ' Data update success !');
    }




     public function store(Request $request)
    {   
       



       
         

         

            if ($request->questionname=="") {
                 return response()->json([
                   'message'   => 'Field Must not empty !',
                    ]);
            }else{


                $admindata = new QuestionModel();
                $admindata->questionname = $request->questionname;

           


         
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
