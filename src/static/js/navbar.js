$(document).ready(function () {
        $('#navbar > .navbar-nav > li').click(function (e) {
            e.preventDefault();
            $('#navbar > .navbar-nav > li').removeClass('active');
            $(this).addClass('active');                
        });            
    });