@extends('layouts.faculty_header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              




   @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @elseif (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
   
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="panel-body widget-shadow">

 <!--  <button class="btn btn-info" type="button" data-toggle="modal" data-target="#addfaculty"> Add question</button> -->

<style type="text/css">
  #numrows{
    width: 100px;
  } 
  #filter_by{
    width: 150px;
    float: right;
    margin-bottom: 5px;
  }
  #filter_input{
    margin-bottom: 5px;
  }
</style>

  <br>
  <br>
          
    <div class="table-responsive">
      <table id="customers" class="tablemanager">
    <thead>
      <tr>
         <th>Serial <i class="fa fa-sort"></i></th>
         <th>Teacher Name <i class="fa fa-sort"></i></th>
         <th>Department <i class="fa fa-sort"></i></th>
         <th>Batch <i class="fa fa-sort"></i></th>
         <th>Shift <i class="fa fa-sort"></i></th>
         <th>Course <i class="fa fa-sort"></i></th>
         <th>Total performance <i class="fa fa-sort"></i></th>
         <th class="disableSort">Details</th>
         <th>Total Student <i class="fa fa-sort"></i></th>
         @foreach($questiondata as $question)

           <th>{{$question->questionname}} <i class="fa fa-sort"></i> </th>


         @endforeach
         
      </tr>
    </thead>
       <tbody>
           @php 
              $i=1;
              @endphp
                    @foreach($feedbackdata as $feedback)
                     
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$feedback->tname}}</td>
                  <td>{{$feedback->department}}</td>
                  <td>{{$feedback->batch}}</td>
                  <td>{{$feedback->shift}}</td>
                  <td>{{$feedback->course}}</td>
                  <td>{{(($feedback->tone*100)/(5*$feedback->tstudent)+($feedback->ttwo*100)/(5*$feedback->tstudent)+($feedback->tthree*100)/(5*$feedback->tstudent)+($feedback->tfour*100)/(5*$feedback->tstudent)+($feedback->tfive*100)/(5*$feedback->tstudent)+($feedback->tsix*100)/(5*$feedback->tstudent)+($feedback->tseven*100)/(5*$feedback->tstudent)+($feedback->teight*100)/(5*$feedback->tstudent)+($feedback->tnine*100)/(5*$feedback->tstudent)+($feedback->tten*100)/(5*$feedback->tstudent))/10}} %</td>
                  <td> <a href="{{route('faculty_report_details',$feedback->tid)}}" class="btn btn-success">Details</a> </td>
                  <td>{{$feedback->tstudent}}</td>
                  <td>{{($feedback->tone*100)/(5*$feedback->tstudent)}} %</td>
                  <td>{{($feedback->ttwo*100)/(5*$feedback->tstudent)}} %</td>
                  <td>{{($feedback->tthree*100)/(5*$feedback->tstudent)}} %</td>
                  <td>{{($feedback->tfour*100)/(5*$feedback->tstudent)}} %</td>
                  <td>{{($feedback->tfive*100)/(5*$feedback->tstudent)}} %</td>
                  <td>{{($feedback->tsix*100)/(5*$feedback->tstudent)}} %</td>
                  <td>{{($feedback->tseven*100)/(5*$feedback->tstudent)}} %</td>
                  <td>{{($feedback->teight*100)/(5*$feedback->tstudent)}} %</td>
                  <td>{{($feedback->tnine*100)/(5*$feedback->tstudent)}} %</td>
                  <td>{{($feedback->tten*100)/(5*$feedback->tstudent)}} %</td>

                  
               
                
                  
                </tr>
              

                @endforeach

       </tbody>


   </table>  
           
</div>


          
          </div>      









        </div>
    </div>
</div>
@endsection
