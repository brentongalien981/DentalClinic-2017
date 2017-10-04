function update_chat_msg_seen_logs() {
    //

    var crud_type = "update";
    var request_type = "POST";
    var chat_message_latest_date = get_chat_message_latest_date();


    var key_value_pairs = {
        update: "yes",
        chat_thread_id: chat_thread_id,
        chat_message_latest_date: chat_message_latest_date
    };



    var obj = new ChatMsgSeenLog(crud_type, request_type, key_value_pairs);
    obj.update();
}