

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
         <th>question Name</th>
         <th> Action</th>
         
      </tr>
    </thead>
       <tbody>
           @php 
              $i=1;
              @endphp
                    @foreach($users as $user)
                     
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$user->questionname}}</td>

                  
                  <td><button type="button" class="btn btn-info" data-catid="{{$user->id}}" data-questionname="{{$user->questionname}}"  data-toggle="modal" data-target="#update"><i class="far fa-trash-alt"></i> Update</button> <!-- || <button type="button" class="btn btn-danger" data-catid="{{$user->id}}" data-toggle="modal" data-target="#delete"><i class="far fa-trash-alt"></i> DELETE</button> --></td>
                
                  
                </tr>
              

                @endforeach

       </tbody>


   </table>  
           <div class="d-flex justify-content-center">
                {!! $users->appends(['sort' => 'science-stream'])->links() !!}
            </div>  
</div>


          
          </div>      




















<!-- Modal -->
<div class="modal modal-danger fade" id="addfaculty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Add question</h4>
      </div>
  <form id="questiondata" method="post" enctype="multipart/form-data" data-parsley-validate>

       
           {{ csrf_field()}}
       
        <div class="modal-body">
        <p class="text-center">
       @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row mb-3">
                            <label for="questionname" class="col-md-4 col-form-label text-md-end">{{ __('questionname') }}</label>

                            <div class="col-md-6">
                                <input id="questionname" type="text" class="form-control @error('questionname') is-invalid @enderror" name="questionname" value="{{ old('questionname') }}" autocomplete="questionname" autofocus>

                                @error('questionname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-warning">Yes, Add</button>
        </div>
      </form>
    </div>
  </div>
</div>








<!-- Modal -->
<div class="modal modal-danger fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Update Confirmation</h4>
      </div>
      <form action="{{route('question_page.update',0)}}" method="post">

        {{ method_field('put')}}
           {{ csrf_field()}}
       
        <div class="modal-body">
        <p class="text-center">
          Are you sure you want to Update data?
        </p>
            <input type="hidden" name="id" id="cat_id" value="">

             <div class="form-group">
              <label for="title1">question name</label>
             <input type="text" class="form-control" id="questionname" name="questionname" maxlength="50" value="" placeholder="question name"> 

          </div>

          
          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-warning">Yes, Update</button>
        </div>
      </form>
    </div>
  </div>
</div>







<!-- Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{route('question_page.destroy',0)}}" method="post">

           {{ method_field('DELETE')}}
           {{ csrf_field()}}
       
        <div class="modal-body">
        <p class="text-center">
          Are you sure you want to delete this?
        </p>
            <input type="hidden" name="id" id="cat_id" value="">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-warning">Yes, Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>




<script type="text/javascript">
  
  $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var cat_id = button.data('catid') 
      var modal = $(this)
      modal.find('.modal-body #cat_id').val(cat_id);
})

  $('#update').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var cat_id = button.data('catid'); 
      var questionname = button.data('questionname');
      var modal = $(this)
      modal.find('.modal-body #cat_id').val(cat_id);
      modal.find('.modal-body #questionname').val(questionname);
})



</script>



 <script type="text/javascript">
       
       $(document).ready(function(){


   $('#questiondata').on('submit', function(event){
  event.preventDefault();
  
  $.ajax({
   url:"{{ route('question_page.store') }}",
   method:"POST",
   data:new FormData(this),
   dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   success:function(data)
   {
  
    if (data.message=="1") {
      location.reload();
    }else{
      alert(data.message);
    }
    
  
   },error:function(){
      alert(data.message);
   }

  });


 });





 });



   </script>



          
      </div>
    </div>




   @include('adminlayouts.admin_js')