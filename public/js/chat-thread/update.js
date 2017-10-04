function update_chat_threads() {
    var chat_threads = $(".chat-threads");

    for (i = 0; i < chat_threads.length; i++) {
        var a_chat_thread = chat_threads[i];

        update_chat_thread(a_chat_thread);

    }
}

function update_chat_thread(a_chat_thread) {
    //
    $(a_chat_thread).attr("is-chat-thread-updating", "yes");

    var crud_type = "update";
    var request_type = "POST";
    var chat_thread_id = $(a_chat_thread).attr("thread-id");
    var latest_thread_chat_msg_seen_log_date = $(a_chat_thread).attr("chat-thread-latest-chat-msg-date");


    var key_value_pairs = {
        read: "yes",
        chat_thread_id: chat_thread_id,
        latest_thread_chat_msg_seen_log_date: latest_thread_chat_msg_seen_log_date
    };



    var obj = new ChatThread(crud_type, request_type, key_value_pairs);
    obj.update();
}