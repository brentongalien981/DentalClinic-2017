function set_chat_widget_component_borders() {
    
    // set_chat_pod_components();
    set_chat_list_borders();
    set_chat_header_borders();
}

function set_chat_pod_components() {
    // if (chat_thread_id == 0) { return; }

    $("#chat-wall").css("display", "block");
    $("#chat-textarea-container").css("display", "block");
    $("#send-chat-button").css("display", "block");
    $("#chat-pod-section").css("display", "block");
}

function set_chat_list_borders() {
    if ($("#chat-pod-section").css("display") == "block") {

        $("#chat-list").css("border-bottom-left-radius", "0px");
        $("#chat-list").css("border-bottom-right-radius", "0px");
    }
    else {
        $("#chat-list").css("border-bottom-left-radius", "10px");
        $("#chat-list").css("border-bottom-right-radius", "10px");
    }
}

function set_chat_header_borders() {

    if ($("#chat-pod-section").css("display") == "block" ||
        $("#chat-list").css("display") == "block") {

        $("#chat-widget-header-bar").css("border-bottom-left-radius", "0px");
        $("#chat-widget-header-bar").css("border-bottom-right-radius", "0px");

    }
    else {
        $("#chat-widget-header-bar").css("border-bottom-left-radius", "10px");
        $("#chat-widget-header-bar").css("border-bottom-right-radius", "10px");
    }
}