$( document ).ready(function() {

    $(".focus").bind("mouseenter focusin focus", function() {
        $(this).addClass("focused");
    });

    $(".focus").bind("mouseleave focusout blur", function() {
        $(this).removeClass("focused");
    });

    $(".focus").click(function() {
        window.location = $(this).find("a").attr("href");
    });

});

