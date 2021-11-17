@extends('template.default')


@section('title')
<title> 
	congrats

 </title>
@endsection


@section('custom-css')
<link rel="stylesheet"  href="../lang/css/congrats.css?cache= <?php echo time();?>">
<!-- animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection

@section('custom-js')
<!-- js -->
<!-- <script src="lang/js/welcome.js?cache= <?php echo time();?>"></script> -->
@endsection

@section('body')

 <div class="page">
 	<i class="text-success fa fa-check-circle icon"></i>
 	 <h1 class="text-success font_one"> Awesome !</h1>
 	 <p class="font_one">We have Sent url and password on your email </p>
 </div>
 


@endsection