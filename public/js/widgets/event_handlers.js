function set_widget_position() {

    var y_pos = 0 - parseInt($(window).scrollTop());
    var x_pos = 0 - parseInt($(window).scrollLeft());


    $("#the-widget-container").css("right", x_pos + "px");
    $("#the-widget-container").css("bottom", y_pos + "px");



    if ((!is_widget_animated) &&
        ($("#chat-list").css("display") == "none") &&
        ($("#chat-pod-section").css("display") == "none")) {

        // Remove old animation.
        $("#the-widget-container").removeClass("fadeIn");


        // Do hide animation.
        $("#the-widget-container").addClass("fadeOut");


        //
        $("#the-widget-container").css("display", "none");


        is_widget_animated = true;






        setTimeout(function () {

            //
            $("#the-widget-container").css("display", "initial");


            // Remove old animation.
            $("#the-widget-container").removeClass("fadeOut");


            // Do show animation.
            $("#the-widget-container").addClass("fadeIn");


            is_widget_animated = false;
        }, 100);
    }
}

function set_notifications_position() {

    var y_pos = 70 - parseInt($(window).scrollTop());
    var x_pos = 0 - parseInt($(window).scrollLeft());


    $("#b-widget").css("right", x_pos + "px");
    $("#b-widget").css("bottom", y_pos + "px");
}