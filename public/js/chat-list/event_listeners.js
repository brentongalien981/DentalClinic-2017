$("#chat-list-icon").click(function () {

    if ($("#chat-list").css("display") == "none") {
        $("#chat-list").css("display", "block");
    }
    else {
        $("#chat-list").css("display", "none");
    }

    set_chat_widget_component_borders();

    // set_chat_list_borders();
    // set_chat_menu_bar_borders();
    // update_app_settings();
});





// $("#chat-list").on( 'mousewheel DOMMouseScroll', function ( e ) {
//     var e0 = e.originalEvent,
//         delta = e0.wheelDelta || -e0.detail;
//
//     this.scrollTop += ( delta < 0 ? 1 : -1 ) * 30;
//     e.preventDefault();
// });
//
// $("#chat-wall").on( 'mousewheel DOMMouseScroll', function ( e ) {
//     var e0 = e.originalEvent,
//         delta = e0.wheelDelta || -e0.detail;
//
//     this.scrollTop += ( delta < 0 ? 1 : -1 ) * 30;
//     e.preventDefault();
// });


