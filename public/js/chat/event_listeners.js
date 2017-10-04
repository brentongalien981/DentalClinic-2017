$("#send-chat-button").click(function () {
    // get_csrf_token();
    create_chat_message();

    should_chat_msg_seen_logs_update = true;
    // update_chat_msg_seen_logs();
});