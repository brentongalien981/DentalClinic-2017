function add_click_listener_to_chat_thread_button(chat_button) {
    // create_chat_thread(chat_button);

    // if (chat_thread_id != 0 &&
    //     chat_thread_id != $(chat_button).attr("thread-id")) {
    //     location.reload();
    //     // window.alert("chat_thread_id BEFORE reload: " + chat_thread_id);
    //     // window.alert("chat_thread_id AFTER reload: " + chat_thread_id);
    // }

    chat_thread_id = $(chat_button).attr("thread-id");

    //
    $("#expand-chat-pod-icon").css("display", "none");
    $("#collapse-chat-pod-icon").css("display", "initial");

    // $("#current-customer-name").html("Chatting with:");
    var current_customer_alias_input = $("#customer-alias-input" + chat_thread_id).get(0);
    set_current_customer_name(current_customer_alias_input);


    //
    read_chat_messages();
}

function set_current_customer_name(input) {

    //
    var current_chat_thread_id = input.parentElement.id;
    var global_chat_thread_id = "chat-thread" + chat_thread_id;

    if (current_chat_thread_id != global_chat_thread_id) { return; }

    var customer_alias = $(input).val();

    if (customer_alias.length > 22) {
        customer_alias = customer_alias.substring(0, 22);
        customer_alias += "...";
    }

    $("#current-customer-name").html("Chatting with: " + customer_alias);
}