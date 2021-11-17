<?php 
   session_start();
   ?>
@if(!isset($_SESSION['authentication']))
<script>
   window.location = "/404"; 
   
</script>
@else 
@extends('admin.adminIndex')
@section('title')
<title>WES - Team Design </title>
@endsection 
@section('custom-css')
<link rel="stylesheet" href="{{url('/')}}/lang/css/admin/teamdesign.css?cache=<?php echo time();?>">
@endsection 
@section('custom-js')
<script src="{{url('/')}}/lang/js/admin/admin.js?cache=<?php echo time();?>"></script>
@endsection 
@section('content') 
<div class="container-fluid">
   <div class="row">
      <div class="col-md-5  ">
         <div class="card rounded-0 shadow-sm border-0 mb-4">
            <div class="card-body">
               <p class="quicksend">Setup job role and selary for employees</p>
               <button class="btn erpbg-pink px-3 text-white quicksend d-flex align-items-center mr-2" data-toggle="collapse" data-target="#job_roleShow">
               <span class="material-icons">post_add</span>
               Add Role
               </button>
               <label class="quicksend text-danger show_error_role  d-none">
               <span class="material-icons float-left mr-1">error</span>
               Duplicate Entry
               </label>
               <div class="job-role mt-4 collapse" id="job_roleShow">
                  <div class="job_msg "> </div>
                  <form id="job_role_entry" >
                     @csrf
                     <input class="form-control rounded-0 mb-4 quicksend d-none" name="id" value="0" placeholder="Enter The Job Role" type="text" style="width: 300px;"/>
                     <input class="form-control rounded-0 mb-4 quicksend" name="job_role" placeholder="Enter The Job Role" type="text" style="width: 300px;"/>
                     <input class="form-control rounded-0 mb-4 quicksend" name="sallery" placeholder="Enter The sallery" type="number" style="width: 300px;"/>
                     <input class="form-control rounded-0 mb-4 quicksend" name="experience" placeholder="Experience In Number" type="number" style="width: 300px;"/>
                     <input class="form-control rounded-0 mb-4 quicksend" name="certification" placeholder="certification" type="text" style="width: 300px;"/>
                     <input class="form-control rounded-0 mb-4 quicksend" name="qualification" placeholder="qualification" type="text" style="width: 300px;"/>
                     <select class="form-control rounded-0 mb-4 quicksend" name="part_of_team" id="part_of_team"  style="width: 300px;"/>
                        <option value="no team">Part Of Any Team </option>
                     </select>
                     <button class="btn erpbg-pink px-3 text-white quicksend d-flex align-items-center mr-2" id="btn_role" role='insert' type="submit"> Set Role </button>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- //////////// -->
      <div class="col-md-7 ">
         <div class="card rounded-0 shadow-sm border-0 mb-4">
            <div class="card-body">
               <p class="quicksend">Setup Employee role</p>
               <button class="btn erpbg-primary px-3 text-white quicksend d-flex align-items-center mr-2" data-toggle="collapse" data-target="#add_employee"> 
               <span class="material-icons"> badge </span> 
               Add Employee
               </button> 
               <label class="quicksend text-danger show_error_add_role  d-none">
               <span class="material-icons float-left mr-1">error</span>
               Duplicate Entry
               </label>
               <div class="job-role mt-4 collapse" id="add_employee">
                  <div class="emp_msg "> </div>
                  <form id="employee_entry" action="/api/employee" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="row px-3">
                        <div class="col-sm-2 px-0" >
                           <img src="{{url('/')}}/lang/assets/images/avtar.jpg" name="image" class="w-100 p-0  border-danger" style="height: 100px;"   >
                           <input type="file" accept="image/*" name="profile_picture" class="form-control rounded-0 h-100 border-danger" title="Upload Image" style="position:absolute; z-index: 9999; top:0;  opacity: 0" required >
                        </div>
                        <div class="col-sm-10 pr-0">
                           <input type="text" name="employee_name" class="form-control rounded-0 mb-3" placeholder="Employee Name" required>
                           <input type="email" name="employee_mail" class="form-control rounded-0 mb-3" placeholder="Employee Email" required>
                        </div>
                     </div>
                     <div class="row px-3">
                        <div class="col-md-12 px-0">
                           <select name="emp_job_role" class="form-control rounded-0 mb-3 emp_job_role" required>
                              <option class="form-control" selary="0">Select Job Role</option>
                           </select>
                           <input type="hidden" name="emp_sallery" id="emp_sallery" class="form-control rounded-0 mb-3" value="0" required>
                        </div>
                     </div>
                     <div class="row px-3">
                        <div class="col-md-6 px-0">
                           <div class="form-group mb-3">                
                              <label class="quicksend">Residential Proof</label>
                              <input type="file" accept="image/*" name="residential_proof" class="form-control rounded-0" required>
                           </div>
                        </div>
                        <div class="col-md-6 pr-0">
                           <div class="form-group mb-3">
                              <label class="quicksend">Qualification Proof</label>
                              <input type="file" accept="image/*" name="qualification_proof" class="form-control rounded-0" required>
                           </div>
                        </div>
                     </div>
                     <div class="row px-3">
                        <div class="col-md-6 px-0">
                           <div class="form-group mb-3">                
                              <label class="quicksend">Certification Proof</label>
                              <input type="file" accept="image/*" name="Certification_proof" class="form-control rounded-0" required>
                           </div>
                        </div>
                        <div class="col-md-6 pr-0">
                           <div class="form-group mb-3">
                              <label class="quicksend">Primary Contect</label>
                              <input type="text" name="primary_contect" class="form-control rounded-0" required>
                           </div>
                        </div>
                     </div>
                     <div class="row px-3">
                        <div class="col-md-6 px-0">
                           <div class="form-group mb-3">                
                              <label class="quicksend">Secoundry Contect</label>
                              <input type="text" name="secoundry_contect" class="form-control rounded-0" required>
                           </div>
                        </div>
                        <div class="col-md-6 pr-0">
                           <div class="form-group mb-3">
                              <label class="quicksend">DOB</label>
                              <input type="date" name="dob" class="form-control rounded-0" required>
                           </div>
                        </div>
                     </div>
                     <div class="row px-3">
                        <div class="col-md-3 px-0">
                           <label class="quicksend">Gender</label>
                           <select class="form-control mb-3 rounded-0" name="gender" required>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Other">Other</option>
                           </select>
                        </div>
                        <div class="col-md-9 pr-0">
                           <div class="form-group mb-3">
                              <label class="quicksend">Street Address</label>
                              <input type="text" name="street_address" class="form-control rounded-0" required>
                           </div>
                        </div>
                     </div>
                     <div class="row px-3">
                        <div class="col-md-6 px-0">
                           <div class="form-group mb-3">
                              <label class="quicksend">City</label>
                              <input type="text" name="city" class="form-control rounded-0" required>
                           </div>
                        </div>
                        <div class="col-md-6 pr-0">
                           <div class="form-group mb-3">
                              <label class="quicksend">Pincode</label>
                              <input type="text" name="pincode" class="form-control rounded-0" required>
                           </div>
                        </div>
                     </div>
                     <div class="row px-3">
                        <div class="col-md-6 px-0">
                           <div class="form-group mb-3">
                              <label class="quicksend">State</label>
                              <input type="text" name="state" class="form-control rounded-0" required>
                           </div>
                        </div>
                        <div class="col-md-6 pr-0">
                           <div class="form-group mb-3">
                              <label class="quicksend">Country</label>
                              <input type="text" name="country" class="form-control rounded-0" required>
                           </div>
                        </div>
                        <div class="col-md-12 px-0">
                           <div class="form-group mb-3">
                              <input type="checkbox" name="agree" class="agree" data-toggle="collapse" data-target="#agree-form" id="agree_checkbox" >
                              <label class="quicksend" for="agree_checkbox">Have You experience.</label>
                           </div>
                        </div>
                     </div>
                     <div class="row px-3 collapse" id="agree-form">
                        <div class="col-md-6 px-0">
                           <div class="form-group mb-3">
                              <label class="quicksend">Company Name</label>
                              <input type="text" name="company_name" class="form-control rounded-0">
                           </div>
                        </div>
                        <div class="col-md-6 pr-0">
                           <div class="form-group mb-3">
                              <label class="quicksend">Experience</label>
                              <input type="text" name="Experience" class="form-control rounded-0">
                           </div>
                        </div>
                        <div class="col-md-6 px-0">
                           <div class="form-group mb-3">
                              <label class="quicksend">Salery</label>
                              <input type="text" name="salary" class="form-control rounded-0">
                           </div>
                        </div>
                        <div class="col-md-6 pr-0">
                           <div class="form-group mb-3">
                              <label class="quicksend">4 Copies Of Salary</label>
                              <input type="file" accept="image/*" name="salery_slip[]" class="form-control rounded-0" multiple="multiple">
                           </div>
                        </div>
                     </div>
                     <button class="btn erpbg-primary px-3 text-white quicksend d-flex align-items-center mr-2" id="btn_role" role='insert' type="submit"> Submit </button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- !-- team show coding is here --  -->
