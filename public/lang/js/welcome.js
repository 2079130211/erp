 //////////////////// 
$(document).ready(function() {
    $(".welcome-form-input").each(function(){
        $(this).click(function() {
        $(this).attr("placeholder", "");
        var label = this.parentElement
        label = label.getElementsByTagName('LABEL')[0];
        $(label).removeClass("d-none");
        $(label).addClass("animate__animated animate__backInUp");
    });
        });

});



// empty_validation

function empty_validation(first_class, secound_class) {
    var container = document.getElementsByClassName(first_class)[0];
    var input = container.getElementsByClassName("require");
    var url = container.getElementsByClassName("url");
    var temp = [];
    $(input).each(function(i) {
        if ($(this).val().trim() == "") {
            if (this.nextSibling.nodeName == "SMALL") {
                this.nextSibling.remove();
            }
            $(this).addClass("border-danger animate__animated ");
            $("<small class='text-danger required-notice animate__animated animate__wobble'> <i class='fa fa-exclamation-triangle'></i> This field can not be empty</samll>").insertAfter(this);
        } else {
          temp[i] = $(this).val().trim();
            if (this.type == "email") {
                validate_email(this);

            }

            
        if (this.type == "url") {
             if($(this).val().trim() == "") {
                 if (this.nextSibling.nodeName == "SMALL") {
                this.nextSibling.remove();
            }
            }
            else
            {
                 validate_url(this);

            }

           
        

            }



        }
    });

   // remove required message on input
    $(input).each(function() {
        $(this).on('input', function() {
            if (this.nextSibling.nodeName == "SMALL") {
                $(this).removeClass("border-danger");
                this.nextSibling.remove();
            }
        });

    });

   


    // slide if all required field is not empty
    if (temp.length == input.length && $(".required-notice").length == 0) {  

        company_validateion(first_class,secound_class);
 

    }

}

// validate email
function validate_email(input){
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

	if(!reg.test(input.value))
	{
		if(input.nextSibling.nodeName == "SMALL")
			{
				input.nextSibling.remove();
			}

			$(this).addClass("border-danger");
			$("<small class='text-danger required-notice'><i class='fa fa-warning'></i> Enter a valid email</small>").insertAfter(input);
	}
}

// validate url
function validate_url(input){
	var reg = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;

	if(!reg.test(input.value))
	{
		if(input.nextSibling.nodeName == "SMALL")
			{
				input.nextSibling.remove();
			}

			$(this).addClass("border-danger");
			$("<small class='text-danger required-notice'><i class='fa fa-warning'></i> Enter a valid url</small>").insertAfter(input);
	}
}

// slide on back and next

$(document).ready(function() {
    $(".step-1-next").click(function(e) {
        e.preventDefault();
        empty_validation("step-1", "step-2");
    });
    $(".step-2-next").click(function(e) {
        e.preventDefault();
        empty_validation("step-2", "step-3");
    });
    $(".step-3-next").click(function(e) {
        e.preventDefault();
        empty_validation("step-3", "step-4");
    });
    $(".step-2-back").click(function(e) {
        e.preventDefault();
        empty_validation("step-2", "step-1");
    });
    $(".step-3-back").click(function(e) {
        e.preventDefault();
        empty_validation("step-3", "step-2");
    });
    $(".step-4-back").click(function(e) {
        e.preventDefault();
        empty_validation("step-4", "step-3");
    });
});


function company_validateion(first_class,secound_class){

    var input = document.querySelector(".company_name");

     var company_name = $(input).val();


      var slug = document.querySelector(".slug");

     var slug_val =  company_name.replace(/ /g, "");


      $(slug).val(slug_val);

     


     var query = {
        column_name : "erp",
        data : slug_val
     }


    query = btoa(JSON.stringify(query));



     $(".erp_url").val("http://127.0.0.1:8000/erp/"+slug_val);





    $.ajax({
        type:"get",
        url:"api/company/"+query,
        data:{
                _token:$("body").attr("token"),
        },
        success:function(r){

        console.log(r);

            if (input.nextSibling.nodeName == "SMALL") {
                input.nextSibling.remove();
            }
            $(input).addClass("border-danger animate__animated ");
            $("<small class='text-danger required-notice animate__animated animate__wobble'> <i class='fa fa-exclamation-triangle'></i> Company Is Already Exist </samll>").insertAfter(input);
        },
        error:function(x,xhr,error){



            if(x.status == 404)
            {

                    genrate_password();

        $("." + first_class).addClass("d-none");

        $("." + secound_class).removeClass("d-none");

        $("." + secound_class).addClass("animate__animated  animate__fadeInRight");

            }

            

        
        }
    });

}


function genrate_password(){


    var password = '!@#$as%^&*(75se85%^GOD&(H#DGjd*)R94axcfdgbchnvkmnlg';

var index;

var i; 

var final_password = '';

 

    for(i=0; i<8; i++){
 
    index = Math.random()*password.length-1;



    index = Math.floor(index);

     

    final_password += password[index];

}



$(".password").val(final_password);
 
}

