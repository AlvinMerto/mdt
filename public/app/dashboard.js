$(document).on("click", ".editkpi", function () {
    var outcomeid = $(this).data('outcomeid');
    kpi_window(outcomeid);
});

$(document).on("blur", ".fieldtext", function () {
    // var table       = "the_values";
    // var keyid_field = "valuesid";

    var table = $(this).data("table");
    var keyid_field = $(this).data("keyid_fld");

    var keyfield = $(this).data('field');
    var keyid = $(this).data('dbid');
    var thevalue = $(this).val();

    var dis = $(this);

    dis.removeClass("itemsaved");
    dis.removeClass("itemnotsave");

    save_("savefunc", {
        table: table,
        keyid_fld: keyid_field,
        keyfield: keyfield,
        keyid: keyid,
        thevalue: thevalue
    }, function (data) {
        if (data) {
            dis.addClass("itemsaved");

            setTimeout(function () {
                dis.removeClass("itemsaved");
            }, 500);
        } else {
            dis.addClass("itemnotsave");

            setTimeout(function () {
                dis.removeClass("itemnotsave");
            }, 5000);
        }
    });
});

$(document).on("click", ".viewmadet", function () {
    var maid = $(this).data("mid");
    // ma_details
    $(document).find("#ma_details").children().remove();
    get_("maidetails", { mid: maid }, function (data) {
        $(data).appendTo("#ma_details");
    });
});

$(document).on("click", ".changeoutcomenameclick", function () {
    var outcomeid = $(this).data("outcomeid");

    $(document).find("#outcometxtfield").children().remove();

    get_("outcomefld", { outcomeid: outcomeid }, function (data) {
        $(data['outcomefld']).appendTo("#outcometxtfield");
    });
});

$(document).on("change", ".selectlevel", function () {
    var level = $(this).val();

    if (level == 3) {
        $(document).find("#level2_select").show();
        $(document).find("#level1_select").hide();
    } else if (level == 2) {
        $(document).find("#level2_select").hide();
        $(document).find("#level1_select").show();
    } else if (level == 1) {
        $(document).find("#level2_select").hide();
        $(document).find("#level1_select").hide();
    }
});

$(document).on("change", "#polytype", function () {

    if ($(this).val() == "line") {
        $(document).find("#geoname").html("Geopoints");
        $(document).find("#longitude_div").hide();
    } else if ($(this).val() == "point") {
        $(document).find("#geoname").html("Latitude");
        $(document).find("#longitude_div").show();
    }
});

$(document).on("click", ".fakesave", function () {
    alert("Successfully Saved");
})

$(document).on("click",".bring_down", function() {
    var m_id = $(this).data('arrowdata');

    $(document).find(".devpart"+m_id).children().remove();
    $("<span> Loading... </span>").appendTo(".devpart"+m_id);

    get_("prjsunderdevpart", {devpart : m_id }, function(data) {
        $(document).find(".devpart"+m_id).children().remove();
        $(document).find(".devpart"+m_id).children().remove();
        $(data).appendTo(".devpart"+m_id);
    });
});

$('#fileInput').on('change', function () {
    var file_data = $('#fileInput').prop('files')[0];
    var aid = $(document).find("#aid").val();

    var form_data = new FormData();
    form_data.append('file', file_data);
    form_data.append("aid", aid);

    $.ajax({
        url: '/uploadlogo', // Laravel route
        type: 'POST',
        data: form_data,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $('#uploadStatus').html('Uploading...');
        },
        success: function (response) {
            $('#uploadStatus').html('Upload successful: ' + response.filename);
        },
        error: function () {
            $('#uploadStatus').html('Upload failed.');
        }
    });
});

$("#thecsvfile").on("change", function () {
    var file_data          = $('#thecsvfile').prop('files')[0];
    var masteridhide       = $(document).find("#masteridhide").val();

    var form_data          = new FormData();
        form_data.append('file', file_data);
        form_data.append("masteridhide", masteridhide);

    $.ajax({
        url: '/savelocation', // Laravel route
        type: 'POST',
        data: form_data,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $('#csvuploadStatus').html('Uploading...');
        },
        success: function (response) {
            console.log(response);
            $('#csvuploadStatus').html('Upload successful: ' + response.filename);
        },
        error: function (a,b,c) {
            $('#csvuploadStatus').html('Upload failed.');
        }
    });
});

var kpiid = null;
var outcomeid = null;
var displayto = null;
var val_id    = null; // the_deep_value primary ID

