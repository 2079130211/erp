

 


@if(isset($_SESSION['authentication']))
<script>
 window.location = "/admin"; 

</script>

@else 


@extends("../template.default")

 

@section('title')
<title>  WAS ERP SOLUTIONS </title>
@endsection


@section("custom-css")
    <link rel="stylesheet" href="{{url('/')}}/lang/css/authenticate/authenticate.css?cache=<?php echo time();?>">
@endsection


@section("custom-js")
<script src="{{url('/')}}/lang/js/erp/erp.js?cache=<?php echo time();?>""></script>
    
@endsection


@section("body")
    <div class="page py-4">
 

 

@if(session()->get('mac_authentication') == 'not register') 


   
        <div class="branding">
            <h1 class="text-white text-center">WES</h1>
            <p class="text-white text-center">WAP ERP SOLUTIONS</p>
        </div>  
    <div class="px-4">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#admin" data-toggle="tab">ADMIN</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="#employee" data-toggle="tab">EMPLOYEE</a>
        </li>

      </ul>

      <div class="tab-content py-4">

        <div id="admin" class="active tab-pane">


               <div class="alert alert-warning">                
                <p> 
                    <i class="fa fa-warning text-dark"></i>
                Register admin panel from Your Personal Pc. Once you Register, you will only access you admin panel from this pc.
        <i class="fa fa-times-circle close m-2 text-danger
        " data-dismiss="alert"></i>
                </p>
                </div>


            <form class="admin-form" slug="{{session()->get('authentication')}}"  action="/api/company" method="put">
                @csrf
                <div class="form-group">
                    <label>COMPANY ESTD</label>
                    <input type="date" class="form-control border-0 rounded-0 company_estd" name="company_estd">
                </div>

                <div class="form-group">
                    <label>PASSWORD</label>
                    <input type="password" class="form-control border-0 rounded-0 company_password" name="password" placeholder="******">
                </div>

                <div class="form-group mt-4">

                    <button class="btn btn-danger rounded-0 float-left">
                    <i class="fa fa-sign-in"></i>
                    REGISTER THIS PC
                    </button>

                    <div class="preloader">
                        <div class="spinner"></div>
                        <div class="spinner-2"></div>
                    </div>
                </div>
            </form>




        </div>

        <div id="employee" class="tab-pane fade">
            <form class="employee-form">
                <div class="form-group">
                    <label>USERNAME</label>
                    <input type="email" class="form-control border-0 rounded-0" name="username" placeholder="employee@wes.com">
                </div>

                <div class="form-group">
                    <label>PASSWORD</label>
                    <input type="password" class="form-control border-0 rounded-0" name="password" placeholder="******">
                </div>

                <div class="form-group mt-4">
                    <button class="btn btn-danger rounded-0 float-left">
                    <i class="fa fa-sign-in"></i>
                    LOGIN
                    </button>

                    <div class="preloader">
                        <div class="spinner"></div>
                        <div class="spinner-2"></div>
                    </div>

                </div>
            </form>



        </div>
 </div>
    </div>
    

      
@endif


@if(session()->get('mac_authentication') == 'employee') 
  <div class="page py-4">
  

        <div class="branding">
            <h1 class="text-white text-center">WES</h1>
            <p class="text-white text-center">WAP ERP SOLUTIONS</p>
        </div>  
    <div class="px-4">
      <ul class="nav nav-tabs">
       
        <li class="nav-item">
          <a class="nav-link active" href="#employee" data-toggle="tab">EMPLOYEE</a>
        </li>

      </ul>

      <div class="tab-content py-4">
 

        <div id="employee" class="tab-pane   active  ">
            <form class="employee-form">
                <div class="form-group">
                    <label>USERNAME</label>
                    <input type="email" class="form-control border-0 rounded-0" name="username" placeholder="employee@wes.com">
                </div>

                <div class="form-group">
                    <label>PASSWORD</label>
                    <input type="password" class="form-control border-0 rounded-0" name="password" placeholder="******">
                </div>

                <div class="form-group mt-4">
                    <button class="btn btn-danger rounded-0 float-left">
                    <i class="fa fa-sign-in"></i>
                    LOGIN
                    </button>

                    <div class="preloader">
                        <div class="spinner"></div>
                        <div class="spinner-2"></div>
                    </div>

                </div>
            </form>
        </div>
 </div>
    </div>
    
 
@endif


@if(session()->get('mac_authentication') == 'admin') 
 

        <div class="branding">
            <h1 class="text-white text-center">WES</h1>
            <p class="text-white text-center">WAP ERP SOLUTIONS</p>
        </div>  
    <div class="px-4">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#admin" data-toggle="tab">ADMIN</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="#employee" data-toggle="tab">EMPLOYEE</a>
        </li>

      </ul>

      <div class="tab-content py-4">
        <div id="admin" class="active tab-pane">  
            <form class="admin-form" slug="{{session()->get('authentication')}}"  action="/api/company" method="put">
                @csrf
                <div class="form-group">
                    <label>COMPANY ESTD</label>
                    <input type="date" class="form-control border-0 rounded-0 company_estd" name="company_estd"  >
                </div>

                <div class="form-group">
                    <label>PASSWORD</label>
                    <input type="password" class="form-control border-0 rounded-0 company_password" name="password" placeholder="******" value="547n@x^5">
                </div>

                <div class="form-group mt-4">

                    <button class="btn btn-danger rounded-0 float-left">
                    <i class="fa fa-sign-in"></i>
                    Login
                    </button>

                    <div class="preloader">
                        <div class="spinner"></div>
                        <div class="spinner-2"></div>
                    </div>
                </div>
            </form>             
        </div>

        <div id="employee" class="tab-pane fade">
            <form class="employee-form">
                <div class="form-group">
                    <label>USERNAME</label>
                    <input type="email" class="form-control border-0 rounded-0" name="username" placeholder="employee@wes.com">
                </div>

                <div class="form-group">
                    <label>PASSWORD</label>
                    <input type="password" class="form-control border-0 rounded-0" name="password" placeholder="******">
                </div>

                <div class="form-group mt-4">
                    <button class="btn btn-danger rounded-0 float-left">
                    <i class="fa fa-sign-in"></i>
                    LOGIN
                    </button>

                    <div class="preloader">
                        <div class="spinner"></div>
                        <div class="spinner-2"></div>
                    </div>

                </div>
            </form>
        </div>

 </div>
    </div>
    
      
@endif


<div class="msg text-white "> </div>
 
</div>




   
@endsection



@endif
