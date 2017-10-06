$("#send-chat-button").click(function () {
    // get_csrf_token();
    create_chat_message();

    should_chat_msg_seen_logs_update = true;
    // update_chat_msg_seen_logs();
});



//
$("#expand-chat-pod-icon").click(function () {

    if (chat_thread_id == 0) { return; }

    $("#chat-pod-section").css("display", "block");
    $("#expand-chat-pod-icon").css("display", "none");
    $("#collapse-chat-pod-icon").css("display", "block");

    set_chat_widget_component_borders();
});

$("#collapse-chat-pod-icon").click(function () {
    $("#chat-pod-section").css("display", "none");
    $("#expand-chat-pod-icon").css("display", "block");
    $("#collapse-chat-pod-icon").css("display", "none");

    set_chat_widget_component_borders();
});