<div class="container-fluid">
   <div class="row">
      <div class="col-md-5" >
         <div class="card rounded-0 shadow-sm border-0 mb-4" >
            <div class="card-body " >
               <h6 class="quicksend font-weight-bold d-flex justify-content-between my-3"> Teams         
                  <span class="badge badge-primary  team_total">Total - 0</span>
               </h6>
               <div class=" team_loader    align-items-center  d-none" style="height:435px;" >
                  <div class="loader"></div>
               </div>
               <div class="team_msg "> </div>
               <div class="team_load  " style="height:435px;" ></div>
               <div class="paginating_data d-flex justify-content-center "></div>
            </div>
         </div>
      </div>
      <div class="col-md-7" >
         <div class="card rounded-0 shadow-sm border-0 mb-4" >
            <div class="card-body " >
               <h6 class="quicksend font-weight-bold d-flex justify-content-between my-3"> 
                  JOB ROLE         
                  <span class="badge badge-primary  job_total">Total - 0</span>
               </h6>
               <div class="job_loader    align-items-center  d-none" style="height:435px;" >
                  <div class="loader"></div>
               </div>
               <div class="jobrole_msg "> </div>
               <div class="job_load  " style="height:435px;" ></div>
               <div class="paginatingjob_data d-flex justify-content-center "></div>
            </div>
         </div>
      </div>
   </div>
