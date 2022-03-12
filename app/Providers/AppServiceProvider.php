<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Admin;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Paginator::useBootstrap();

        
       

         view()->composer('adminlayouts.admin_css', function ($view) {
            $data = DB::table('admin')->where('id','=',session('LoggedUser'))->first();
            $view->data = $data;
        });


         view()->composer('layouts.student_header', function ($view) {
            $data = DB::table('students')->where('id','=',session('LoggedStudent'))->first();
            $view->data = $data;
        }); 

         view()->composer('layouts.teacher_header', function ($view) {
            $data = DB::table('teacher_name')->where('id','=',session('LoggedTeacher'))->first();
            $view->data = $data;
        });
      

      view()->composer('layouts.faculty_header', function ($view) {
            $data = DB::table('faculty')->where('id','=',session('LoggedFaculty'))->first();
            $view->data = $data;
        });



    }
}
