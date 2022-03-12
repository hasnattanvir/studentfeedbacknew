

@include('adminlayouts.admin_css')




  <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
        <div class="forms">

            <button class="btn btn-info" type="button" data-toggle="modal" data-target="#addteacher"> Add Teacher</button>
     
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
          
    
          
    <div class="table-responsive">
      <table id="customers">
    <thead>
      <tr>
         <th>Serial</th>
         <th>Name</th>
         <th>faculty</th>
          <th>Email</th>
          <th>Status</th>
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
                  <td>{{$user->name}}</td>
                  <td>{{$user->fname}}</td>
                  <td>{{$user->email}}</td>
                  <td><?php 
                      if($user->status=="1"){
                        echo " <span style='color:green;'> Approved <span>";
                      }else{
                          echo " <span style='color:red;'> Pending <span>";
                      }

                   ?></td> 

                  
                  <td><button type="button" class="btn btn-info" data-catid="{{$user->id}}" data-status="{{$user->status}}" data-name="{{$user->name}}" data-faculty="{{$user->fid}}" data-email="{{$user->email}}" data-toggle="modal" data-target="#update"><i class="far fa-trash-alt"></i> Update</button> || <button type="button" class="btn btn-danger" data-catid="{{$user->id}}" data-toggle="modal" data-target="#delete"><i class="far fa-trash-alt"></i> DELETE</button></td>
                
                  
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
<div class="modal modal-danger fade" id="addteacher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Teacher Add Dialogue</h4>
      </div>
      <form id="addteacherdata" method="post" enctype="multipart/form-data" data-parsley-validate>

        
           {{ csrf_field()}}
       
        <div class="modal-body">
        <p class="text-center">
          Add Teacher
        </p>
            

             <div class="form-group">
              <label for="title1">Name</label>
             <input type="text" class="form-control" id="name" name="name" value="" placeholder="Name"> 

             </div>



             <div class="form-group">
              <label for="title1">faculty</label>
             <select name="faculty" class="form-control">
              <option value="">Select faculty</option>
              @foreach($facultydata as $facul)

              <option value="{{$facul->id}}">{{$facul->name}}</option>
               

               @endforeach
             </select> 

             </div>

           <div class="form-group">
              <label for="title1">Email</label>
             <input type="email" class="form-control" id="email" name="email" value="" placeholder="Email"> 

          </div>

           <div class="form-group">
              <label for="title1">Password</label>
             <input type="password" class="form-control" id="password" name="password" maxlength="12" value="" placeholder="password"> 

          </div>
           <div class="form-group">
              <label for="title1">Confirm Password</label>
             <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" maxlength="50" value="" placeholder="Confirm Password"> 

          </div>

       

          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-warning">Add</button>
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
      <form action="{{route('teacher_page.update',0)}}" method="post">

         {{ method_field('put')}}
           {{ csrf_field()}}
       
        <div class="modal-body">
        <p class="text-center">
          Are you sure you want to Update data?
        </p>
            <input type="hidden" name="id" id="cat_id" value="">

             <div class="form-group">
              <label for="title1">Name</label>
             <input type="text" class="form-control" id="name" name="name" maxlength="50" value="" placeholder="Name"> 

          </div>

           <div class="form-group">
              <label for="title1">faculty</label>
             <select name="faculty" id="faculty" class="form-control">
              <option value="">Select faculty</option>
              @foreach($facultydata as $facul)

              <option value="{{$facul->id}}">{{$facul->name}}</option>
               

               @endforeach
             </select> 

          </div>

           <div class="form-group">
              <label for="title1">Email</label>
             <input type="text" class="form-control" id="email" name="email" maxlength="50" value="" placeholder="Email"> 

          </div>

           <div class="form-group">
              <label for="title1">Status</label>
             <select name="status" id="status" class="form-control">
              <option value="0">Pending</option>
              <option value="1">Approved</option>
               
             </select>

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
      <form action="{{route('teacher_page.destroy',0)}}" method="post">

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
      var name = button.data('name');
      var faculty = button.data('faculty');
      var email = button.data('email'); 
      var status = button.data('status'); 
      var modal = $(this)
      modal.find('.modal-body #cat_id').val(cat_id);
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #faculty').val(faculty);
      modal.find('.modal-body #email').val(email);
      modal.find('.modal-body #status').val(status);
})



</script>



<script type="text/javascript">
       
       $(document).ready(function(){


   $('#addteacherdata').on('submit', function(event){
  event.preventDefault();
  
  $.ajax({
   url:"{{ route('teacher_page.store') }}",
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