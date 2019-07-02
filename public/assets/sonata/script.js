$(document).ready(function() {

    $(".sonata-ba-list-field-html").each(function () {
        text = $(this).text();
        if (text.length > 100) {
            $(this).html(text.substr(0, 100).trim() + '...');
        }
    });

})