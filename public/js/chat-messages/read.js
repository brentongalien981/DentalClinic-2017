function read_chat_messages() {
    var crud_type = "read";
    var request_type = "GET";


    var key_value_pairs = {
        create: "yes"
    };



    var obj = new ChatMessage(crud_type, request_type, key_value_pairs);
    obj.read();
}