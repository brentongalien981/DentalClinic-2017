function initilize_patch_chat_msg_seen_logs() {
    setInterval(patch_chat_msg_seen_logs, 2000);
}

function patch_chat_msg_seen_logs() {

    //
    if (are_chat_threads_patching()) { return; }

    //
    var chat_threads = $(".chat-threads");

    for (i = 0; i < chat_threads.length; i++) {
        patch_chat_msg_seen_log(chat_threads[i]);
    }

}

function patch_chat_msg_seen_log(chat_thread) {
    //
    $(chat_thread).attr("is-chat-msg-seen-log-patching", "yes");

    //
    var chat_thread_id = $(chat_thread).attr("thread-id");

    var crud_type = "patch";
    var request_type = "GET";
    var key_value_pairs = {
        patch : "yes",
        chat_thread_id: chat_thread_id
    };


    var obj = new ChatMsgSeenLog(crud_type, request_type, key_value_pairs);
    obj.patch();
}

function patch_chat_msgs_counter(num_of_new_chat_msgs, thread_id) {

    //
    $("#thread-new-msg-count-" + thread_id).attr("next-html", num_of_new_chat_msgs);


    // //
    // if (num_of_new_chat_msgs > 0) {
    //     $("#thread-new-msg-count-" + thread_id).html(num_of_new_chat_msgs);
    //     $("#thread-new-msg-count-" + thread_id).css("display", "block");
    //
    // }
    // else {
    //     $("#thread-new-msg-count-" + thread_id).html(0);
    //     $("#thread-new-msg-count-" + thread_id).css("display", "none");
    // }

}



function are_chat_threads_patching() {
    //
    var chat_threads = $(".chat-threads");

    for (i = 0; i < chat_threads.length; i++) {
        var is_patching = $(chat_threads[i]).attr("is-chat-msg-seen-log-patching");

        if (is_patching == "yes") { return true; }
    }

    return false;
}

function patch_total_num_of_new_chat_msgs() {
    //
    var thread_new_msg_counts = $(".thread-new-msg-counts");
    var total_num_of_new_chat_msgs = 0;

    for (i = 0; i < thread_new_msg_counts.length; i++) {

        // Set the actual num of new-chat-msgs per thread.
        //uki
        var actual_new_chat_count_for_thread = $(thread_new_msg_counts[i]).attr("next-html");
        //
        if (actual_new_chat_count_for_thread > 0) {
            $(thread_new_msg_counts[i]).html(actual_new_chat_count_for_thread);
            $(thread_new_msg_counts[i]).css("display", "block");

        }
        else {
            $(thread_new_msg_counts[i]).html(0);
            $(thread_new_msg_counts[i]).css("display", "none");
        }


        //
        var additional_count = parseInt($(thread_new_msg_counts[i]).html());

        total_num_of_new_chat_msgs += additional_count;
    }


    //
    if (total_num_of_new_chat_msgs > 0) {
        $("#new-chat-msgs-counter").html(total_num_of_new_chat_msgs);
        $("#new-chat-msgs-counter").css("display", "block");

    }
    else {
        $("#new-chat-msgs-counter").html(0);
        $("#new-chat-msgs-counter").css("display", "none");
    }
}