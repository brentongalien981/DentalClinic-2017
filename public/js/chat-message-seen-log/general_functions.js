function doChatMsgSeenLogAfterEffects(class_name, crud_type, json) {
    switch (crud_type) {
        case "read":
            console.log("@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@");
            console.log("json.objs['num_of_unread_chat_msgs']: " + json.objs["num_of_unread_chat_msgs"]);
            console.log("@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@");

            var chat_thread_id = json.objs["chat_thread_id"];
            var num_of_new_chat_msgs = json.objs["num_of_unread_chat_msgs"];

            set_chat_msgs_counter(num_of_new_chat_msgs, chat_thread_id);

            // //
            // set_chat_msg_seen_log_fetcher();
            break;
        case "create":
            break;
        case "update":
            // patch_chat_msg_seen_logs();
            break;
        case "delete":
            break;
        case "fetch":
            var chat_thread_id = json.objs["chat_thread_id"];
            var num_of_new_chat_msgs = json.objs["num_of_unread_chat_msgs"];
            var chat_thread_latest_chat_msg_date = json.objs["chat_thread_latest_chat_msg_date"];


            set_chat_msgs_counter(num_of_new_chat_msgs, chat_thread_id);

            //
            $("#chat-thread" + chat_thread_id).attr("is-chat-msg-seen-log-fetching", "no");

            //
            $("#chat-thread" + chat_thread_id).attr("chat-thread-latest-chat-msg-date", chat_thread_latest_chat_msg_date);
            break;
        case "patch":
            var chat_thread_id = json.objs["chat_thread_id"];
            var num_of_new_chat_msgs = json.objs["num_of_unread_chat_msgs"];

            //
            patch_chat_msgs_counter(num_of_new_chat_msgs, chat_thread_id);

            //
            $("#chat-thread" + chat_thread_id).attr("is-chat-msg-seen-log-patching", "no");

            //
            if (!are_chat_threads_patching()) { patch_total_num_of_new_chat_msgs(); }
            break;
    }
}

function pseudo_set_chat_msgs_counter(additional_num_of_new_chat_msgs) {

    // For all chat-msgs counter. All threads.
    var new_num_of_new_chat_msgs = 0;
    var old_num_of_new_chat_msgs = $("#new-chat-msgs-counter").html();

    //
    if (old_num_of_new_chat_msgs == null || old_num_of_new_chat_msgs == "") { old_num_of_new_chat_msgs = 0; }

    //
    new_num_of_new_chat_msgs = parseInt(old_num_of_new_chat_msgs) + parseInt(additional_num_of_new_chat_msgs);

    //
    if (new_num_of_new_chat_msgs > 0) {
        $("#new-chat-msgs-counter").html(new_num_of_new_chat_msgs);
        $("#new-chat-msgs-counter").css("display", "block");

    }
    else {
        $("#new-chat-msgs-counter").html(0);
        $("#new-chat-msgs-counter").css("display", "none");
    }
}

function set_chat_msgs_counter(additional_num_of_new_chat_msgs, thread_id) {

    // For all chat-msgs counter. All threads.
    var new_num_of_new_chat_msgs = 0;
    var old_num_of_new_chat_msgs = $("#new-chat-msgs-counter").html();

    //
    if (old_num_of_new_chat_msgs == null || old_num_of_new_chat_msgs == "") { old_num_of_new_chat_msgs = 0; }

    //
    new_num_of_new_chat_msgs = parseInt(old_num_of_new_chat_msgs) + parseInt(additional_num_of_new_chat_msgs);

    //
    // $(".chat-threads[thread-id='" + thread_id + "']").html();

    //
    if (new_num_of_new_chat_msgs > 0) {
        $("#new-chat-msgs-counter").html(new_num_of_new_chat_msgs);
        $("#new-chat-msgs-counter").css("display", "block");

    }
    else {
        $("#new-chat-msgs-counter").html(0);
        $("#new-chat-msgs-counter").css("display", "none");
    }




    // For the individual chat-thread.
    var old_num_of_thread_new_chat_msgs = $("#thread-new-msg-count-" + thread_id).html();

    //
    if (old_num_of_thread_new_chat_msgs == null || old_num_of_thread_new_chat_msgs == "") { old_num_of_thread_new_chat_msgs = 0; }

    //
    var new_num_of_thread_new_chat_msgs = parseInt(old_num_of_thread_new_chat_msgs) + parseInt(additional_num_of_new_chat_msgs);

    if (new_num_of_thread_new_chat_msgs > 0) {
        $("#thread-new-msg-count-" + thread_id).html(new_num_of_thread_new_chat_msgs);
        $("#thread-new-msg-count-" + thread_id).css("display", "block");
    }
    else {
        $("#thread-new-msg-count-" + thread_id).html(0);
        $("#thread-new-msg-count-" + thread_id).css("display", "none");
    }

}