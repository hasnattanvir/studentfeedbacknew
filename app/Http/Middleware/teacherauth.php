<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class teacherauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('LoggedTeacher') && $request->path() !="teacher_login" && $request->path() !="teacher_register") {
            return redirect()->route('teacher_login')->with('error','You must login first');
        }


        if (session()->has('LoggedTeacher') && $request->path() =="teacher_login" && $request->path() =="teacher_register") {
            return back();
        }


        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0,must-revalidate')->header('Pragma','no-cache')->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}
