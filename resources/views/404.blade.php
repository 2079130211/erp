@extends('template.default')
@section('title')
<title> 
	404
 </title>
@endsection
@section('custom-css')
<link rel="stylesheet"  href="{{url('/')}}/lang/css/congrats.css?cache= <?php echo time();?>">
<!-- animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection
@section('custom-js')
<!-- js -->
<!-- <script src="lang/js/welcome.js?cache= <?php echo time();?>"></script> -->
@endsection
@section('body')
 <div class="page">
<h1 class="text-danger font_one">  404 </h1>
<h3 class="text-danger font_one">!  ERROR </h3>
<h5 class="text-danger font_one"> NOT FOUND </h3>
</div>
@endsection