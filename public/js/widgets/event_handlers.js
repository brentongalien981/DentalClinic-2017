function set_widget_position() {

    var y_pos = 0 - parseInt($(window).scrollTop());
    var x_pos = 0 - parseInt($(window).scrollLeft());


    $("#the-widget-container").css("right", x_pos + "px");
    $("#the-widget-container").css("bottom", y_pos + "px");
}

function set_notifications_position() {

    var y_pos = 70 - parseInt($(window).scrollTop());
    var x_pos = 0 - parseInt($(window).scrollLeft());


    $("#b-widget").css("right", x_pos + "px");
    $("#b-widget").css("bottom", y_pos + "px");
}