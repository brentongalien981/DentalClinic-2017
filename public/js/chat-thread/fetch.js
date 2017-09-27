function set_chat_thread_fetcher() {
    // Get an update every second.
    chat_thread_fetch_handler = setInterval(fetch_chat_threads, 2000);
}

function fetch_chat_threads() {
    var latest_chat_thread_date = get_chat_thread_latest_date();

    var crud_type = "fetch";
    var request_type = "GET";
    var key_value_pairs = {
        fetch : "yes",
        latest_chat_thread_date: latest_chat_thread_date
    };


    var obj = new ChatThread(crud_type, request_type, key_value_pairs);
    obj.fetch();
}