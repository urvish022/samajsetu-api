(function ($) {
    "use strict";
	
	/* Theme switcher */
	$("#switcher-toggle").on("click", function() {
        if ($(this).hasClass("switcher-open")) {
            $("#theme-switcher").animate({
                left: "0px"
            }, 500);
            $(this).removeClass("switcher-open").addClass("switcher-close")
        } else {
            $("#theme-switcher").animate({
                left: "-208px"
            }, 500);
            $(this).removeClass("switcher-close").addClass("switcher-open")
        }
    });
	
    $("button[data-theme]").click(function() {
        $("#color-switcher").attr("href", $(this).data("theme"))
    })
	
})(jQuery);