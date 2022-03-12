

@include('adminlayouts.admin_css')




  <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
       


          <div class="forms">
        <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
            <div class="form-title">
              <h4>
                
                 
             Update your Profile


              </h4>
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
       

           <form action="{{route('admin_profile_submit')}}" method="post" enctype="multipart/form-data" data-parsley-validate style="padding: 10px;">


           {{ csrf_field()}}

           <br>
         <input type="hidden" name="id" class="form-control" value="{{ $LoggedUserInfo ['id'] }}">

           <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $LoggedUserInfo ['name'] }}" placeholder="Name">

             
           </div>


           <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $LoggedUserInfo ['email'] }}" placeholder="email">
             
           </div>



           <div class="form-group">
            <label>Current Password</label>
            <input type="password" name="currentpassword" class="form-control" placeholder=" Current Password">
             
           </div>


          


           

           




               <input type="submit" name="submit" value="submit" class="btn btn-info">



            </form>

          </div>
      


          
      </div>
    </div>














   @include('adminlayouts.admin_js')