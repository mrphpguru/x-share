$(document).ready(function(){
    $("#filter-date, #filter-title, #filter-unities").click(function() {
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
            url: '/' + path[1] + '/category/filter/'+ criteria +'/'+ order +'/1',
            success: function(msg) {
                $(".entity-items").remove();
                $(".pager").remove();
                $(".category-list").append(msg);
                $(".entity-items").attr('id', criteria);
                $(".entity-items").attr('id', criteria + "-" + order);
            }
        });
    });
    
    $(".pager li a").live('click', function() {
        var sorted = $(".entity-items").attr("id");
        var url = $.url();//the url object
        var path = url.attr('path').split("/"); //the parameters of the url
        var page = $(this).attr("value");
        var url;        
        if (sorted != null) {
            var data = sorted.split("-");
            var criteria = data[0];
            var order = data[1];
            url = '/' + path[1] + '/category/filter/'+ criteria +'/'+ order +'/' + page;
        }
        else {
            url = '/' + path[1] + '/category/paginate/' + page;
        }
        $.ajax({
            url: url,
            success: function(msg) {
                $(".entity-items").remove();
                $(".pager").remove();
                $(".category-list").append(msg);
                if (criteria != null) {
                    $(".entity-items").attr('id', criteria + "-" + order);
                }
            }
        });
    });
    
})