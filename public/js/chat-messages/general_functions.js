function doChatMessageAfterEffects(class_name, crud_type, json) {
    switch (crud_type) {
        case "read":
            // window.alert("SUCCESS AJAX. TODO:METHDO: doChatMessageAfterEffects(), switch: read");

            // Remove all the old messages.
            $(".chat-message-containers").remove();

            populate_chat_wall(json);

            show_chat_pod();

            set_chat_widget_component_borders();

            // scroll_chat_wall_to_bottom();

            // For anonymous users only.
            if (json.is_user_anonymous == "yes") {
                $("#new-chat-msgs-counter").html(0);
                $("#new-chat-msgs-counter").css("display", "none");
            }

            can_chat_messages_fetch = true;

            break;
        case "create":
            // Clear the textarea.
            $("#chat-textarea").val("");
            break;
        case "update":
            break;
        case "delete":
            break;
        case "fetch":
            populate_chat_wall(json);

            if (should_chat_msg_seen_logs_update) {
                if (json.is_user_anonymous == "yes") {
                    $("#new-chat-msgs-counter").html(0);
                    $("#new-chat-msgs-counter").css("display", "none");
                }
                else {
                    update_chat_msg_seen_logs();
                }

                should_chat_msg_seen_logs_update = false;
            }
            break;
    }
}

function get_chat_message_latest_date() {

    var chat_msgs = $(".chat-message-containers");
    var length = chat_msgs.length;

    var latest_chat_msg = chat_msgs[length - 1];
    var latest_date = $(latest_chat_msg).attr("date-posted");

    if (latest_chat_msg == null ||
        latest_date == null ||
        latest_date == "") {

        return "2010-09-11 10:54:45";
    }
    else {
        return latest_date;
    }
}