function kpi_window(outcomeid) {
    // $(document).find("#kpi_window").children().remove();
    $(document).find("#theindicators").children().remove();
   
    get_("get_kpi_window",{outcomeid:outcomeid}, function(data) {
        // $(data).appendTo("#kpi_window");
        $(data['indicators']).appendTo("#theindicators");
        
    });
}

function get_(getwhat,d, somefunc = false) {
    $.ajax({
        url      : url+"/"+getwhat,
        type     : "get",
        data     : d,
        dataType : "json",
        success  : function(data) {
            if (somefunc != false) {
                somefunc(data);
            }
        } 
    });
}

function post_(getwhat,d, somefunc = false) {
    $.ajax({
        url      : url+"/"+getwhat,
        type     : "post",
        data     : d,
        dataType : "json",
        success  : function(data) {
            if (somefunc != false) {
                somefunc(data);
            }
        } 
    });
}

function save_(script, d, somefunc = false) {
    $.ajax({
        url      : url+"/"+script,
        type     : "post",
        data     : d,
        dataType : "json",
        success  : function(data) {
            if (somefunc != false) {
                somefunc(data);
            }
        }, error : function(a,b,c) {
            console.log(a);
            console.log(b);
            console.log(c);
        }
    });
}