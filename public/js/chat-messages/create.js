function create_chat_message() {
    var chat_msg = $("#chat-textarea").val();

    //
    if (chat_msg.trim().length <= 0) { return; }

    //
    var crud_type = "create";
    var request_type = "POST";

    var key_value_pairs = {
        create: "yes",
        message: chat_msg,
        chat_thread_id: chat_thread_id
    };

    var obj = new ChatMessage(crud_type, request_type, key_value_pairs);
    obj.create();
}