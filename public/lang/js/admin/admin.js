window.onload = function(){
	Show_teams("1","first");
}
// show team function
function Show_teams(url,type){

	$.ajax({
				type:"get",
				url:"/api/team?page="+url,
				data:{
				_token:$("body").attr("token"),	
				data_type:"paginate",
				limit:3			
				},
				
				beforeSend:function(){

					 $(".team_load").html('');
					 $(".team_loader").removeClass("d-none ");

					 $(".team_loader").addClass("d-flex");


				},
				
				success:function(r){


				$(".team_loader").addClass("d-none");

				 $(".team_loader").removeClass("d-flex");


					 
						var color = ['erpbg-pink','erpbg-primary', 'erpbg-success','erpbg-info', 'erpbg-secoundry'];

						var index ;

						var start = r.data.from;

						var end = r.data.last_page;


				 		$(".team_total").html("Total - "+r.data.total);

				 		var li = '';

				 		var active = '';

				 		var  ul = document.createElement("UL");
						
						ul.className = "pagination";

								    for(i=1; i<=end; i++){

								    		if(i == url)
								    		{
								    				active = 'active';
								    		}
								    		else{
								    				active = '';
								    		}
									li = '<li class="page-item '+active+'" link="/api/team?page='+i+'"><a class="page-link pagi_link  " href="'+i+'">'+i+'</a></li>';

								$(ul).append(li); 
								}
								 
								if($(".paginating_data").html() == '' || i !=end  ){

									$(".paginating_data").html(ul); 
								}

									 $(".pagi_link").each(function(e){	 
									 	this.onclick = function(e){	 

											e.preventDefault();
										 	Show_teams($(this).attr("href"),''); 

													}
									 	 });

										var card_design = '';

										$(".team_load").html('');
										
										r.data.data.forEach(function(data){
										index = Math.floor(Math.random() * 5);
										card_design = 	 `  <div class="card  my-4 border-0">
										  <div class="card-header text-white `+color[index]+`">
										    `+data.team_name+`
										  </div>
										  <div class="card-body ">   
										    <p class="card-text"> `+data.discription+`.</p>
										    
										  </div>
										   
										</div>`;


							$(".team_load").append(card_design);


							
   

						}); 
											if(type == 'first'){
											Show_jobs("1");
										}


					},
        error:function(x,xhr,error){

        	if(x.status == 404)
        	{

        			msg("team_msg", "! No Team Created Yet Please Create Team","bg-danger");   
        	}

           
            	           

           

            

        
        }
			}); 
}

// create team function 
$(document).ready(function(){
	$(".create_team").submit(function(e){
		e.preventDefault();
			$.ajax({
				type:"post",
				url:"/api/team",
				data:{
				_token:$("body").attr("token"),	
				team_name:$(".team_name").val(),
				team_creator:$(".team_creator").val(),
				team_role:$(".team_role").val(),
				discription:$(".discription").val(),

				},
				beforeSend:function(){},
					success:function(r){
											 
								if(r.notice == "Data found")
								{
									msg(".team_msg", "success","bg-success");
									remove_msg(".team_msg");
									Show_teams("1");

									$(".discription").val("");
									$(".team_name").val("");

									$("#CreateTeamModal").modal('hide');


									   
								}

							
					
             
					},
        error:function(x,xhr,error){ 

        		if(x.status == 500){

            	$(".show_error_team").removeClass("d-none");

            	remove_class(".show_error_team");
            	 }


            	 if(x.status == 404){

            	 msg(".team_msg", "Internal Server Error","bg-danger");


            	 }
           

            

        
        }
			});
	 
	});
});

// load team
$(document).ready(function(){
	$('#job_roleShow').on('show.bs.collapse', function () { 
	 
	var option = 	$("#part_of_team option");
  	var length = $(option).length;
	  	if(length == '1'){

	  			$.ajax({
					type:"get",
					url:"/api/team",
					data:{
					_token:$("body").attr("token"),	
					data_type:"part_of_team"

					 
					},
					beforeSend:function(){},
						success:function(r){

							r.data.forEach(function(data){


								$("#part_of_team").append('<option value="'+data.team_name+'">'+data.team_name+'</option>');
							});

							job_role_entry();
							
						},
						error:function(x,xhr,error){

						}
					});


	  	}

	  

	});
});

