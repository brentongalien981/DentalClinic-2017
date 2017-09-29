function doSessionAfterEffects(class_name, crud_type, json) {
    switch (crud_type) {
        case "read":
            break;
        case "create":
            break;
        case "update":
            break;
        case "delete":
            break;
        case "fetch":
            break;
        case "refresh":
            // console.log("What is the value of the new csrf token?");
            console.log("###################################");
            console.log("OLD CSRF TOKEN: " + $("#new-csrf-token").val());
            console.log("###################################");
            var new_csrf_token = json.objs;
            $("#new-csrf-token").val(new_csrf_token);
            console.log("###################################");
            console.log("NEW CSRF TOKEN: " + $("#new-csrf-token").val());
            console.log("###################################");
            break;
    }
}