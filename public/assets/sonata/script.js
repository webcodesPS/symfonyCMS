$(document).ready(function() {

    $(".sonata-ba-list-field-html").each(function () {
        text = $(this).text();
        if (text.length > 100) {
            $(this).html(text.substr(0, 100).trim() + '...');
        }
    });

    ['/pl', '/en'].forEach((v, k) => {
        $('.nav.navbar-nav > li:nth-child('+ (k+1).toString() +') > a')
            .attr('href', v + window.location.pathname.slice(3));
    });

});