// add job role 
 function job_role_entry(){


		$("#job_role_entry").submit(function(e){
			e.preventDefault();
 
 

		var id = $("input[name='id']").val();

		var data_type = $("#btn_role").attr("role");


			if(data_type == "insert"){

				var url = "/api/job";
					var type = "POST";

			}

				if(data_type == "update"){
					var url = "/api/job/"+id;
					 var type = "PUT";
				}
                                                            
 
 

				$.ajax({
						type:type,
						url:url,
						data:{
								_token:$("body").attr("token"),	

								id: $("[name=id]").val(),
								job_role: $("[name=job_role]").val(),
								sallery: $("[name=sallery]").val(),
								experience: $("[name=experience]").val(),
								certification: $("[name=certification]").val(),
								qualification: $("[name=qualification]").val(),
								part_of_team: $("[name=part_of_team]").val()


						},				 
						cache:false,
						beforeSend:function(){},
						success:function(r){
						 
							if(r.notice == "Data Insert")
										{
											msg(".job_msg", "Data Successfully Insert","bg-success");
											remove_msg(".job_msg");
										 $("#job_role_entry").trigger('reset');  

										 $("#btn_role").attr("role","insert");

										 Show_jobs("1");

											   
										}


										if(r.notice == "Data Update")
										{
											msg(".job_msg", "Data Successfully Update","bg-success");
											remove_msg(".job_msg");
										 $("#job_role_entry").trigger('reset');  

										 $("#btn_role").attr("role","insert");

										 Show_jobs("1");

											   
										}
						},
						error:function(x,xhr,error){	



        		if(x.status == 500){

            	$(".show_error_role").removeClass("d-none");

            	remove_class(".show_error_role");
            	 }


            	 if(x.status == 404){

            	 msg(".show_error_role", "Internal Server Error","bg-danger");


            	 }




						}
					});
	});
} 

// show job role
function Show_jobs(url){
	$.ajax({
				type:"get",
				url:"/api/job?page="+url,
				data:{
				_token:$("body").attr("token"),	
				data_type:"paginate",
				limit:5			
				},				
				beforeSend:function(){
					 $(".job_load").html('');
					 $(".job_loader").removeClass("d-none ");
					 $(".job_loader").addClass("d-flex");
				},
				success:function(r){
					$(".job_loader").addClass("d-none");

					$(".job_loader").removeClass("d-flex");
					 
					var color = ['erpbg-pink','erpbg-primary', 'erpbg-success','erpbg-info', 'erpbg-secoundry'];

					var index ;

					var start = r.data.from;

					var end = r.data.last_page;
				 	
				 	$(".job_total").html("Total - "+r.data.total);

				 	var li = '';

				 	var active = '';

				 	var  ul = document.createElement("UL");
						
					ul.className = "pagination";

					for(i=1; i<=end; i++){

						if(i == url){
							active = 'active';
						}
						else{
							active = '';
						}
						
						li = '<li class="page-item '+active+'" link="/api/team?page='+i+'"><a class="page-link job_link  " href="'+i+'">'+i+'</a></li>';
						$(ul).append(li); 
					}
								 
						if($(".paginatingjob_data").html() == '' || i !=end  ){
							$(".paginatingjob_data").html(ul); 
							}

							$(".job_link").each(function(e){
								this.onclick = function(e){
									e.preventDefault();
									Show_jobs($(this).attr("href"));
									}
								});

					var card_design = '';
					$(".job_load").html('');

					var table = document.createElement("TABLE");
					table.className = "table table-hover my-4";

					var thead = document.createElement("THEAD"); 

					var tr = document.createElement("TR"); 

					tr.innerHTML = `<tr>
										<th scope="col">job_role</th>
										<th scope="col">part_of_team</th>
										<th scope="col">experience</th>
										<th scope="col">qualification</th>
										<th scope="col">sallery</th>
										<th scope="col">Action</th>
									</tr>`;


					var tbody = document.createElement("TBODY"); 
					tbody.className = "text-white";
					$(".job_load").append(table);
					$(table).append(thead);
					$(thead).append(tr);
					$(table).append(tbody);


					r.data.data.forEach(function(data){
					index = Math.floor(Math.random() * 5);
					card_design = 	 `<tr class=" `+color[index]+`">
										 	<td>`+data.job_role+`</td>
											<td>`+data.part_of_team+`</td>
											<td>`+data.experience+`</td>
											<td>`+data.qualification+`</td>
											<td>`+data.sallery+`</td> 
											<td class="edit_team" data="`+btoa(JSON.stringify(data))+`"><span class="material-icons">edit</span></td> 
										</tr>`;
							$(tbody).append(card_design);
						}); 


					$(".edit_team").each(function(){
						$(this).click(function(){
							job_update($(this).attr("data"));
							});
					});
					},
		        error:function(x,xhr,error){

		        	if(x.status == 404){
		        		msg("jobrole_msg", "! No Team Created Yet Please Create Team","bg-danger");   
		        	}

				}
			}); 
}

// update
function job_update(data){
		data = atob(data);

		data = JSON.parse(data);

		$('#job_roleShow').collapse('show'); 

		$("input[name='id']").val(data.id);

		$("input[name='job_role']").val(data.job_role);

		$("input[name='sallery']").val(data.sallery);

		$("input[name='experience']").val(data.experience);

		$("input[name='certification']").val(data.certification);

		$("input[name='qualification']").val(data.qualification);

		$("#part_of_team").val(data.part_of_team); 

		$("#btn_role").attr("role","update"); 
}


