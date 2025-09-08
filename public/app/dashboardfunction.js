function kpi_window(outcomeid) {
    // $(document).find("#kpi_window").children().remove();
    $(document).find("#theindicators").children().remove();

    get_("get_kpi_window", { outcomeid: outcomeid }, function (data) {
        // $(data).appendTo("#kpi_window");
        $(data['indicators']).appendTo("#theindicators");

    });
}

function get_(getwhat, d, somefunc = false) {
        //     headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        // },
    $.ajax({
        url: url + "/tracker/" + getwhat,
        type: "get",
        data: d,
        dataType: "json",
        success: function (data) {
            if (somefunc != false) {
                somefunc(data);
            }
        }, error : function(a,b,c) {
            console.log(a+b+c);
        }
    });
}

function post_(getwhat, d, somefunc = false) {
    $.ajax({
        url: url + "/tracker/" + getwhat,
        type: "post",
        data: d,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        success: function (data) {
            if (somefunc != false) {
                somefunc(data);
            }
        }
    });
}

function save_(script, d, somefunc = false) {
    $.ajax({
        url: url + "/tracker/" + script,
        type: "post",
        data: d,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        success: function (data) {
            if (somefunc != false) {
                somefunc(data);
            }
        }, error: function (a, b, c) {
            console.log(a);
            console.log(b);
            console.log(c);
        }
    });
}