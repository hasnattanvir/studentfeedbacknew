<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use DB;


class AdminController extends Controller
{




    public function admin_login()
    {

      return view('auth/admin_login'); 
        
    }






        public function admin_login_submit(Request $request)
            
             {

          $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:11',
          ]);

            $userinfo = Admin::where('email','=',$request->email)->first();


            if (!$userinfo) {
                return redirect()->back()->with('error', 'We cannot recognize your email');
            }else{


                if (Hash::check($request->password,$userinfo->password)) {
                    if ($userinfo->status==1) {
                        $request->session()->put('LoggedUser',$userinfo->id);
                        return redirect()->route('admin_dashboard'); 
                    }else{
                        return redirect()->back()->with('error', ' Your Account is now pending !');
                    }
                    
                }else{

                    return redirect()->back()->with('error', ' Password didnot match !');

                }
      

             }
        
    }





     public function admin_register()
    {

      return view('auth/admin_register'); 
        
    }



     public function admin_register_submit(Request $request)
    {

          $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admin', 
            'password' => 'required|min:5|max:11',
          ]);

            if ($request->password_confirmation !=$request->password) {
                return redirect()->back()->with('error', 'Password didnot match..');
            }else{


                $admindata = new Admin();
                $admindata->name = $request->name;
                $admindata->email = $request->email;
                $admindata->password = Hash::make($request->password);

           


         
             $submitadmit = $admindata->save();

             if ($submitadmit) {
                  return redirect()->back()->with('status', ' Admin Registration success !');
             }else{
                 return redirect()->back()->with('error', 'Something error ! Try again ...');
             }
      


             }
        
    }


   




    public function admin_logout()
    {
     
     if (session()->has('LoggedUser')) {
         session()->pull('LoggedUser');
         return redirect()->route('admin_login');
     }
        
    }



  public function admin_dashboard()
    {
     $userinfo = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
      return view('admin.dashboard',$userinfo); 
        
    }



  public function admin_report()
    {
      $feedbackdata = DB::table('teacher_name')
            ->join('feedback', 'feedback.teacherid', '=', 'teacher_name.id')
            ->select('feedback.*','teacher_name.name as tname','teacher_name.id as tid', DB::raw('SUM(feedback.one) as tone'), DB::raw('SUM(feedback.two) as ttwo'), DB::raw('SUM(feedback.three) as tthree'), DB::raw('SUM(feedback.four) as tfour'), DB::raw('SUM(feedback.five) as tfive'), DB::raw('SUM(feedback.six) as tsix'), DB::raw('SUM(feedback.seven) as tseven'), DB::raw('SUM(feedback.eight) as teight'), DB::raw('SUM(feedback.nine) as tnine'), DB::raw('SUM(feedback.ten) as tten'), DB::raw('count(*) as tstudent'))
            ->groupBy('feedback.teacherid')
            ->get();
        $questiondata = DB::table('question')->orderBy('id','asc')->limit(10)->get();
      return view('admin.admin_report',compact('feedbackdata','questiondata')); 
        
    }



  public function report_details($tid)
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
      return view('admin.report_details',compact('feedbackdata','questiondata','teachers','batchdata')); 
        
    }



  public function all_question_report()
    {
      $feedbackdata = DB::table('feedback')
            ->select('feedback.*', DB::raw('SUM(one) as tone'), DB::raw('SUM(two) as ttwo'), DB::raw('SUM(three) as tthree'), DB::raw('SUM(four) as tfour'), DB::raw('SUM(five) as tfive'), DB::raw('SUM(six) as tsix'), DB::raw('SUM(seven) as tseven'), DB::raw('SUM(eight) as teight'), DB::raw('SUM(nine) as tnine'), DB::raw('SUM(ten) as tten'), DB::raw('count(*) as tstudent'))
            ->get();
        $questiondata = DB::table('question')->orderBy('id','asc')->limit(10)->get();
      return view('admin.all_question_report',compact('feedbackdata','questiondata')); 
        
    }


public function admin_profile()
    {
     $userinfo = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
      return view('admin.admin_profile',$userinfo); 
        
    }




 public function admin_profile_submit(Request $request)
    {

          $request->validate([
            'name' => 'required',
            'email' => 'required|email', 
            'currentpassword' => 'required|min:5|max:11',
          ]);



          $userinfo = Admin::where('id','=',$request->id)->first();
          if ($userinfo) {

               if (Hash::check($request->currentpassword,$userinfo->password)) {
          



                $admindata = Admin::find($request->id);
                $admindata->name = $request->name;

                  if ($userinfo->email != $request->email) {
                    $checkemail = Admin::where('email','=',$request->email)->first();

                    if ($checkemail) {
                        return redirect()->back()->with('error', ' Email Already Exists !');
                    }else{

                       $admindata->email = $request->email;
                    }
                  }


                  $updateprofile = $admindata->update();

                  if ($updateprofile) {
                      return redirect()->back()->with('status', ' Admin profile update success !');
                  }else{
                       return redirect()->back()->with('error', 'Something error ! Try again ...');
                  }



              }else{
                return redirect()->back()->with('error', ' Password didnot match !');
              }




          }else{
            return redirect()->back()->with('error', ' User didnot found !');
          }
         


           
        
    }






   public function view_admin()
    {
        $users = DB::table('admin')->paginate(30);
        return view('admin/view_admin',compact('users'));
    }



   



  public function view_admin_delete(Request $request)
    {
            $service = Admin::findorFail($request->id);
            $service->delete();
            return redirect()->back()->with('status', ' Data Delete success !');
    }




  public function view_admin_update(Request $request)
    {


         $request->validate([
        'name' => 'required',
        'email' => 'required',
        'status' => 'required'
    

        
        
    ]);

          $post = Admin::find($request->id);
          $post->name = $request->name;
          $post->status = $request->status;
          $userinfo = Admin::where('id','=',$request->id)->first();
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




}
