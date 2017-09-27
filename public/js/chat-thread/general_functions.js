function doChatThreadAfterEffects(class_name, crud_type, json) {
    switch (crud_type) {
        case "read":
            populate_chat_list(json);
            set_chat_thread_fetcher();
            // show_chat_list();
            break;
        case "create":
            read_chat_messages();
            break;
        case "update":
            break;
        case "delete":
            break;
        case "fetch":
            populate_chat_list(json);
            break;
    }
}

function get_chat_thread_latest_date() {

    var chat_threads = $(".chat-threads");
    var length = chat_threads.length;

    var latest_chat_thread = chat_threads[length - 1];
    var latest_date = $(latest_chat_thread).attr("date-created");

    if (latest_chat_thread == null ||
        latest_date == null ||
        latest_date == "") {

        return "2010-09-11 10:54:45";
    }
    else {
        return latest_date;
    }
}