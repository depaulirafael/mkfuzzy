$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() !== 0) {
            $('#up').fadeIn();
        } else {
            $('#up').fadeOut();
        }
    });
    $('#up').click(function () {
        $('body,html').animate({scrollTop: 0}, 800);
    });
});


