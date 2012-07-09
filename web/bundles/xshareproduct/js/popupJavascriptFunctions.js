/*
 * @autor s.pasat
 * datapicker settings
 **/
$(document).ready(function(){
 //------------Settings for romanian language
 if( lang == 'ro' ){ 
  $( "#datepicker" ).datepicker({
    closeText: 'Închide',
		prevText: '&laquo; Luna precedentă',
		nextText: 'Luna următoare &raquo;',
		currentText: 'Azi',
		monthNames: ['Ianuarie','Februarie','Martie','Aprilie','Mai','Iunie',
		'Iulie','August','Septembrie','Octombrie','Noiembrie','Decembrie'],
		monthNamesShort: ['Ian', 'Feb', 'Mar', 'Apr', 'Mai', 'Iun',
		'Iul', 'Aug', 'Sep', 'Oct', 'Noi', 'Dec'],
		dayNames: ['Duminică', 'Luni', 'Marţi', 'Miercuri', 'Joi', 'Vineri', 'Sâmbătă'],
		dayNamesShort: ['Dum', 'Lun', 'Mar', 'Mie', 'Joi', 'Vin', 'Sâm'],
		dayNamesMin: ['Du','Lu','Ma','Mi','Jo','Vi','Sâ'],
		weekHeader: 'Săpt', 
    onSelect: onSelectDP ,
    beforeShowDay: highlightDays
    });
 }else{
  $( "#datepicker" ).datepicker({
    onSelect: onSelectDP ,
    beforeShowDay: highlightDays
    });
 }    
    
$("#loan-accept").click(ajaxCheckValidPeriod);
$("#loan-cancel").click(function(){
    period = new Array(null,null);
    $('.data1').html("-");
    $('.data2').html("-");
    $.fancybox.close();
});

});



/*
 * @autor spasat
 * when select data on datapicker triger this function
 **/
function onSelectDP(dateText, inst){
    var date = new Date(dateText);
    if(period[0] == null){
        period[0]=dateText;
        $('.data1').html(period[0]);
        if(period[1]!=null){
            if(new Date(period[0])-new Date(period[1])>0){
               datesSwitch(period);
                $('.data1').html(period[0]);
                $('.data2').html(period[1]);
            }
        }
    }else{
        if(dateText==period[0]){
            period[0]=null;
            $('.data1').html("-");
        }else{
            if(period[1]== null){
                period[1]= dateText;
                $('.data2').html(period[1]);
                if(period[0]!=null){
                    if(new Date(period[0])-new Date(period[1])>0){
                        datesSwitch(period);
                        $('.data1').html(period[0]);
                        $('.data2').html(period[1]);
                    }
                }
            }else{
                if(dateText==period[1]){
                    period[1]=null
                    $('.data2').html("-");
                }else{
                    period[0]=dateText;
                    period[1]=null;
                    $('.data1').html(period[0]);
                    $('.data2').html('-');
                }
            }        
        }
    }
    if(period[0] == null && period[1] == null){
        $("#selected-empty").show();
        $("#selected-notempty").hide();
    }else{
        $("#selected-empty").hide();
        $("#selected-notempty").show();
    }
}
/*
 * @autor spasat
 * hightlights the choosed dates and makes unavailible     
 **/
function highlightDays(date){
    /* && $.inArray(date,dates)*/
    for (var i = 0; i < dates.length; i++) {
                if (dates[i]-date == 0) {
                   return [false, ''];
                }
    }
    
    if(date - dateNow < 0){
        return [false, ''];
    }
    
    if(period[0]!=null)
    if (new Date(period[0])-date == 0) {
            return [true, 'calendar-selected-dates',''];
    }
    if(period[1]!=null)
    if (new Date(period[1])-date == 0) {
            return [true, 'calendar-selected-dates',''];
    }
    
    if(period[0]!=null && period[1]!=null){
        if(((date-new Date(period[0]))>=0) && (date-new Date(period[1])<0)){
                return [true, 'calendar-selected-dates',''];
        }
    }
    return [true, ''];
}
//switchig dates
function datesSwitch(date){
    var aux=date[0];
    date[0]=date[1];
    date[1]=aux;
}

//---param date is an array with a period date
var ajaxprocesing = false;
function ajaxCheckValidPeriod(){
  if(period[0]!=null && period[1]!=null)
  if(!ajaxprocesing){
    $('.success-status').hide();
    $('.invalid-status').hide();
    ajaxprocesing=true;
    $( "#datepicker" ).datepicker( "disable" );
    $( "#datepicker" ).datepicker( "refresh" );
  $.post("/"+lang+"/ajax/request/verify/"+pid,{'data1':period[0],'data2':period[1]},function(data){
     if(data.message==1){
           //valid range
        $('.success-status').show();
        period= new Array(null,null);
        $.fancybox.close();
        window.location.href +="";
     }else{
        //invalid range
        $('.invalid-status').show();
        $('.data1').html("-");
        $('.data2').html("-");
      }
        $( "#datepicker" ).datepicker( "enable" );
        $( "#datepicker" ).datepicker( "refresh" ); 
        ajaxprocesing=false;
        
    },'json');
   } 
}