<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }



      public function admin_send_password()
    {
        $admindata = DB::table('admin')->where('email',$request->email)->get();

         $admindata =array(
        'name' => $request->w3lName,
        'sender' => $request->w3lSender,
        'subject' => $request->w3lSubect,
        'website' => $request->w3lWebsite,
        'body' => $request->w3lMessage
        );
   
       \Mail::to($request->w3lSender)->send(new \App\Mail\adminpassword($admindata));

       $slidertext->save();
        return redirect()->back()->with('status', ' Email send success !');
    }



}
