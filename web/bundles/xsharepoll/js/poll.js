$(document).ready(function(){
    $('#pollresult_form').submit(function(){
        $.post($(this).attr('action'),$(this).serialize(), function(data){
            $('#poll-continer-block').html(data);
        })
        return false;
    })
})