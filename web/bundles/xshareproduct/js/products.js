var pagajaxbusy=false;
$(document).ready(function(){
    $('.category-select').change(function(){
       var id   =  $(this).val();
       var lang =  $(this).attr('lang');
      if(id!=""){ 
       $('.recived-data').html("");   
       $("#loading-gif").show();
       $.get("/"+lang+"/category/ajax/"+id, function(data){
           $("#loading-gif").hide();
           $('.recived-data').html(data);
       })
       
      }else{
          $("#loading-gif").hide();
          $('.recived-data').html("");
      }
    });
    
    $(".pager-prod-list a").click(ajaxpaginate);
    $('#filters-continer a').click(function(){
       $('.filters-continer a').removeClass('filteractive');
       if($(this).attr("filtervalue")!=0)
        $(this).addClass("filteractive");
     });
})

function ajaxpaginate(evt){
    if(!pagajaxbusy){
        
       pagajaxbusy=true;
       var elm=evt.target;
        if(elm.nodeName=="IMG"){
            elm =evt.target.parentElement;
        }
       
       var lk  = $(elm).attr('href');
       var uid = $("#Fuid").val();//get user id form hidden input
       var filter    =  $(".filteractive").attr('filtervalue');
       var ordertype =  $(".filteractive").attr('ordertype');
       var fromPage = $("#Ffrom").val(); // get the from value seted in userdetails
       if(filter==undefined){
        filter=0;
       }
       if(ordertype!==undefined){
           if(ordertype=='desc'){
               filter =parseInt(filter,10)+1;
           }
       }
      // $('#product-continer-ajax').html('');
       $.get(lk+"/"+uid+"/"+filter+"/"+fromPage ,function(data){
           $('#product-continer-ajax').html(data);
           $(".pager-prod-list a").click(ajaxpaginate);
           pagajaxbusy=false;
       })
    }
       return false;
}

function ajaxFilter(elm,lang,filter,uid){
   if(!pagajaxbusy){
     pagajaxbusy=true;
     var ordertype = $(elm).attr('ordertype');
     var fromPage = $("#Ffrom").val(); // get the from value seted in userdetails 
     $('#filters-continer a').removeClass('asc');
     $('#filters-continer a').removeClass('desc');
     if($(elm).attr('filtervalue')!=0)
     if(ordertype=='asc'){
         $(elm).attr('ordertype','desc');
         filter +=1;
         $(elm).removeClass('asc');
         $(elm).addClass('desc');
     }else{
         $(elm).attr('ordertype','asc');
         $(elm).removeClass('desc');
         $(elm).addClass('asc');
     }
    $.get("/"+lang+"/ajax/products/1/"+uid+"/"+filter+"/"+fromPage,function(data){
           $('#product-continer-ajax').html(data);
           $(".pager-prod-list a").click(ajaxpaginate);
           pagajaxbusy=false;
    });
   }
}