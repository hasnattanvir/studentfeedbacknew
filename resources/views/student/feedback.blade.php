@extends('layouts.student_header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   


                    <div class="panel-body widget-shadow">
          
  

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
       

           <form action="{{route('feedback.store')}}" method="post" enctype="multipart/form-data" data-parsley-validate style="padding: 10px;">


           {{ csrf_field()}}

           <br>
         <input type="hidden" name="teacherid" class="form-control" value="{{$teacherid}}">


         @foreach($questiondata as $question)

           <div class="form-group">
            <label>{{$question->id}}.{{$question->questionname}}</label>
            <select class="form-control" name="rank{{$question->id}}">
                <option value="1">Weak</option>
                <option value="2">Good</option>
                <option value="3">Avarage</option>
                <option value="4">Very Good</option>
                <option value="5">Excellent</option>
            </select>

             
           </div>


          
             @endforeach


         

          


           

           




               <input type="submit" name="submit" value="submit" class="btn btn-info">



            </form>





          
                     </div>      


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
