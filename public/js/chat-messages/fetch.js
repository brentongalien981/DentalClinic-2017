async function initialize_fetch_chat_messages() {
    while (!can_chat_messages_fetch) {
        await my_sleep(1000);
    }

    set_chat_messages_fetcher();
}

function set_chat_messages_fetcher() {
    // Get an update every second.
    chat_messages_fetch_handler = setInterval(fetch_chat_messages, 2000);
}

function fetch_chat_messages() {
    var latest_chat_message_date = get_chat_message_latest_date();

    var crud_type = "fetch";
    var request_type = "GET";
    var key_value_pairs = {
        fetch : "yes",
        latest_chat_message_date: latest_chat_message_date,
        chat_thread_id: chat_thread_id
    };


    var obj = new ChatMessage(crud_type, request_type, key_value_pairs);
    obj.fetch();
}

function is_chat_msg_fetching() {
    //
    var chat_threads = $(".chat-threads");

    for (i = 0; i < chat_threads.length; i++) {
        var is_fetching = $(chat_threads[i]).attr("is-chat-msg-fetching");

        if (is_fetching == "yes") { return true; }
    }

    return false;
}