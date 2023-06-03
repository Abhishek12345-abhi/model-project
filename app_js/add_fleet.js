 $('.txt_num').keypress(function (e) 
    { 
                        
      var charCode = (e.which) ? e.which : event.keyCode    
      var num= $(this).val();
    
      if (String.fromCharCode(charCode).match(/[^0-9]/g))    
      return false;                       
    });
//---------------------------------------------------------------------------------
$("#submit").click(function(){
	//alert("ok");
	var subok=1;
	$(".frm_check").click(function(){
	 $(this).css({'background':'#FFF','border':'','border-color':''});
	});

	$(".frm_check").keypress(function(){
		$(this).css({'background':'#FFF','border':'','border-color':''});
	});

	$(".frm_check").each(function(){
	 if($(this).val()=="")
	 {
	 	$(this).css({'background':'#FDD','border':'1px solid','border-color':'#FD0'});
	 	subok=0;
	 }
	});


		if(subok==1)
		{
			//alert("ok");
			var machine_type=$("#m_type").val();
			var model=$("#model").val();
			var sl_no=$("#sl_no").val();
			var photo=$("#picture").val();
			var l_id=$("#location_id").val();
			var s_hours=$("#shift_hours").val();
			var fuel_con=$("#f_con").val();
			var carbon_emsion=$("#carbon_emision").val();
			var contractor_id=$("#store_data").val();

			//alert(contractor_id);
			//exit();

			$.post("add_fleet_db.php",
			{
				post_machine_type:machine_type,
				post_model:model,
				post_sl_no:sl_no,
				post_photo:photo,
				post_l_id:l_id,
				post_s_hours:s_hours,
				post_fuel_con:fuel_con,
				post_carbon_emsion:carbon_emsion,
				post_contractor_id:contractor_id


			},function(data){
				//alert(data);
				var res=JSON.parse(data);
				$(".frm_check").val("");
				if(res['status']==true)
				{
					$("#msg").html("<div class='alert alert-success'>\
          			<strong>Success ! </strong>"+res['reason']+"</div>");
             		setTimeout(function(){                      
                        $("#msg").fadeOut(2000);
                        //window.location.href="add_new_fleet.php";
                        }, 2000);
				}


				else
				{
					if(res['reason']=="no_session")
					{
						$("#msg").html("<div class='alert alert-danger'>\
						 Session Error !</div>");
						setTimeout(function(){                      
                        $("#msg").fadeOut(2000);
                        window.location.href="logout.php";
                        }, 2000);
					}
					else
					{
						$("#msg").html("<div class='alert alert-danger'>\
						"+res['reason']+"</div>");

						setTimeout(function(){                      
                        $("#msg").fadeOut(2000);
                        }, 2000);
					}
					
				}
			});
		}



})
//--------------------------------------------------------
$("#reset").click(function(){
	$(".frm_check").val("");
});