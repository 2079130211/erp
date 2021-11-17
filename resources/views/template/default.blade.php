<!DOCTYPE html>
<html>
	<head>
		@yield('title')

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
    
      
		<!-- fa fa icon -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		

		@yield('custom-css')
		<!-- animate.css -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
		
		<!-- custom font -->
		<link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
		<!-- js-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"  ></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"  ></script>
		@yield('custom-js')
	</head>
	<body token="{{csrf_token()}}"  >
		 
		@yield('body')
	</body>
</html>