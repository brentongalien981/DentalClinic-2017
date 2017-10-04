function read_chat_msg_seen_logs() {
    var chat_threads = $(".chat-threads");
    var length = chat_threads.length;

    for (i = 0; i < length; i++) {
        var chat_thread_id = $(chat_threads[i]).attr("thread-id");
        read_chat_msg_seen_log(chat_thread_id);
    }
}

function read_chat_msg_seen_log(chat_thread_id) {
    var crud_type = "read";
    var request_type = "GET";


    var key_value_pairs = {
        read: "yes",
        chat_thread_id: chat_thread_id
    };



    var obj = new ChatMsgSeenLog(crud_type, request_type, key_value_pairs);
    obj.read();
}

function pseudo_read_chat_msg_seen_log(num_of_new_chat_msgs) {
    // window.alert("TODO: METHOD: pseudo_read_chat_msg_seen_log()");
    pseudo_set_chat_msgs_counter(num_of_new_chat_msgs);
}