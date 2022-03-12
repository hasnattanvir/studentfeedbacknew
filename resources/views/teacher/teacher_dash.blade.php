@extends('layouts.teacher_header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @foreach($teachers as $teacher)
              
                <div class="card-header">{{$teacher->name}} {{ __('Dashboard') }}</div>

                <div class="card-body">
                   
                            <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
            <div class="form-title">
              


              @endforeach
            </div>


            
        
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

<br>
<form method="get">
  <select class="form-control" name="batch" style="width:50%;float: left;margin-left: 10px;">
      <option value="">Select batch</option>
    @foreach($batchdata as $batch)
               <option value="{{$batch->batchname}}">{{$batch->batchname}}</option>


              @endforeach
  </select>

  <button type="submit" class="btn btn-info" style="margin-left: 10px;">search</button>
  
</form>

<br>

  @if(isset($_GET['batch']))

      <p style="text-align: center;"> Your Select batch: {{$_GET['batch']}}</p>

  @endif

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
      <table id="customers">
    <thead>
      <tr>
         
         <th>Total performance</th>
         <th>Total Student </th>
         @foreach($questiondata as $question)

           <th>{{$question->questionname}}  </th>


         @endforeach
         
      </tr>
    </thead>
       <tbody>
           @php 
              $i=1;
              @endphp
                    @foreach($feedbackdata as $feedback)
                     
                <tr>
                  <td>{{round((($feedback->tone*100)/(5*$feedback->tstudent)+($feedback->ttwo*100)/(5*$feedback->tstudent)+($feedback->tthree*100)/(5*$feedback->tstudent)+($feedback->tfour*100)/(5*$feedback->tstudent)+($feedback->tfive*100)/(5*$feedback->tstudent)+($feedback->tsix*100)/(5*$feedback->tstudent)+($feedback->tseven*100)/(5*$feedback->tstudent)+($feedback->teight*100)/(5*$feedback->tstudent)+($feedback->tnine*100)/(5*$feedback->tstudent)+($feedback->tten*100)/(5*$feedback->tstudent))/10,2)}} %</td>
                  <td>{{$feedback->tstudent}}</td>
                  <td>{{round(($feedback->tone*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->ttwo*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->tthree*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->tfour*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->tfive*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->tsix*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->tseven*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->teight*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->tnine*100)/(5*$feedback->tstudent),2)}} %</td>
                  <td>{{round(($feedback->tten*100)/(5*$feedback->tstudent),2)}} %</td>

                  
               
                
                  
                </tr>
              

                @endforeach

       </tbody>


   </table>  
           
</div>

                   


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
