function doChatThreadAfterEffects(class_name, crud_type, json) {
    switch (crud_type) {
        case "read":
            populate_chat_list(json);

            //
            read_chat_msg_seen_logs();
            read_chat_messages();
            
            //
            set_chat_widget_header();

            //
            set_chat_thread_fetcher();

            //
            initilize_patch_chat_msg_seen_logs();

            break;
        case "create":
            // This will just be invoked the the customer-side.
            read_chat_messages();
            break;
        case "update":
            break;
        case "delete":
            break;
        case "fetch":
            populate_chat_list(json);

            //
            // update_chat_threads();
            fetch_chat_msg_seen_logs();
            // fetch_chat_messages();
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

function set_chat_widget_header() {
    $("#chat-widget-header-bar").append($("#chat-widget-status-bar"));
}