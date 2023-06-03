  // ====================================add button====================================
     $("#add_btn").click(function(){
   //alert("okk");
  $("#add_modal").modal('show');
 });
//--------------------------------------submit click------------------------------------

 $('.txt_num').keypress(function (e) 
    { 
                        
      var charCode = (e.which) ? e.which : event.keyCode    
      var num= $(this).val();
    
      if (String.fromCharCode(charCode).match(/[^0-9]/g))    
      return false;                       
    });
//-=-=-=-=-=-=-=-=-=-==============================
$("#submit").click(function(){
  var overlay = jQuery('<div id="overlay"></div>');
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
      var d_qr=$("#device_qr").val();
      var d_imei=$("#device_imei").val();
      var major_n=$("#major_no").val();
      var minor_n=$("#minor_no").val();
    
      overlay.appendTo(document.body);
      $.post("add7_device",
      {
        post_device_qr:d_qr,
        post_device_imei:d_imei,
        post_major_no:major_n,
        post_minor_no:minor_n
        

      },function(data){
        //alert(data);
        var res=JSON.parse(data);
        overlay.remove();
        if(res['status']==true)
        {
          $("#msg").html("<div class='alert alert-success'>\
                <strong>Success ! </strong>"+res['reason']+"</div>");
                setTimeout(function(){                      
                        $("#msg").fadeOut(2000);
                        window.location.href="mine_device.php";
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
  $(".frm_check").val("")
});
//------------------------------------------------view start------------------------------------------------------
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
    var overlay = jQuery('<div id="overlay"></div>');

  var srch_device_qr="";
  
  if (getUrlParameter('d_qr')!== undefined)
  {
    srch_device_qr = getUrlParameter('d_qr').replace(/\+/g, ' ');
  }
  else
  {
    srch_device_qr=""; 
  }

  var srch_d_imei="";
  
  if (getUrlParameter('d_imei')!== undefined)
  {
    srch_d_imei = getUrlParameter('d_imei').replace(/\+/g, ' ');
  }
  else
  {
    srch_d_imei=""; 
  }
      $("#show_table").html('');
      rec_no=((pageNo*itemPerPage)-itemPerPage)+1;
      overlay.appendTo(document.body);
      $.post("device47-scroll-search",
        {
          post_page_no:pageNo,
          post_itemPer_page:itemPerPage,
          s_srch_qr:srch_device_qr,
          s_srch_imei:srch_d_imei,
          s_srch_btn:getUrlParameter('srch_button')
        },
        function(data1)
        {

          //alert(data1);
          overlay.remove();
          var result=JSON.parse(data1);
          $(function() 
        {
       $("#pagi_holder").pagination('updateItems', result['total_records']);

       });

     $("#pagi_total_records").html("Total Records: "+ result['total_records']);


     $.each(result['table_data'],function(index,item){

     //alert(item.end_list);
      if(item.end_list==0)
      {

     var edit='<button class="btn btn-icon btn-2 btn-primary edit" type="button" id="'+item.sl+'"><span class="btn-inner--icon"><i class="fa fa-edit green-color"></i></span></button>';
      $("#show_table").append('\
            <tr cellspacing="20" style="border:1px solid #E8E8E8 ; height:60px">\
            <td style="white-space:nowrap" class="text-sm font-weight-normal">'+edit+'</td>\
            <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+rec_no+'</td>\
            <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.dev_qr+'</td>\
            <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.dev_imei+'</td>\
            <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.dev_mejr_no+'</td>\
            <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.dev_minor_no+'</td>\
                   </tr>\
                   ')

      rec_no=rec_no+1;
    }

     });

//------------------------------------------edit start------------------------
     $(".edit").unbind().click(function(){
     var id= $(this).attr('id');
     //alert(id);
      overlay.appendTo(document.body);
      $.post("edit_device_db.php",
      {
        post_device_sl:id
      },function(data2){
        //alert(data2);
        overlay.remove();
        $("#edit_modal").modal('show');
        var ress=JSON.parse(data2);
        //alert(ress['d_qr']);
        $("#device_qr1").val(ress['d_qr']);
        $("#device_imei1").val(ress['d_imei']);
        $("#major_no1").val(ress['m_no']);
        $("#minor_no1").val(ress['min_no']);
        $("#test").val(id); 
      });
     });

     
 //----------------------------------------edit end--------------------------------------- 
//----------------------------------------start update------------------------------------
  $("#update").click(function(){
    overlay.appendTo(document.body);
      var device_sl=$("#test").val();
      //alert(device_sl);
      var sub_ok=1;
      $(".frm_check1").click(function(){
      $(this).css({'background':'#FFF','border':'','border-color':''});
      });

      $(".frm_check1").keypress(function(){
      $(this).css({'background':'#FFF','border':'','border-color':''});
      });

      $(".frm_check1").each(function(){
      if($(this).val()=="")
      {
        $(this).css({'background':'#FDD','border':'1px solid','border-color':'#FD0'});
        sub_ok=0;
      }
      });

  if(sub_ok==1)
    {
      //alert("ok");
      var device_qr=$("#device_qr1").val();
      var device_imei=$("#device_imei1").val();
      var major_no=$("#major_no1").val();
      var minor_no=$("#minor_no1").val();
      //alert(device_qr);
      $.post("update4_device",
      {
        post_device_qr:device_qr,
        post_device_imei:device_imei,
        post_major_no:major_no,
        post_minor_no:minor_no,
        post_device_sl:device_sl
      },function(data3){
        //alert(data3);
        overlay.remove();
         var result=JSON.parse(data3);
         if(result['status']==true)
         {
          $("#msg1").html("<div class='alert alert-success'>\
                <strong>Success ! </strong>"+result['reason']+"</div>");
                setTimeout(function(){                      
                        $("#msg1").fadeOut(2000);
                        window.location.href="mine_device.php";
                        }, 2000);
         }


        else
        {
          if(result['reason']=="no_session")
          {
            $("#msg1").html("<div class='alert alert-danger'>\
             Session Error !</div>");
            setTimeout(function(){                      
                        $("#msg1").fadeOut(2000);
                        window.location.href="logout.php";
                        }, 2000);
          }
          else
          {
            $("#msg1").html("<div class='alert alert-danger'>\
            "+res['reason']+"</div>");

            setTimeout(function(){                      
                        $("#msg1").fadeOut(2000);
                        }, 2000);
          }
          
        }

      });
    }

      });   
//-----------------------------------------end update========================
      });

    }

//------------------------------------------autocomplete----------------    
$(document).ready(function(){
        $("#d_imei").autocompletec({
          source: "autocom_device_imei.php",
          minLength: 1,
          
      });
  $("#d_qr").autocompletec({
    source: "autocom_device_qr.php",
    minLength: 1,
  });

})        