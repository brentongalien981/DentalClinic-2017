function create_chat_thread() {
    var crud_type = "create";
    var request_type = "POST";


    var key_value_pairs = {
        create: "yes"
    };



    var obj = new ChatThread(crud_type, request_type, key_value_pairs);
    obj.create();
}