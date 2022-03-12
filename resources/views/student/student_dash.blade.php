@extends('layouts.student_header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   


                    <div class="panel-body widget-shadow">
          
    <div class="table-responsive">
   
    <table id="customers">
    <thead>
      <tr>
         <th>Serial</th>
         <th>Course Name</th>
         <th>Teacher Name</th>
         <th> Action</th>
         
      </tr>
    </thead>
       <tbody>
           @php 
              $i=1;
              @endphp
                    @foreach($assignteacher as $assigntea)
                     
                <tr>
                  <td scope="row">{{$i++}}</td>
                  <td>{{$assigntea->tname}}</td>
                  <td>{{$assigntea->course}}</td>
                  
                  @php

                   $checkfeed = DB::table('feedback')->where('teacherid',$assigntea->teacherid)->where('studentid',$checkstudent->id)->where('batch',$checkstudent->batch)->where('shift',$checkstudent->shift)->first(); 

                   @endphp


                
                    @if($checkfeed)
         
                   <td>Done</td>
                  

                  @else

                    <td> 
                    <a href="{{route('feedback.show',$assigntea->teacherid)}}">Feedback</a>

                  </td>
                  @endif

             
                
                  
                </tr>
              

                @endforeach

       </tbody>


   </table>  
           <div class="d-flex justify-content-center">
                {!! $assignteacher->appends(['sort' => 'science-stream'])->links() !!}
            </div>  
</div>


          
          </div>      


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
