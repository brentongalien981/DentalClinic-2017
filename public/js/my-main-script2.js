function get_local_url() {
    // TODO: Change this to "http://www.brenallen.ca/";
    return "http://localhost/BucadJavier/Dental/";
}

function show_x_container(container) {
    container.style.display = "block";
}

function show_x_container2(class_name) {
    $("#" + class_name + "Container").css("display", "block");
}


function hide_x_container(container) {
    container.style.display = "none";
}

function hide_x_container2(class_name) {
    // container.style.display = "none";
    $("#" + class_name + "Container").css("display", "none");
}