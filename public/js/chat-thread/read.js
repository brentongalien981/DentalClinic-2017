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


    for (; i < chat_threads.length; i+=1) {
        var ct = chat_threads[i];

        //
        var a_chat_thread = document.createElement("li");
        a_chat_thread.classList.add("chat-threads");
        $(a_chat_thread).attr("thread-id", ct["id"]);
        $(a_chat_thread).attr("date-created", ct["date_created"]);

        var num_of_chat_customers = parseInt(chat_threads_el_length) + i + 1;

        $(a_chat_thread).html("Customer " + num_of_chat_customers);



        // Add a chat button to a chat-thread/customer.
        var a_chat_button = document.createElement("button");
        $(a_chat_button).attr("thread-id", ct["id"]);
        $(a_chat_button).html("chat");
        $(a_chat_thread).append(a_chat_button);
        //
        $(a_chat_button).click(function () {
            add_click_listener_to_chat_thread_button(this);
        });


        //
        $("#chat-list").append(a_chat_thread);
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