$(document).on("click", ".kpitab", function () {
    kpiid = $(this).data('kpiid');
    outcomeid = $(this).data("outcomeid");
    displayto = $(this).data('displayto');

    $(document).find(".disaggregationdiv").children().remove();
    get_("disagg", { kpiid: kpiid, outcomeid: outcomeid }, function (data) {
        $(data).appendTo("#" + displayto);
    });
});

$(document).on("click", ".disagg_dets", function () {
    val_id    = $(this).data("dis_val");
    var outcomeid = $(this).data("outcomeid");

    $(document).find("#disagg_details").children().remove();

    $(this).siblings().removeClass("disagg_listli_selected");
    $(this).addClass("disagg_listli_selected");

    get_("disagg_details", { val_id: val_id, outcomeid: outcomeid }, function (data) {
        $(data).appendTo("#disagg_details");
    });

});

$(document).on("click", "#gd_list li", function () {
    var loc_id = $(this).data("loc_id");
    // show_location
    $("#show_location").children().remove();

    $(this).siblings().removeClass("selected");
    $(this).addClass("selected");

    get_("show_location", { loc_id: loc_id }, function (data) {
        $(data).appendTo("#show_location");
    })
});

$(document).on("click", "#fd_list li", function (data) {
    var geolocationid = $(this).data('loc_id');

    $("#fd_show").children().remove();

    $(this).siblings().removeClass("selected");
    $(this).addClass("selected");

    get_("show_financials", { geolocationid: geolocationid }, function (data) {
        $(data).appendTo("#fd_show");
    });
});

$(document).on("click", "#addnewlocation", function () {
    $(".ul_listing li").removeClass("selected");

    $("#show_location").children().remove();
    get_("show_location", { loc_id: 'loc_id', new: "new" }, function (data) {
        $(data).appendTo("#show_location");
    })
});

$(document).on("input paste change", "#projectamount", function () {
    var len = $(document).find("#fd_list li").length;
    var d_val = $(this).val();

    // amountperprojectsite
    var projpersite = (d_val / len);
    $(document).find("#amountperprojectsite").val(projpersite).blur();
});

$(document).on("change", "#computeinmil", function () {
    var prjamt = $(document).find("#projectamount").val();

    var total = 0;

    if ($(this).is(":checked")) {
        total = (prjamt * 1000000);
    } else {
        total = (prjamt / 1000000);
    }

    $(document).find("#projectamount").val(total).change().blur();

    // $(document).find("#projectamount").change(); 
});

$(document).on("click", "#provide_btnupdate", function () {
    var theupdate = $(document).find("#updatetext").val();
    var masterid = $(this).data('masterid');

    post_("saveupdate", { theupdate: theupdate, masterid: masterid }, function (data) {
        get_updates(masterid);
    });
});

function get_updates(masterid) {
    $(document).find("#showupdates").children().remove();
    get_("getupdates", { masterid: masterid }, function (data) {
        $(data).appendTo("#showupdates");
    });
}

var theyear = null;
var thelocation = null;
// var val_id = null;

$(document).on("click", ".tabindex_year li", function () {
    // val_id = $(this).data("dvid");

    theyear = $(this).data("theval"); // year

    thelocation = $(document).find("#thelocation").val();

    if (thelocation == 0) {
        thelocation = null;
        return;
    }

    $(document).find("#currentextfld").children().remove();

    $(this).siblings().removeClass("disagg_listli_selected");
    $(this).addClass('disagg_listli_selected');

    get_("get_year_val", { val_id: val_id, theyear: theyear, thelocation: thelocation }, function (data) {
        $(data).appendTo("#currentextfld");
    });
});

$(document).on("change",".thelocation", function() {
    // if (theyear == null) { return; }
    $(document).find("#currentextfld").children().remove();

    var loc = $(this).val();

    if (loc == 0) {
        $(document).find("#currentextfld").html("");
        $(document).find("#currentextfld").children().remove();
        $(document).find("#addinfo_display").html("");
        $(document).find("#addinfo_display").children().remove();
        return;
    }

    $(document).find("#currentextfld").html("loading...");
    $(document).find("#addinfo_display").html("loading...");

    get_("get_year_val", { val_id: val_id, theyear: theyear, thelocation: loc }, function (data) {
        $(document).find("#currentextfld").html("");
        $(document).find("#currentextfld").children().remove();
        $(data).appendTo("#currentextfld");
    });

    get_("addinfo_display", { dv_id : val_id , location : loc }, function(data) {
        $(document).find("#addinfo_display").html("");
        $(document).find("#addinfo_display").children().remove();
        $(data).appendTo("#addinfo_display");
    });
});

