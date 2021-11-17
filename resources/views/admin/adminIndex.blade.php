 

<!DOCTYPE html>
<html>
	<head>
		@yield('title')

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- bootstrap -->

    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
    
		<!-- fa fa icon -->
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet"  href="{{url('/')}}/lang/css/welcome.css?cache= <?php echo time();?>">
		
		<!-- css -->

		<link rel="stylesheet"  href="{{url('/')}}/lang/css/admin/adminIndex.css?cache= <?php echo time();?>">

		<!--Material  -->

		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 

		<!-- animate.css -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
		
		<!-- custom font -->
		<link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">

		@yield('custom-css') 


		<!-- js-->
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		

		
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"  ></script>
		

		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"  ></script>

	@yield('custom-js')

		 
	</head>
	<body token="{{csrf_token()}}"   class="bg-light">



<div class="container-fluid px-0">
	 
		
		<div class="left_side   shodow-sm bg-white ">

			<center>
				
		<span class="material-icons" style="font-size: 60px;">account_circle</span>

		<h5 class="quicksend">Hi ! Admin </h5>


			</center>


			<div class="admin_menu">
				<ul class="navbar-nav">
					<li class="d-flex align-items-center ">
						<span class="material-icons mr-2">group_work</span>

						<a href="/team" class="quicksend">Team Design</a>

					</li>

				</ul>
			</div>


		


		</div>

		<div class=" right_side">
			

		<nav class="navbar navbar-expand-lg py-3  ">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
    
      
    </ul>
   
  </div>
</nav>


<div class="admin_area p-3">

@yield('content')
	
 
</div>






		</div>
		
	</div>
		 
		 
	</body>
</html>
