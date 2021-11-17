$(document).ready(function(){
	$(".admin-form").submit(function(e){
		e.preventDefault();


		var company_estd =	$(".company_estd").val();
		var slug = 	$(this).attr('slug');
		var company_password = 	$(".company_password").val().trim();





   var query = {
   				column_name : "admin_register",
				company_estd:company_estd,
				slug:slug,
				company_password:company_password
     };



 var query_data = JSON.stringify(query);
    
    query_data = btoa(query_data);

  
				$.ajax({
					type:"put",
					url: "/api/company/"+query_data,
					data:{
						_token:$("body").attr("token"),						
					},
					success:function(r){


								if(r.notice == "found")
								{
									msg("msg", "success","bg-success");

									  window.location = '/admin';
								}

							
					
             
					},
        error:function(x,xhr,error){



           
            	msg("msg", "Not Found","bg-danger");               

           

            

        
        }
				});
	});
});




function msg(massage_class, notice,color) {


    var div = `<div class=" text-white p-3 mt-5 mb-2 rounded ` + color + `">` + notice + `</div>`;



    $("." + massage_class).html(div);





    setTimeout(function() {

        $("." + massage_class).html("");

    }, 3000);





}