$(document).on("click", ".savenewvalue", function () {
    var thecurrent = $(document).find("#currentval").val();
    var baseline   = $(document).find("#baselineval").val();
    var target     = $(document).find("#targetval").val();
    var name       = $(document).find("#nameval").val();

    thelocation = $(document).find("#thelocation").val();

    post_("savenew_year", { theyear : theyear, 
                            thelocation : thelocation, 
                            val_id : val_id, 
                            thecurrent : thecurrent,
                            outputid : kpiid,
                            baseline : baseline,
                            target : target,
                            name : name
                            }, function (data) {
        if (data) {
            alert("New data for " + theyear + " for Region " + thelocation + " has been saved");
        }
    });
});

$(document).on("click","#savethisnewlocation", function() {
    var nameval         = $(document).find("#nameval").val();
    var baselineval     = $(document).find("#baselineval").val();
    var targetval       = $(document).find("#targetval").val();
    
    var loc             = $(document).find("#thelocation").val();

    post_("savedeep_value", { nameval : nameval , 
                              baselineval : baselineval, 
                              targetval : targetval,
                              val_id : kpiid,
                              location : loc }, function(data) {
       if (data == true) { 
            alert("New data Saved!");
            $(document).find("#savethisnewlocation").remove();
       }
    });
});

$(document).on("click", "#addnewdisagg", function () {
    $(document).find("#disagg_details").children().remove();

    get_("new_disagg", {}, function (data) {
        $(data).appendTo("#disagg_details");
    });
    
    // get_("disagg_details", { val_id: null, outcomeid: outcomeid }, function (data) {
    //     $(data).appendTo("#disagg_details");
    // });
});

$(document).on("click", "#savenewdisagg", function () {
    var disaggtxt   = $(document).find("#disaggtxt").val();
    // var baselinetxt = $(document).find("#baselinetxt").val();
    // var targettxt   = $(document).find("#targettxt").val();
    // var currenttxt  = $(document).find("#currenttxt").val();
    // var yeartxt     = $(document).find("#yeartxt").val();
    // var locationtxt = $(document).find("#locationtxt").val();
    
    var fkoutputid = kpiid;

    post_("savenewdisagg", { disaggtxt: disaggtxt }, function (data) {
        if (data) {
            alert("New Disaggregation has been saved!");
            $(document).find(".disaggregationdiv").children().remove();
            get_("disagg", { kpiid: kpiid, outcomeid: outcomeid }, function (data) {
                $(data).appendTo("#" + displayto);
            });
        }
    })
});


$(document).on("click", "#savenewoutcome", function () {
    var thename = $(document).find("#theoutcomename").val();
    var agendaid = $(this).data('agendaid');
    var yearstart = $(document).find("#yearstart").val();
    var yearend = $(document).find("#yearend").val();
    var weight = 0;

    post_("savenewoutcome", {
        thename: thename,
        agendaid: agendaid,
        yearstart: yearstart,
        yearend: yearend,
        weight: weight
    }, function (data) {
        if (data) {
            alert("New Outcome has been saved.");
        }
    });
});

var theoutcome_ = null;
$(document).on("click", ".addnewoutcome_btn", function () {
    theoutcome_ = $(this).data("outcomeid");
});

$(document).on("click",".deletethis", function() {
    var tbl  = $(this).data("tbl");
    var kid  = $(this).data("keyid");
    var kfld = $(this).data("keyfld");
    
    var clean  = $(this).data("clean");
    var remove = $(this).data("remove");
    var conf = confirm("Are you sure you want to delete?");

    if (!conf) {
        return;
    }

    post_("deleterbme", { tbl:tbl , kid:kid, kfld:kfld}, function(data){
        if (data) {
            $(document).find(remove).remove();
            $(document).find(clean).children().remove();
        }
    });
});

$(document).on("click", ".saveindicator", function () {
    var indicatorname = $(document).find("#indicatorname").val();
    var indicatordefinition = $(document).find("#indicatordefinition").val();
    var datasource = $(document).find("#datasource").val();

    var weightoutput = $(document).find("#weightoutput").val();
    var frequencyoutcome = $(document).find("#frequencyoutcome").val();
    var typeofoutcome = $(document).find("#typeofoutcome").val();

    post_("saveindicator", {
        theoutcome_: theoutcome_,
        indicatorname: indicatorname,
        indicatordefinition: indicatordefinition,
        datasource: datasource,
        weightoutput: weightoutput,
        frequencyoutcome: frequencyoutcome,
        typeofoutcome: typeofoutcome
    }, function (data) {
        if (data) {
            alert("New indicator has been saved");
        }
    });
});