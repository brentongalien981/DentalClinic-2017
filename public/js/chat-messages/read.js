function read_chat_messages() {
    var crud_type = "read";
    var request_type = "GET";


    var key_value_pairs = {
        read: "yes",
        chat_thread_id: chat_thread_id
    };



    var obj = new ChatMessage(crud_type, request_type, key_value_pairs);
    obj.read();
}

function populate_chat_wall(json) {
    var chat_msgs = json.objs;
    var is_user_anonymous = (json.actual_user_id == -69) ? true : false;
    // var chat_msgs = json["objs"];

    var i = 0;
    i = parseInt(i);

    for (; i < chat_msgs.length; i+=1) {
        var c = chat_msgs[i];

        //
        var chat_msg_container = document.createElement("div");
        chat_msg_container.classList.add("chat-message-containers");
        $(chat_msg_container).attr("date-posted", c["date_posted"]);


        //
        var chat_msg = document.createElement("p");
        $(chat_msg).html(c["message"]);
        chat_msg.classList.add("chat-msg");


        // If the chat message is from a dental fascilitator
        if (c["chatter_user_id"] == null) { c["chatter_user_id"] = -69; }

        if (c["chatter_user_id"] != json.actual_user_id) {
            chat_msg_container.classList.add("own-chat-message-containers");
        }


        // For customer only...
        // Only do the update of the # of new chat-msgs if the
        // user is a customer.
        var is_msg_from_fascilitator = (c["chatter_user_id"] != -69) ? true : false;
        if (is_user_anonymous && is_msg_from_fascilitator) {
            var num_of_new_chat_msgs = 1;
            pseudo_read_chat_msg_seen_log(num_of_new_chat_msgs);
        }


        $(chat_msg_container).append(chat_msg);
        $("#chat-wall").append(chat_msg_container);
    }

    // scroll_chat_wall_to_bottom();

}