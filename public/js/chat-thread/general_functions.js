function doChatThreadAfterEffects(class_name, crud_type, json) {
    switch (crud_type) {
        case "read":
            break;
        case "create":
            read_chat_messages();
            break;
        case "update":
            break;
        case "delete":
            break;
    }
}