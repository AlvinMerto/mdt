var agenda = ["the_agenda1","the_agenda2","the_agenda3","the_agenda4","the_agenda5","the_agenda6","the_agenda7","the_agenda8","the_agenda9","the_agenda10"];

var marginleft    = 0;
var bigslide_pull = 0;
var count         = 0;

var slidewith     = 0;
$(document).on("click",".prevnext_btn",function() {
    remove_class();
    var id = $(this).attr("id");
    
    // var bgs = $(document).find(".bigpix_ul li");

    // if (id == "nextbtn") {
    //     marginleft    = (marginleft-412);
    //     bigslide_pull = (bigslide_pull-1111);
    //     count++;
    // } else if (id == "prevbtn") {
    //     marginleft    = (marginleft+412);
    //     bigslide_pull = (bigslide_pull+1111);
    //     count--;
    // }

    theplay(id);
        // var agendalist   = $(document).find(".agendalist");
        // var thebig_slide = $(document).find("#thebig_slide");

        // agendalist.animate({
        //     "margin-left":marginleft+"px"
        // }, 500);

        // thebig_slide.animate({
        //     "margin-left":bigslide_pull+"px"
        // });
        
        // bgs.hide();
        // bgs.eq(count).show();
        // $(document).find(".thebgdiv").addClass(agenda[count]);
        // $(document).find(".thebutton_div").addClass(agenda[count]);
});

$(document).ready(function() {
    $(document).find(".thebgdiv").addClass(agenda[0]);
    $(document).find(".thebutton_div").addClass(agenda[0]);
    $(document).find(".bigpix_ul li").eq(count).show();

    var playing = setInterval(function(){
        theplay("nextbtn");
    },5000);

    var infoholder = $(document).find(".infoholder");
    slidewith      = infoholder.width();
    $(document).find("#thebig_slide li").width(slidewith);
});

function remove_class() {
    agenda.forEach((k) => {
        $(document).find(".thebgdiv").removeClass(k);
        $(document).find(".thebutton_div").removeClass(k);
    });
}

function theplay(id) {

    if (id == "nextbtn") {
        marginleft    = (marginleft-412);
        bigslide_pull = (bigslide_pull-1050); //1305
        count++;
    } else if (id == "prevbtn") {
        marginleft    = (marginleft+412);
        bigslide_pull = (bigslide_pull+1050); //1305
        count--;
    }

    if (count == 9) {
        count         = 0;
        marginleft    = 0;
        bigslide_pull = 0;
        id = "prevbtn";
    } else {
        id = "nextbtn";
    }

    remove_class();
    var agendalist   = $(document).find(".agendalist");
    var thebig_slide = $(document).find("#thebig_slide");

    var bgs = $(document).find(".bigpix_ul li");

    agendalist.animate({
        "margin-left":marginleft+"px"
    }, 500);

    thebig_slide.animate({
        "margin-left":bigslide_pull+"px"
    });
    
    bgs.hide();
    bgs.eq(count).show();

    
    $(document).find(".thebgdiv").addClass(agenda[count]);
    $(document).find(".thebutton_div").addClass(agenda[count]);
}