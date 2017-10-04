// function set_chat_msg_seen_log_fetcher() {
// // Get an update every second.
//     fetch_chat_msg_seen_logs();
//     chat_msg_seen_log_fetch_handler = setInterval(fetch_chat_msg_seen_logs, 2000);
// }

function fetch_chat_msg_seen_logs() {
    //
    var chat_threads = $(".chat-threads");

    for (i = 0; i < chat_threads.length; i++) {
        fetch_chat_msg_seen_log(chat_threads[i]);
    }

}

function fetch_chat_msg_seen_log(chat_thread) {
    //
    $(chat_thread).attr("is-chat-msg-seen-log-fetching", "yes");

    //
    var chat_thread_id = $(chat_thread).attr("thread-id");
    var latest_thread_chat_msg_seen_log_date = get_latest_thread_chat_msg_seen_log_date(chat_thread);

    var crud_type = "fetch";
    var request_type = "GET";
    var key_value_pairs = {
        fetch : "yes",
        chat_thread_id: chat_thread_id,
        latest_thread_chat_msg_seen_log_date: latest_thread_chat_msg_seen_log_date
    };


    var obj = new ChatMsgSeenLog(crud_type, request_type, key_value_pairs);
    obj.fetch();
}

function get_latest_thread_chat_msg_seen_log_date(chat_thread) {
//chat-thread-latest-chat-msg-date
    var latest_thread_chat_msg_date = $(chat_thread).attr("chat-thread-latest-chat-msg-date");

    if (chat_thread == null ||
        latest_thread_chat_msg_date == null ||
        latest_thread_chat_msg_date == "") {

        return "2010-09-11 10:54:45";
    }
    else {
        return latest_thread_chat_msg_date;
    }
}

function is_chat_msg_seen_log_fetching() {
    //
    var chat_threads = $(".chat-threads");

    for (i = 0; i < chat_threads.length; i++) {
        var is_fetching = $(chat_threads[i]).attr("is-chat-msg-seen-log-fetching");

        if (is_fetching == "yes") { return true; }
    }

    return false;
}