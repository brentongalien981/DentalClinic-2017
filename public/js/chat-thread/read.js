function read_chat_threads() {
    // // FLAG
    // if (is_chat_list_ajax_reading) { return; }
    // is_chat_list_ajax_reading = true;

    var crud_type = "read";
    var request_type = "GET";
    // var offset = get_num_of_chat_list_items();


    var key_value_pairs = {
        read: "yes"
    };


    var obj = new ChatThread(crud_type, request_type, key_value_pairs);
    obj.read();
}

function populate_chat_list(json) {
    var chat_threads = json.objs;

    var chat_threads_el = $(".chat-threads");
    var chat_threads_el_length = chat_threads_el.length;

    var i = 0;
    i = parseInt(i);


    for (; i < chat_threads.length; i += 1) {
        var ct = chat_threads[i];

        //
        var a_chat_thread = document.createElement("li");
        a_chat_thread.id = "chat-thread" + ct["id"];
        a_chat_thread.classList.add("chat-threads");
        $(a_chat_thread).attr("thread-id", ct["id"]);
        $(a_chat_thread).attr("date-created", ct["date_created"]);
        $(a_chat_thread).attr("chat-thread-latest-chat-msg-date", ct["chat_thread_latest_chat_msg_date"]);
        // $(a_chat_thread).attr("is-chat-thread-updating", "no");
        $(a_chat_thread).attr("is-chat-msg-seen-log-fetching", "no");
        $(a_chat_thread).attr("is-chat-msg-seen-log-patching", "no");
        // $(a_chat_thread).attr("is-chat-msg-fetching", "no");


        var num_of_chat_customers = parseInt(chat_threads_el_length) + i + 1;

        var customer_nick_name = document.createElement("h5");
        $(customer_nick_name).addClass("customer-numbers");
        $(customer_nick_name).html("Customer " + num_of_chat_customers);
        $(a_chat_thread).append(customer_nick_name);


        //
        var customer_alias_input = document.createElement("input");
        customer_alias_input.id = "customer-alias-input" + ct["id"];
        $(customer_alias_input).addClass("customer-aliases");
        $(customer_alias_input).attr("type", "text");
        $(customer_alias_input).attr("placeholder", "customer's alias");
        $(a_chat_thread).append(customer_alias_input);


        // Add a chat button to a chat-thread/customer.
        var a_chat_button = document.createElement("button");
        $(a_chat_button).addClass("btn btn-sm btn-primary btn-round chat-thread-buttons");
        $(a_chat_button).attr("thread-id", ct["id"]);
        $(a_chat_button).html("chat");
        $(a_chat_thread).append(a_chat_button);
        //
        $(a_chat_button).click(function () {
            add_click_listener_to_chat_thread_button(this);
        });


        var thread_new_msg_count = document.createElement("h5");
        thread_new_msg_count.id = "thread-new-msg-count-" + ct["id"];
        thread_new_msg_count.classList.add("thread-new-msg-counts");
        $(thread_new_msg_count).addClass("label label-danger");
        $(a_chat_thread).append(thread_new_msg_count);


        //
        $("#chat-list").append(a_chat_thread);


        // Add event-listeners to the customer-alias-input.
        $(customer_alias_input).change(function () {
            set_current_customer_name(this);
        });


    }


    // Clear the "there's no available customers" message if there is..
    if (chat_threads_el == null ||
        chat_threads_el_length == 0) {
        $("#empty-chat-list-msg").css("display", "block");
    }
    else {
        $("#empty-chat-list-msg").css("display", "none");
    }


    // scroll_chat_wall_to_bottom();

}