<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student’s Feedback Evaluation</title>
    <meta name="keywords" content="" />
    <meta name="description" content="">
     <link rel="shortcut icon" href="Deshboard">
    <link rel="shortcut icon" href="" type="">
  

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="{{asset('admin/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="{{asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="{{asset('admin/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('admin/js/modernizr.custom.js')}}"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="{{asset('admin/css/animate.css')}}" rel="stylesheet" type="text/css" media="all">
<script src="{{asset('admin/js/wow.min.js')}}"></script>
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->


	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- chart -->
<script src="{{asset('admin/js/Chart.js')}}"></script>
<!-- //chart -->
<!--Calender-->
<link rel="stylesheet" href="{{asset('admin/css/clndr.css')}}" type="text/css" />
<script src="{{asset('admin/js/underscore-min.js')}}" type="text/javascript"></script>
<script src= "{{asset('admin/js/moment-2.2.1.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/js/clndr.js')}}" type="text/javascript"></script>

<!--End Calender-->

<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<!-- Metis Menu -->
<script src="{{asset('admin/js/metisMenu.min.js')}}"></script>
<script src="{{asset('admin/js/custom.js')}}"></script>
<link href="{{asset('admin/css/custom.css')}}" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
			<div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
					<ul class="nav" id="side-menu" style="height: 100%;
    position: relative;
    overflow-y: scroll;padding-bottom: 80px;">



						<li>
							<a href="{{route('admin_dashboard')}}"><i class="fa fa-home nav_icon"></i>Dashboard</a>
						</li>
						
						<li>
							<a href="{{route('view_admin')}}"><i class="fa fa-user-md nav_icon"></i>View All Admin</a>
						</li>


						<li>
							<a href="{{route('faculty_page.index')}}"><i class="fa fa-user nav_icon"></i>Faculty Page</a>
						</li>


						<li>
							<a href="{{route('course_page.index')}}"><i class="fa fa-book nav_icon"></i>Course Page</a>
						</li>

							<li>
							<a href="{{route('shift_page.index')}}"><i class="fa fa-heart nav_icon"></i>Shift Page</a>
						</li>


						<li>
							<a href="{{route('batch_page.index')}}"><i class="fa fa-star nav_icon"></i>Batch Page</a>
						</li>
						
                         <li>
							<a href="{{route('question_page.index')}}"><i class="fa fa-gear nav_icon"></i>Question Page</a>
						</li>

						 <li>
							<a href="{{route('teacher_page.index')}}"><i class="fa fa-tag nav_icon"></i>Teacher Page</a>
						</li>
						
 						<li>
							<a href="{{route('student_page.index')}}"><i class="fa fa-road nav_icon"></i>Student Page</a>
						</li>


						<li>
							<a href="{{route('assign_teacher_page.index')}}"><i class="fa fa-pencil nav_icon"></i>Assign Teacher Page</a>
						</li>


						<li>
							<a href="{{route('admin_report')}}"><i class="fa fa-signal nav_icon"></i>Report</a>
						</li>
						

						<li>
							<a href="{{route('all_question_report')}}"><i class="fa fa-bookmark nav_icon"></i>Question Report</a>
						</li>
						



						


					</ul>
					<!-- //sidebar-collapse -->
				</nav>
			</div>
		</div>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
					<a href="{{route('admin_dashboard')}}">
						<h1>My</h1>
						<span>AdminPanel</span>
					</a>
				</div>
				<!--//logo-->
				<!--search-box-->
				<div class="search-box">
					<form class="input">
						<input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
						<label class="input__label" for="input-31">
							<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
								<path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
							</svg>
						</label>
					</form>
				</div><!--//end-search-box-->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				

				<!--notification menu end -->
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img src="images/a.png" alt=""> </span> 
									<div class="user-name">
										<p>{{ $data->name; }}</p>
										<span>Administrator</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="{{route('admin_profile')}}"><i class="fa fa-user"></i> Profile</a> </li> 
							<li> <a href="{{ route('admin_logout') }}" <i class="fa fa-cog"></i> 
                                        {{ __('Logout') }}  </a> </li> 


								
								
							</ul>
						</li>
					</ul>
				</div>

			
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->