$(document).ready(function(){

	var overlay = jQuery('<div id="overlay"></div>');

$("#sub").click(function()
{
	//alert ("ok");

  
  var submit_ok=1;
  
    
    $('.frm_check').click(function()
  {
    $(this).css({'background':'#fff','border':'','border-color':''});
    
  });
  
    
    
    $('.frm_check').each(function()
    {
      if($.trim($(this).val())=="")
      {
        $(this).css({'background':'#FDD','border':'1px solid','border-color':'#F00'});
        submit_ok=0;
      }
    }); 


    $("#result").html("");

    if(submit_ok==1)
    {
      
	  //overlay.appendTo(document.body);
          
          $("#sub").html('Please wait..');

          $("#sub").prop('disabled',true);
      
            
       var username=$.trim($('#user').val());
        var password=$.trim($('#pass').val());
      
      $.post("login_submit",
      	{
      		post_user:username,
      		post_pass:password
      	},
      	function(retdata){
      		//alert(retdata);
      		var data= JSON.parse(retdata);

      		if(data['status']==true)
      		{    overlay.remove();
      			window.location.href="dashboard";
      		}
      		else
      		{
      			$("#sub").html('sign in');

            $("#sub").prop('disabled',false);

      			$("#result").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>\
          <strong>Failure ! </strong> '"+data['reason']+"'</div>");
      		}

      });
        
}

    
});
});