@extends('layouts.faculty_header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="carddd">
              




                <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
            <div class="form-title">
              @foreach($teachers as $teacher)
                Name: {{$teacher->name}}


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
                  <td>{{(($feedback->tone*100)/(5*$feedback->tstudent)+($feedback->ttwo*100)/(5*$feedback->tstudent)+($feedback->tthree*100)/(5*$feedback->tstudent)+($feedback->tfour*100)/(5*$feedback->tstudent)+($feedback->tfive*100)/(5*$feedback->tstudent)+($feedback->tsix*100)/(5*$feedback->tstudent)+($feedback->tseven*100)/(5*$feedback->tstudent)+($feedback->teight*100)/(5*$feedback->tstudent)+($feedback->tnine*100)/(5*$feedback->tstudent)+($feedback->tten*100)/(5*$feedback->tstudent))/10}} %</td>
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
