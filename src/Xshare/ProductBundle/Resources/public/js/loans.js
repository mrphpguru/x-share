$(document).ready(function(){
    //pagination for the loan requests
     $(".pager-loans a").live('click', function() {
        var page = $(this).attr("value");   
        paginate(page);
     });    
     
     //ajax filter
     $("#filter-date, #filter-title").click(function() {
        var criteria = $(this).attr("id").replace("filter-", "");
        var selectedId = $(this).attr("id");
        $("ul.filter li").each(function(){
            if ($(this).attr("id") != selectedId) {
                $(this).removeClass("desc");
                $(this).removeClass("asc");
            }
        });
        var order = '';
        if ($(this).hasClass("desc")) {
            $(this).removeClass("desc");
            $(this).addClass("asc");
            order = 'ASC';
        }
        else if ($(this).hasClass("asc")) {
            $(this).removeClass("asc");
            $(this).addClass("desc");
            order = 'DESC';
        } else {
           $(this).addClass("asc");
           order = 'ASC';
        }
        var url = $.url();//the url object
        var path = url.attr('path').split("/"); //the parameters of the url
        $.ajax({
            url: '/' + path[1] + '/' + path[3] + '/requests/filter/'+ criteria +'/'+ order +'/1', //path contains the id from the url and the language
            success: function(msg) {
                $(".requests-list").remove();
                $(".entity-block-list").append(msg);
                $(".entity-block-list").attr('id', criteria + "-" + order);
            }
        });
    });
    
    //accept loan
    
    //decline loan
    $(".decline, .accept").live('click', function(){
        var action = '';
        if ($(this).hasClass("decline")) {
            action = 'decline';
        } else if ($(this).hasClass("accept")) {
            action = 'accept';
        }
        var loan_id = $(this).parent("div").attr("id");
        //var container = $(this).parent("div").parent(".entity-loans");
        var container = $(this).parent().parent();
        var url = $.url();//the url object
        var path = url.attr('path').split("/"); //the parameters of the url
        $.ajax({
            url: '/'+ path[1] + '/request/'+ path[3] + '/' + loan_id + '/' + action,
            success: function(msg) {
               container.prev().remove();
               container.remove();
               console.log(container);
               paginate(1);
               // window.location.href +="";
               /*container.empty();
                container.hide();
                container.append(msg);
                if ($(".close").hasClass("refresh")) {
                    paginate(1);
                    $(".entity-show").after(msg);
                    $(".close").addClass("hide");
                    $(".close").removeClass("close");
                } else {
                    container.show();
                }*/
            }
        });
    });
    
    $(".close").live('click', function(){
        $(this).parent("div").parent(".entity").remove();
        paginate(1);
        if ($(".requests-list .entity-loans").length == 0) {
            $(".entity-block-list").prev("h3").remove();
            $(".entity-block-list").remove();
        }
    })
    
    $(".hide").live('click', function(){
        $(this).parent(".loan-result-message").remove();
    });
  
});

function paginate(page) {
    var sorted = $(".entity-block-list").attr("id");
    var url = $.url();//the url object
    var path = url.attr('path').split("/"); //the parameters of the url
    var data = sorted.split("-");
    var criteria = data[0];
    var order = data[1];
    url = '/' + path[1] + '/' + path[3] + '/requests/filter/'+ criteria +'/'+ order +'/' + page; //path contains the id from the url and the language
    $.ajax({
        url: url,
        success: function(msg) {
            $(".requests-list").remove();
            $(".entity-block-list").append(msg);
            if (criteria != null) {
                $(".entity-block-list").attr('id', criteria + "-" + order);
            }
            if ($(".requests-list .entity-loans").length == 0) {
                $(".entity-block-list").prev("h3").remove();
                $(".entity-block-list").remove();
            }
        }
    });
}