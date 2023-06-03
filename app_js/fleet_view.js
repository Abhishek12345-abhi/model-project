 var overlay = jQuery('<div id="overlay"></div>');

var itemPerPage=$("#pagi_record_per_page").val();

  var currentPageNo=1;

   var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = decodeURIComponent(window.location.search.substring(1)),
    sURLVariables = sPageURL.split('&'),
    sParameterName,
    i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split('=');

    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined ? true : sParameterName[1];
    }
  }
};      

      $("#pagi_holder").pagination({
          items: 0,
          itemsOnPage: itemPerPage,
          useAnchors: false,
          cssStyle: 'light-theme',
          onPageClick: function(pageNumber, event) {
           
              currentPageNo=pageNumber;
           load_page(currentPageNo);
      }
      }); 

      //$("#loading_spinner").hide();

      load_page(currentPageNo);


     $("#pagi_record_per_page").on('change',function(){

      itemPerPage=$("#pagi_record_per_page").val();

        $(function() {  
           $("#pagi_holder").pagination('updateItemsOnPage',itemPerPage);
        });

      });

     $("#src_btn").click(function(){
      $("#c_name").val("");
      $("#c_no").val("");
     $("#date_modal").modal('show');

     });


 




    function load_page(pageNo)
    {
      overlay.appendTo(document.body);
     
      $("#show_table").html("");





		var srch_m_type="";
  
		if (getUrlParameter('m_type')!== undefined)
		{
			srch_m_type = getUrlParameter('m_type').replace(/\+/g, ' ');
		}
		else
		{
			srch_m_type=""; 
		}

      rec_no=((pageNo*itemPerPage)-itemPerPage)+1;

      $.post("fleet-scroll-search",
        {
          post_page_no:pageNo,
          post_itemPer_page:itemPerPage,
          s_srch_mtype:srch_m_type,
          s_srch_cid:getUrlParameter('c_id'),
		  s_srch_sno:getUrlParameter('s_no'),
		  s_srch_model:getUrlParameter('model'),
		  s_srch_lid:getUrlParameter('l_id'),
          s_srch_btn:getUrlParameter('srch_button')
        },
        function(data)
        {

          //alert(data);
         overlay.remove();
          var result=JSON.parse(data);
		  var attached_sts = "";

          //alert(result['table_data']);
          $(function() 
			{
				$("#pagi_holder").pagination('updateItems', result['total_records']);

			});

     $("#pagi_total_records").html("Total Records: "+ result['total_records']);


     $.each(result['table_data'],function(index,item){


      //alert(item.end_list);
      if(item.end_list==0)
      {
		  
		  if(item.attached_device==null)
		  {
			var attached_sts='<button class="btn btn-icon btn-2 btn-info add_device" type="button" id="'+item.sl+'"><span class="btn-inner--icon"><i class="fa fa-plus green-color"></i></span></button>';  
		  }
		  else
		  {
			  var attached_sts= item.attached_device;
		  }

		var edit='<button class="btn btn-icon btn-2 btn-primary edit" type="button" id="'+item.sl+'"><span class="btn-inner--icon"><i class="fa fa-edit green-color"></i></span></button>';
		$("#show_table").append('\
            <tr cellspacing="20" style="border:1px solid #E8E8E8 ; height:60px">\
            <td style="white-space:nowrap" ;text-align:center" class="text-sm font-weight-normal">'+edit+'</td>\
            <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+attached_sts+'</td>\
            <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.con_name+'</td>\
			<td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.location_nm+'</td>\
            <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.serial_no+'</td>\
            <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.mac_type+'</td>\
            <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.model+'</td>\
            <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.shift_hours+'</td>\
			<td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.fuel_consumption+'</td>\
            <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.carbon_emission+'</td>\
            <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.image_link+'</td>\
                   </tr>\
                   ');

			rec_no=rec_no+1;

		}


     });
	 
	
		//-----------------------------------------------------------------------------


		//=======================edit start============================  

		$(".edit").unbind().click(function()
		{
      
		overlay.appendTo(document.body);

		var id= $(this).attr('id');

		 $.post("edit_db.php",
		  {
			post_id:id
		  },
		  function(result){

			 //alert(result);
			 var data = JSON.parse(result);

			 overlay.remove();

			 if(data['status']==true)
			 {
				//alert (data['total_data']['con_name']);
				$("#edit_modal").modal('show');


				$("#c_id").val(data['total_data']['c_id']);
				$("#con_name").val(data['total_data']['con_name']);
				$("#c_address").val(data['total_data']['c_address']);
				$("#c_ph").val(data['total_data']['c_con']);
				$("#c_email").val(data['total_data']['c_email']);
			 }


			});
     
     
		});
	});

    }

     //====================================================================
    $('#c_ph').keypress(function (e) 
    { 
                        
      var charCode = (e.which) ? e.which : event.keyCode    
      var num= $(this).val();
    
      if (String.fromCharCode(charCode).match(/[^0-9]/g) || num.length>=10)    
      return false;                       
    });

    $('#c_ph').blur(function(){

        var num= $(this).val();

        if(num.length!=10)
        {
          $("#msge").html("Enter 10 digit Mobile Number");

       
        }
      });
    $("#c_ph").click(function(){
        $("#msge").html("");
      });

    //alert($("#c_ph").val());
