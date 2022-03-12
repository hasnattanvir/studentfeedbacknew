

@include('adminlayouts.admin_css')




  <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
        <div class="forms">

            <button class="btn btn-info" type="button" data-toggle="modal" data-target="#addstudent"> Add student</button>
     
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
          
   <br>
 
          
    <div class="table-responsive">
      <table id="customers">
    <thead>
      <tr>
         <th>Serial</th>
         <th>Name</th>
         <th>Roll</th>
         <th>Registration</th>
         <th>Faculty</th>
         <th>department</th>
         <th>batch</th>
         <th>phone</th>
         <th>shift</th>
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
                  <td>{{$user->roll}}</td>
                  <td>{{$user->regi}}</td>
                  <td>{{$user->fname}}</td>
                  <td>{{$user->department}}</td>
                  <td>{{$user->batch}}</td>
                  <td>{{$user->phone}}</td>
                  <td>{{$user->shift}}</td>
                  <td><?php 
                      if($user->status=="1"){
                        echo " <span style='color:green;'> Approved <span>";
                      }else{
                          echo " <span style='color:red;'> Pending <span>";
                      }

                   ?></td> 

                  
                  <td><button type="button" class="btn btn-info" data-catid="{{$user->id}}" data-status="{{$user->status}}" data-name="{{$user->name}}" data-faculty="{{$user->fid}}" data-roll="{{$user->roll}}" data-regi="{{$user->regi}}" data-department="{{$user->department}}" data-batch="{{$user->batch}}" data-phone="{{$user->phone}}" data-shift="{{$user->shift}}" data-toggle="modal" data-target="#update"><i class="far fa-trash-alt"></i> Update</button> || <button type="button" class="btn btn-danger" data-catid="{{$user->id}}" data-toggle="modal" data-target="#delete"><i class="far fa-trash-alt"></i> DELETE</button></td>
                
                  
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
<div class="modal modal-danger fade" id="addstudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">student Add Dialogue</h4>
      </div>
      <form id="addstudentdata" method="post" enctype="multipart/form-data" data-parsley-validate>

        
           {{ csrf_field()}}
       
        <div class="modal-body">
        <p class="text-center">
          Add student
        </p>
            

             <div class="form-group">
              <label for="title1">Name</label>
             <input type="text" class="form-control" id="name" name="name" value="" placeholder="Name"> 

             </div>


             <div class="form-group">
              <label for="title1">Roll</label>
             <input type="text" class="form-control" id="roll" name="roll" value="" placeholder="Roll"> 

             </div>

             <div class="form-group">
              <label for="title1">Registration</label>
             <input type="text" class="form-control" id="regi" name="regi" value="" placeholder="Registration"> 

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
              <label for="title1">Department</label>
             <input type="text" class="form-control" id="department" name="department" value="" placeholder="Department"> 

             </div>  


             <div class="form-group">
              <label for="title1">Batch</label>
             <select name="batch" class="form-control">
              <option value="">Select Batch</option>
              @foreach($batchdata as $bat)

              <option value="{{$bat->batchname}}">{{$bat->batchname}}</option>
               

               @endforeach
             </select>  

             </div>

              <div class="form-group">
              <label for="title1">phone</label>
             <input type="text" class="form-control" id="phone" name="phone" value="" placeholder="phone"> 

             </div> 

              <div class="form-group">
              <label for="title1">shift</label>
             <select name="shift" class="form-control">
              <option value="">Select shift</option>
              @foreach($shiftdata as $shif)

              <option value="{{$shif->shiftname}}">{{$shif->shiftname}}</option>
               

               @endforeach
             </select> 

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
      <form action="{{route('student_page.update',0)}}" method="post">

         {{ method_field('put')}}
           {{ csrf_field()}}
       
        <div class="modal-body">
        <p class="text-center">
          Are you sure you want to Update data?
        </p>
            <input type="hidden" name="id" id="cat_id" value="">

              <div class="form-group">
              <label for="title1">Name</label>
             <input type="text" class="form-control" id="name" name="name" value="" placeholder="Name"> 

             </div>


             <div class="form-group">
              <label for="title1">Roll</label>
             <input type="text" class="form-control" id="roll" name="roll" value="" placeholder="Roll"> 

             </div>

             <div class="form-group">
              <label for="title1">Registration</label>
             <input type="text" class="form-control" id="regi" name="regi" value="" placeholder="Registration"> 

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
              <label for="title1">Department</label>
             <input type="text" class="form-control" id="department" name="department" value="" placeholder="Department"> 

             </div>  


             <div class="form-group">
              <label for="title1">Batch</label>
             <select name="batch" id="batch" class="form-control">
              <option value="">Select Batch</option>
              @foreach($batchdata as $bat)

              <option value="{{$bat->batchname}}">{{$bat->batchname}}</option>
               

               @endforeach
             </select>  

             </div>

              <div class="form-group">
              <label for="title1">phone</label>
             <input type="text" class="form-control" id="phone" name="phone" value="" placeholder="phone"> 

             </div> 

              <div class="form-group">
              <label for="title1">shift</label>
             <select name="shift" id="shift" class="form-control">
              <option value="">Select Batch</option>
              @foreach($shiftdata as $shif)

              <option value="{{$shif->shiftname}}">{{$shif->shiftname}}</option>
               

               @endforeach
             </select> 

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
      <form action="{{route('student_page.destroy',0)}}" method="post">

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
      var roll = button.data('roll'); 
      var regi = button.data('regi'); 
      var department = button.data('department'); 
      var batch = button.data('batch'); 
      var phone = button.data('phone'); 
      var shift = button.data('shift'); 
      var status = button.data('status'); 
      var modal = $(this)
      modal.find('.modal-body #cat_id').val(cat_id);
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #faculty').val(faculty);
      modal.find('.modal-body #roll').val(roll);
      modal.find('.modal-body #regi').val(regi);
      modal.find('.modal-body #department').val(department);
      modal.find('.modal-body #batch').val(batch);
      modal.find('.modal-body #phone').val(phone);
      modal.find('.modal-body #shift').val(shift);
      modal.find('.modal-body #status').val(status);
})



</script>



<script type="text/javascript">
       
       $(document).ready(function(){


   $('#addstudentdata').on('submit', function(event){
  event.preventDefault();
  
  $.ajax({
   url:"{{ route('student_page.store') }}",
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