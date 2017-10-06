$("#chat-with-us-button").click(function () {
    create_chat_thread();

    chat_thread_id = -69;

    $("#expand-chat-pod-icon").css("display", "none");
    $("#collapse-chat-pod-icon").css("display", "block");
});