</div>


 
<!-- !-- employee show coding is here --  -->
<div class="container-fluid">
   <div class="row">
      <div class="col-md-8" >
         <div class="card rounded-0 shadow-sm border-0 mb-4" >
            <div class="card-body " >
               <h6 class="quicksend font-weight-bold d-flex justify-content-between my-3"> EMPLOYEE  
                
                <div class="d-flex">
                  <button class="btn border p-0 mr-1 rounded-0 d-flex justify-content-center align-items-center" style="width:20px; height:20px;">
                         <span class="material-icons">arrow_left</span>
                  </button>
                  <button class="btn border p-0 rounded-0 d-flex justify-content-center align-items-center" style="width:20px; height:20px;">
                         <span class="material-icons">arrow_right</span>
                  </button>

                   

                </div>


               </h6>


               <div id="show-employee">
                  <div class="active">
                        <div class="row">
                          
                        </div>
                  </div>                 
               </div>
         

     
        
                  
               <div class=" team_loader    align-items-center  d-none" style="height:435px;" >
                  <div class="loader"></div>
               </div>
               <div class="team_msg "> </div>
               <div class="team_load  " style="height:435px;" ></div>
               <div class="paginating_data d-flex justify-content-center "></div>
            </div>
         </div>
      </div>
      <!-- <div class="col-md-4" >
         <div class="card rounded-0 shadow-sm border-0 mb-4" >
            <div class="card-body " >
               <h6 class="quicksend font-weight-bold d-flex justify-content-between my-3"> 
                  JOB ROLE         
                  <span class="badge badge-primary  job_total">Total - 0</span>
               </h6>
               <div class="job_loader    align-items-center  d-none" style="height:435px;" >
                  <div class="loader"></div>
               </div>
               <div class="jobrole_msg "> </div>
               <div class="job_load  " style="height:435px;" ></div>
               <div class="paginatingjob_data d-flex justify-content-center "></div>
            </div>
         </div></div> -->
   </div>
</div>














<!--modal icon codding is here  -->
<a  href="#CreateTeamModal" data-toggle="modal">
<span class="material-icons create-team-icon">
add_circle
</span>
</a>
<div class="modal fade" id="CreateTeamModal">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <!-- Modal Header  -->
         <div class="modal-header erpbg-pink  ">
            <h5 class="modal-title quicksend font-weight-bolder">Create Team</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body  -->
         <div class="modal-body quicksend" style="letter-spacing: 1px;">
            Manage Your employees group by creating a team such as service team, backend team and many more.
            <form class="create_team"   >
               @csrf
               <label class="quicksend text-danger show_error_team d-none">
               <span class="material-icons float-left mr-1">error</span>
               Duplicate Entry
               </label>
               <input name="team_name" type="text" class="form-control team_name my-4" placeholder="Enter The Name" required>
               <input name="team_creator" type="hidden" class="form-control team_creator my-4"  value="{{ $_SESSION['team_role'] }}" readonly required>
               <input name="team_role" type="hidden" class="form-control team_role my-4"  value="{{ $_SESSION['email'] }}" readonly required>
               <textarea  name="discription" class="form-control mb-4 discription" placeholder="Please enter some thing" required></textarea>
               <button class="btn erpbg-pink float-right text-white">Create</button>
            </form>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
@endsection
@endif