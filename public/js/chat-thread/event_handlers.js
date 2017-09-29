function add_click_listener_to_chat_thread_button(chat_button) {
    // create_chat_thread(chat_button);

    // if (chat_thread_id != 0 &&
    //     chat_thread_id != $(chat_button).attr("thread-id")) {
    //     location.reload();
    //     // window.alert("chat_thread_id BEFORE reload: " + chat_thread_id);
    //     // window.alert("chat_thread_id AFTER reload: " + chat_thread_id);
    // }

    chat_thread_id = $(chat_button).attr("thread-id");


    read_chat_messages();
}