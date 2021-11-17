@extends('template.default')
@section('title')
<title> welocome </title>
@endsection
@section('custom-css')
<link rel="stylesheet"  href="{{url('/')}}/lang/css/welcome.css?cache= <?php echo time();?>">

@endsection
@section('custom-js')
<!-- js -->
<script src="{{url('/')}}/lang/js/welcome.js?cache= <?php echo time();?>"></script>
@endsection
@section('body')
<div class="container bg-white shadow-lg my-">
	<div class="row ">
		<div class="col-md-6 p-0 welcome_image"></div>
		<div class="col-md-6 py-5">
			<div class="branding">
				<h1>was</h1>
				<p>wap erp soultion</p>
			</div>
			<div class="welcome_form p-4 ov-hide">
				<form class="sign-up" autocomplete="off"  action="/api/company" method="post">
					@csrf

					 


					<div class="step-1 ">

						<div class="form-group mb-4 ov-hide">
							<label class="d-none">Company Name</label>
							<input type="text" name="company_name" class="form-control welcome-form-input rounded-0 require company_name"  value="pawan" placeholder="COMPANY NAME">
						</div>

						<div class="form-group mb-4 ov-hide  d-none">
							<label class="d-none">company Name Slug</label>
							<input type="text" name="slug" class="form-control welcome-form-input rounded-0   slug"   placeholder="slig">
						</div>

						<div class="form-group mb-4 ov-hide  d-none">
							<label class="d-none">erp_url</label>
							<input type="text" name="erp_url" class="form-control welcome-form-input rounded-0   erp_url"   placeholder="COMPANY NAME">
						</div>




						<div class="form-group mb-4 ov-hide  d-none">
							<label class="d-none">password</label>
							<input type="password" name="password" class="form-control welcome-form-input rounded-0   password" autocomplete="off"   placeholder="password">
						</div>


						<div class="form-group mb-4 ov-hide">
							<label class="d-none">TEGLINE</label>
							<input type="text" name="tegline" class="form-control welcome-form-input rounded-0 require" placeholder="TEGLINE"  value="pawan" >
						</div>
						<div class="form-group mb-4 ov-hide">
							<label class="d-none">WEBSITE</label>
							<input type="url" name="website" class="form-control welcome-form-input rounded-0 url" placeholder="WEBSITE"  value="https://asgpstracker.com/" >
						</div>
						<div class="form-group mb-4 ov-hide">
							<label class="d-none">EMAIL</label>
							<input type="email" name="company_email" class="form-control welcome-form-input rounded-0 require" placeholder="EMAIL" value="pwn2957@gmail.com">
						</div>
						<div class="form-group mb-4 ov-hide">
							<label class="d-none">FOUNDER</label>
							<input type="text" name="founder" class="form-control welcome-form-input rounded-0 require" placeholder="FOUNDER" value="pwn2957@gmail.com">
						</div>
						<div class="form-group mb-5 ov-hide">
							<label class="d-none">FOUNDER EMAIL</label>
							<input type="email" name="founder_email" class="form-control welcome-form-input rounded-0 require" placeholder="FOUNDER EMAIL" value="pwn2957@gmail.com">
						</div>
						<div class="form-group ">
							<!-- <button type="submit" class="btn  float-left back_button step-1-back">
							<i class="fa fa-angle-double-left"></i> BACK
							</button> -->
							<button type="submit" class="btn  float-right next_button step-1-next">
							NEXT <i class="fa fa-angle-double-right"></i>
							</button>
						</div>
					</div>
					<div class="step-2 d-none">
						<div class="form-group mb-4 ov-hide">
							<label class="d-none">CONTACT NUMBER </label>
							<input type="number" name="contact_number" class="form-control welcome-form-input rounded-0" placeholder="CONTACT NUMBER " value="9971016124">
						</div>
						<div class="form-group mb-4 ov-hide">
							<label class="d-none">STREET ADDRESS</label>
							<input type="text" name="street_address" class="form-control welcome-form-input rounded-0" placeholder="STREET ADDRESS" value="h-1/471 jahangir puri">
						</div>
						<div class="form-group mb-4 ov-hide">
							<label class="d-none">CITY</label>
							<input type="text" name="city" class="form-control welcome-form-input rounded-0" placeholder="CITY" value="delhi">
						</div>
						<div class="form-group mb-4 ov-hide">
							<label class="d-none">STATE</label>
							<input type="text" name="state" class="form-control welcome-form-input rounded-0" placeholder="STATE" value="delhi">
						</div>
						<div class="form-group mb-4 ov-hide">
							<label class="d-none">COUNTRY</label>
							<input type="text" name="country" class="form-control welcome-form-input rounded-0" placeholder="COUNTRY" value="india">
						</div>
						<div class="form-group mb-5 ov-hide">
							<label class="d-none">PIN CODE</label>
							<input type="number" name="pin_code" class="form-control welcome-form-input rounded-0" placeholder="PIN CODE" value="110033">
						</div>
						<div class="form-group ">
							<button type="submit" class="  float-left back_button step-2-back">
							<i class="fa fa-angle-double-left"></i> BACK
							</button>
							<button type="submit" class="btn  float-right next_button step-2-next">
							NEXT <i class="fa fa-angle-double-right"></i>
							</button>
						</div>
					</div>
					<div class="step-3 d-none">
						<div class="form-group mb-4 ov-hide">
							<label class="d-none">GST IN</label>
							<input type="text" name="gst_in" class="form-control welcome-form-input rounded-0" placeholder="GST IN" value="sdfdd">
						</div>
						<div class="form-group mb-4 ov-hide">
							<label class="d-none">OFFICE START AT</label>
							<input type="text" name="office_start" class="form-control welcome-form-input rounded-0" placeholder="TEGLINE" value="10:00">
						</div>
						<div class="form-group mb-4 ov-hide">
							<label class="d-none">OFFICE START END</label>
							<input type="text" name="office_end" class="form-control welcome-form-input rounded-0" placeholder="OFFICE START END" value="7:00">
						</div>
						<div class="form-group mb-4 ov-hide">
							<label class="d-none">ESTABLISH IN</label>
							<input type="date" name="establish" class="form-control welcome-form-input rounded-0" placeholder="ESTABLISH IN"  >
						</div>
						<div class="form-group mb-4 ov-hide">
							<label class="d-none">FACEBOOK PAGE URL</label>
							<input type="url" name="facebook" class="form-control welcome-form-input rounded-0" placeholder="FACEBOOK PAGE URL" value="https://www.facebook.com/">
						</div>
						<div class="form-group mb-5 ov-hide">
							<label class="d-none">TWITTER URL</label>
							<input type="url" name="twitter" class="form-control welcome-form-input rounded-0" placeholder="TWITTER URL" value="https://www.facebook.com/">
						</div>
						<div class="form-group ">
							<button type="submit" class="btn  float-left back_button step-3-back">
							<i class="fa fa-angle-double-left"></i> BACK
							</button>
							<button type="submit" class="btn  float-right next_button step-3-next">
							NEXT <i class="fa fa-angle-double-right"></i>
							</button>
						</div>
					</div>
					<div class="step-4 d-none">
						
						<div class="form-group mb-4 ov-hide">
							<label class="d-none">WHATSAPP NUMBER</label>
							<input type="text" name="whatsapp" class="form-control welcome-form-input rounded-0" placeholder="WHATSAPP NUMBER" value="9971016124"> 
						</div>
						
						<div class="form-group mb-5 ov-hide">
							<label class="d-none">CATEGORY</label>
							<select class="form-control" name="category" >
								<option value="education">education</option>
							</select>
							
						</div>
						<div class="form-group ">
							<button type="submit" class="btn  float-left back_button step-4-back">
							<i class="fa fa-angle-double-left"></i> BACK
							</button>
							<button type="submit" class="btn  float-right submit-btn rounded-0">
							SUBMIT <i class="fa fa-angle-double-right"></i>
							</button>
							
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection