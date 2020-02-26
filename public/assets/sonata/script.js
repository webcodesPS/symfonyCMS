$(document).ready(function() {

    $(".sonata-ba-list-field-html").each(function () {
        text = $(this).text();
        if (text.length > 100) {
            $(this).html(text.substr(0, 100).trim() + '...');
        }
    });

    ['/pl', '/en'].forEach((v, k) => {
        $('.navbar-custom-menu > ul > li:nth-child('+ (k+1).toString() +') > a')
            .attr('href', v + window.location.pathname.slice(3));
    });

});