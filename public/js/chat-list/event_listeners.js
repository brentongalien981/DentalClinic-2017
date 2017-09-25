$("#chat-list-icon").click(function () {

    if ($("#chat-list").css("display") == "none") {
        $("#chat-list").css("display", "block");
    }
    else {
        $("#chat-list").css("display", "none");
    }

    // set_chat_list_borders();
    // set_chat_menu_bar_borders();
    // update_app_settings();
});