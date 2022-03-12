@extends('layouts.student_header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

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
       

           <form action="{{route('student_profile_update')}}" method="post" enctype="multipart/form-data" data-parsley-validate style="padding: 10px;">


           {{ csrf_field()}}


           @foreach($data as $val)

           
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="name" value="{{$val->name}}">
                <input type="hidden" name="id" id="id" value="{{$val->id}}">
                
            </div>


            <div class="form-group">
                <label>Number</label>
                <input type="text" name="number" id="number" value="{{$val->phone}}">
                
            </div>


         

          @endforeach


           

           




               <input type="submit" name="submit" value="update" class="btn btn-info">



            </form>





          
                     </div>      


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