// job role load
$(document).ready(function(){

			$('#add_employee').on('show.bs.collapse', function () { 

				var option = 	$(".emp_job_role option");
		  	
		  		var length = $(option).length;
			
			  	if(length == '1'){

			  			$.ajax({
							type:"get",
							url:"/api/job",
							data:{
							_token:$("body").attr("token"),	
							data_type:"get_job_role_and_sellary"					 
							},
							beforeSend:function(){},
								success:function(r){
		 

									r.data.forEach(function(data){

										$(".emp_job_role").append('<option selary="'+data.sallery+'">'+data.job_role+'</option>');
									});

									// job_role_entry();
									
								},
								error:function(x,xhr,error){

								}
							});
			  	}   






			});  

});

	// sallery load 
$(document).ready(function(){
		$('.emp_job_role').on('change',function(){

			 var option_index = this.selectedIndex;

			 var option = $('.emp_job_role  option');


			 var sellery = $(option[option_index]).attr('selary');

			 $("#emp_sallery").val(sellery); 

		});
}); 

$(document).ready(function(){


	$("#agree-form").on("shown.bs.collapse", function () { 
 
		var input = $("#agree-form input");

		$(input).each(function(){

			$(this).attr("required","required");			
							
		});
 


	});   

		$("#agree-form").on("hide.bs.collapse", function () { 
			
		var input = $("#agree-form input");

		$(input).each(function(){

			$(this).removeAttr("required");			
							
		});


	}); 

});



$(document).ready(function(){


	$("#add_employee input[type=file]").each(function(){
		$(this).on('change',function(){
			
				var file = this.files[0];

				var name_file =  $(this).attr("name");

				var size_of_image,uloadmsg;

				if(name_file == "profile_picture")
						{

							size_of_image = 71200;		

							uloadmsg = "Upload Only 70 kb Image File";	

						}

						else if(name_file == "salery_slip"){

							var length = file.length;

							size_of_image = 12582912;		


							alert(length);

							return false;


						}
						else{

							size_of_image = 3145728;

							uloadmsg = "Upload Only 3 MB  Image File";					 

						} 



				if((file.type == "image/png") || (file.type == "image/jpeg") || (file.type == "image/jpg") || (file.type == "image/gif") || (file.type == "image/bmp")){

  									if(file.size < size_of_image){


										if(name_file == "profile_picture")
											{
												var url = URL.createObjectURL(file);
  
												$(this).prev().attr("src",url);

											} 


									if($(this).next().hasClass("upload_msg") || $(this).next().hasClass("upload_msg2")  ){ 

												$(this).next().remove();
									}
						}
						else{

							if(!$(this).next().hasClass("upload_msg2")){


							$("<div class='upload_msg2 d-flex align-items-center'><span class='material-icons text-danger ' style='font-size:17px;'>error</span> <span class='text-danger quicksend'>"+uloadmsg+".</span></div>").insertAfter(this);


							}
						}

				}
				else{

						if(!$(this).next().hasClass("upload_msg")){
							$("<div class='upload_msg d-flex align-items-center'><span class='material-icons text-danger ' style='font-size:17px;'>error</span> <span class='text-danger quicksend'>Upload Only Image File.</span></div>").insertAfter(this);

		}


				
					 
					 
				}


				


			});
	});
});

 

 //show employee
show_employe();
 function show_employe(){
	
 	$(document).ready(function(){
		
 		$.ajax({
 			type:"GET",
 			url:"/api/employee",
			dataType:"JSON",
 			data:{
 				_token:$("body").attr("token"),
 				data_type:"employee",
 				limit:10
 			},
 			cache:false,
 			beforeSend:function(){},
 			success:function(r){
 				console.log(r);

			
 				// r.data.forEach(function(data){
 				// 	var data = `<div class="col-md-3>
 				// 		<img src="`+data.+`" width="100"/>


 				// 	</div>"`;
 				// });




 				

 				// $("#show-employee .active .row").append(data);
 			},
 			error:function(x,xhr,e){}
 			
 		});
 	});
 }




























//////function for the sort code///
function msg(massage_class, notice,color) {
    var div = `<div class=" text-white p-3 mt-5 mb-2 rounded ` + color + `">` + notice + `</div>`;
    $(massage_class).html(div);
}
function remove_msg(massage_class) {
		 setTimeout (function(){
		 	 $(massage_class).html("");
		 }, 3000);
}
function add_class(massage_class) {		
		 setTimeout (function(){
		 	 $(massage_class).removeClass("d-none");
		 }, 3000);
}
function remove_class(massage_class) {		
		 setTimeout (function(){
		 	 $(massage_class).addClass("d-none");
		 }, 3000);
}


    

  