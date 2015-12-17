$(document).ready(function () {
        $('#navbar > .navbar-nav > li').click(function (e) {
            e.preventDefault();
            // change highlighted navbar tab
            $('#navbar > .navbar-nav > li').removeClass('active');
            $(this).addClass('active');
            // switch page content
            var to_id = $(this).attr("id");
            if (to_id.slice(0,6) == "navbar"){
            	var page_content = document.getElementById('page-content');
            	var to_content = document.getElementById(to_id.slice(7) + "-page");
            	page_content.innerHTML = to_content.innerHTML;
            } else {
            	throw "huh? id should be something like navbar-home.";
            }
        });            
    });