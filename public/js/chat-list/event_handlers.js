function show_chat_pod() {
    $("#chat-pod").css("display", "block");
    $("#chat-wall").css("display", "block");
    $("#chat-textarea-container").css("display", "block");
    // $("#keyboard-area").css("display", "block");
    $("#collapse-chat-pod-icon").css("display", "block");
    $("#expand-chat-pod-icon").css("display", "none");

    set_chat_list_borders();
    set_chat_menu_bar_borders();
}