// Change highlighted navigation tab and switch main content section accordingly)
/* $(document).ready(function () {
        $('#navbar > .navbar-nav > li').click(function (e) {
            e.preventDefault();
            $('#navbar > .navbar-nav > li').removeClass('active');
            $(this).addClass('active');
            var to_id = $(this).attr("id");
            if (to_id.slice(0,6) == "navbar"){
            	$("#page-content").load("/view/" + to_id.slice(7) + ".php")
            } else {
            	throw "Something is wrong.";
            }
        });
    }); */

// add active class to navbar li element when page loads
$(document).ready(function() {
    $('.navbar-nav a[href="' + this.location.pathname + '"]').parent().addClass('active');
});