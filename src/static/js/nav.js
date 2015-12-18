// Change highlighted navigation tab and switch main content section accordingly
$(document).ready(function () {
        $('#navbar > .navbar-nav > li').click(function (e) {
            e.preventDefault();
            $('#navbar > .navbar-nav > li').removeClass('active');
            $(this).addClass('active');
            var to_id = $(this).attr("id");
            if (to_id.slice(0,6) == "navbar"){
            	$("#page-content").load("/view/" + to_id.slice(7) + ".php")
            } else {
            	throw "huh? id should be something like navbar-home.";
            }
        });
    });

// This function does this: clicking brand name is equivalent to clicking home tab
function clickHome(){
    $("#navbar > .navbar-nav > #navbar-home").trigger("click");
}