function create_chat_thread(chat_button) {
    var crud_type = "create";
    var request_type = "POST";
    var the_chat_thread_id = -69;

    if (chat_button != null) {
        the_chat_thread_id = $(chat_button).attr("thread-id");
    }


    var key_value_pairs = {
        create: "yes",
        chat_thread_id: the_chat_thread_id
    };



    var obj = new ChatThread(crud_type, request_type, key_value_pairs);
    obj.create();
}