function show_chat_pod() {
    if (chat_thread_id == 0) { return; }

    $("#chat-pod-section").css("display", "block");
    // $("#collapse-chat-pod-icon").css("display", "block");
    // $("#expand-chat-pod-icon").css("display", "none");

    // set_chat_list_borders();
    // set_chat_menu_bar_borders();
}