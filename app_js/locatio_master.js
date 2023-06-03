  // ====================================add button====================================
     $("#add_loation").click(function(){
   //alert("okk");
  $("#add_modal").modal('show');
 });
//--------------------------------------submit click------------------------------------

 
//-=-=-=-=-=-=-=-=-=-==============================
$("#sub").click(function(){
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
      var location_n=$("#location_name").val();
      
    
      overlay.appendTo(document.body);
      $.post("add9_location",
      {
       
        post_location_n:location_n
        

      },function(data1){
        //alert(data);
        var result=JSON.parse(data1);
        overlay.remove();
        if(result['status']==true)
        {
          $("#massege").html("<div class='alert alert-success'>\
                <strong>Success ! </strong>"+result['reason']+"</div>");
                setTimeout(function(){                      
                        $("#massege").fadeOut(2000);
                        window.location.href="location_master.php";
                        }, 2000);
        }


        else
        {
          if(result['reason']=="no_session")
          {
            $("#massege").html("<div class='alert alert-danger'>\
             Session Error !</div>");
            setTimeout(function(){                      
                        $("#massege").fadeOut(2000);
                        window.location.href="logout.php";
                        }, 2000);
          }
          else
          {
            $("#massege").html("<div class='alert alert-danger'>\
            "+result['reason']+"</div>");

            setTimeout(function(){                      
                        $("#massege").fadeOut(2000);
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
      // $("#c_name").val("");
      // $("#c_no").val("");
     $("#srch_modal").modal('show');

      });


 
      function load_page(pageNo)
    {
    var overlay = jQuery('<div id="overlay"></div>');

  var srch_l_namer="";
  
  if (getUrlParameter('l_name')!== undefined)
  {
    srch_l_namer = getUrlParameter('l_name').replace(/\+/g, ' ');
  }
  else
  {
    srch_l_namer=""; 
  }

  
      $("#show_table").html('');
      rec_no=((pageNo*itemPerPage)-itemPerPage)+1;
      overlay.appendTo(document.body);
      $.post("location55-scroll-search",
        {
          post_page_no:pageNo,
          post_itemPer_page:itemPerPage,
          s_l_name:srch_l_namer,
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

     var edit='<button class="btn btn-icon btn-2 btn-primary edit" type="button" id="'+item.sl +'"><span class="btn-inner--icon"><i class="fa fa-edit green-color"></i></span></button>';
      $("#show_data").append('\
            <tr cellspacing="20" style="border:1px solid #E8E8E8 ; height:60px">\
            <td style="white-space:nowrap" class="text-sm font-weight-normal">'+edit+'</td>\
            <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+rec_no+'</td>\
            <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.l_name+'</td>\
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
      $.post("edit_location_db.php",
      {
        post_location_id:id
      },function(data2){
        //alert(data2);
        overlay.remove();
        $("#edit_modal").modal('show');
        var ress=JSON.parse(data2);
        //alert(ress['l_name']);
        $("#location_name1").val(ress['l_name']);
        $("#test").val(id); 
      });
     });

     
 //----------------------------------------edit end--------------------------------------- 
//----------------------------------------start update------------------------------------
  $("#update").click(function(){
    overlay.appendTo(document.body);
      var location_id=$("#test").val();
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
      var location_n=$("#location_name1").val();
      //alert(device_qr);
      $.post("update49_location",
      {
        post_location_id:location_id,
        post_location_name:location_n,
        
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
                        window.location.href="location_master.php";
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
        $("#l_name").autocompletec({
          source: "autocom_location_name.php",
          minLength: 1,
          
      });


})        