//==========================================================================

 var email=$("#c_email").val();
    if($("#c_email").val()!="")
    {
      
          function isEmail(email)
          {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
          }
          
          if( !isEmail(email))
          { 
            
            //$('html, body').animate({scrollTop: 0}, 800);
            
            $('#c_email').focus();
                     
            $("#c_email").css({'background':'#fff','border':'1px solid','border-color':'#666'});
                    
            swal("Check Your Entered Email Id !");
            
           
            
          }
    }

     $("#c_email").click(function(){
        $("#msge1").html("");
      })



// =====================update start=========================

  $("#update").unbind().click(function(){

       // alert(id);   
    var subok=1;
  $(".form_check").click(function(){
   $(this).css({'background':'#FFF','border':'','border-color':''});
  });

  $(".form_check").keypress(function(){
    $(this).css({'background':'#FFF','border':'','border-color':''});
  });

  $(".form_check").each(function(){
   if($(this).val()=="")
   {
    $(this).css({'background':'#FDD','border':'1px solid','border-color':'#FD0'});
    subok=0;
   }
  });
  
  if(subok==1)
  {
    overlay.appendTo(document.body);
    var con_id=$("#c_id").val();
    var con_name=$("#con_name").val();
    var con_add=$("#c_address").val();
    var con_ph=$("#c_ph").val();
    var con_email=$("#c_email").val();
    var suc_data="eDSmtdB";


    $.post("edit-submit",
      { p_con_sl:id,
        p_con_id:con_id,
        p_con_name:con_name,
        p_con_add:con_add,
        p_con_ph:con_ph,
        p_con_email:con_email,
        suc:suc_data
      }
      ,function(retdata){

       // alert(retdata);

        var result=JSON.parse(retdata);
        //alert(result['reason']);
        if(result['status']==true)
        {
          overlay.remove();
          $("#edit_modal").modal('hide');
          location.reload();
        }
        else
        {
          overlay.remove();
          Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: result['reason']
          
        })

        }

        


    });

  }



         });

//===============================---= end update ==---===============================

    


  
     


    // ====================================add button====================================


     $("#add_btn").click(function(){
   //alert("okk");
  $("#add_modal").modal('show');
 });
// -------------------------------phone number validation------------------
 $('#cont_ph').keypress(function (e) 
    { 
                        
      var charCode = (e.which) ? e.which : event.keyCode    
      var num= $(this).val();
    
      if (String.fromCharCode(charCode).match(/[^0-9]/g) || num.length>=10)    
      return false;                       
    });

    $('#cont_ph').blur(function(){

        var num= $(this).val();

        if(num.length!=10)
        {
          $("#message").html("Enter 10 digit Mobile Number");

       
        }
      });

      $("#cont_ph").click(function(){
        $("#message").html("");
      })

//---------------------------------------------------------------------------------

//--------------------------------email validation---------------------------------
        var email=$("#cont_email").val();
    if($("#cont_email").val()!="")
    {
      
          function isEmail(email)
          {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
          }
          
          if( !isEmail(email))
          { 
            
            //$('html, body').animate({scrollTop: 0}, 800);
            
            $('#cont_email').focus();
                     
            $("#cont_email").css({'background':'#fff','border':'1px solid','border-color':'#666'});
                    
            swal("Check Your Entered Email Id !");
            
            cust_ok=0;
            
          }
    }

     $("#cont_email").click(function(){
        $("#message1").html("");
      })
//---------------------------------------------------------------------------------------
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
      var contractor_id=$("#cont_id").val();
      var contractor_name=$("#cont_name").val();
      var contractor_address=$("#cont_address").val();
      var contractor_ph=$("#cont_ph").val();
      var contractor_email=$("#cont_email").val();
	  
	  overlay.appendTo(document.body);
	  
      $.post("reg5_contracTor",
      {
        post_contractor_id:contractor_id,
        post_contractor_name:contractor_name,
        post_contractor_address:contractor_address,
        post_contractor_contact:contractor_ph,
        post_contractor_email:contractor_email

      },function(data){
		  
		  overlay.remove();
      //alert(data);
      var res=JSON.parse(data);

      if(res['status']==true)
       {
			//location.reload();
          $("#msg").html("<div class='alert alert-success'>\
                <strong>Success ! </strong>"+res['reason']+"</div>");
                setTimeout(function(){                      
                        $("#msg").fadeOut(2000);
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
$("#add_reset").click(function(){
  $(".frm_check").val("");
});
$("#edit_reset").click(function(){
  $(".form_check").val("");
});



$(document).ready(function(){
$("#l_id").blur(function () 
    { 
	
	alert("fff");
})

   $("#c_id").autocompletec({
          source: "autocom_contractor_id.php",
          minLength: 1,
          
      });
	  
	  $("#s_no").autocompletec({
          source: "autocom_fleet_sno.php",
          minLength: 1,
          
      });

   $("#c_no").autocompletec({
          source: "autocom_contractor_mobile.php",
          minLength: 1,
          
      });

});