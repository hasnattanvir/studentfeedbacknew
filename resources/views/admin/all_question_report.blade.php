

@include('adminlayouts.admin_css')




  <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
        <div class="forms">
     
          <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
            <div class="form-title">
              <h4>View User:</h4>
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


<div class="panel-body widget-shadow">

 <!--  <button class="btn btn-info" type="button" data-toggle="modal" data-target="#addfaculty"> Add question</button> -->



  <br>
  <br>
          
    <div class="table-responsive">
      <table id="customers">
    <thead>
      <tr>
         <th>Serial</th>
         @foreach($questiondata as $question)

           <th>{{$question->questionname}}</th>


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




   @include('adminlayouts.admin_js')