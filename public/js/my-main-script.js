function show_flash_notification(x_obj, json) {
    // TODO:REMINDER: Make the notification more presentable in production.
    if (json == null || !json.is_result_ok) {
        // FAIL on [crud]ing [x]Notification.
        // window.alert("FAIL on " + x_obj.crud_type + "ing " + x_obj.class_name);
        console.log("FAIL on " + x_obj.crud_type + "ing " + x_obj.class_name);
    }
    else {
        // SUCCESS on [crud]ing [x]Notification.
        // window.alert("SUCCESS on " + x_obj.crud_type + "ing " + x_obj.class_name);
        console.log("SUCCESS on " + x_obj.crud_type + "ing " + x_obj.class_name);
    }
}

function get_csrf_input() {
    var input_csrf_token = document.createElement("input");
    input_csrf_token.id = "input_csrf_token";
    input_csrf_token.setAttribute("type", "hidden");
    input_csrf_token.setAttribute("value", get_csrf_token());

    return input_csrf_token;
}


/**
 * Get the subfolder of the appropriate xAjaxHandler.php.
 * @param class_name
 * @return {string}
 */
function getSubfolder(class_name) {
    //
    var subfolder = "";

    switch (class_name) {
        case "User":
            subfolder = "sign-up";
            break;
        case "zZz":
            break;
    }


    return subfolder;
}

function my_sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}


function decideAjaxAfterEffectsClassHandlers(x_obj, json) {
    var class_name = x_obj.class_name;
    var crud_type = x_obj.crud_type;

    //
    switch (class_name) {
        case "User":
            doUsersAfterEffects(class_name, crud_type, json);
            break;
        case "Login":
            doLoginAfterEffects(class_name, crud_type, json);
            break;
        case "ChatThread":
            doChatThreadAfterEffects(class_name, crud_type, json);
            break;
        case "ChatMessage":
            doChatMessageAfterEffects(class_name, crud_type, json);
            break;
        case "Session":
            doSessionAfterEffects(class_name, crud_type, json);
            break;
        case "ChatMsgSeenLog":
            doChatMsgSeenLogAfterEffects(class_name, crud_type, json);
            break;
        case "zZz":
            //
            break;
    }
}


function get_key_value_pairs(key_value_pairs, request_type) {
    var arranged_key_value_pairs = "";

    //
    if (request_type == "GET") {
        arranged_key_value_pairs += "?";
    }
    // Create a dynamic hidden csrf_token input.
    else if (request_type == "POST") {
        var input_csrf_token = get_csrf_input();

        // Dynamically append a hidden csrf input to the form "create_post_form".
        document.getElementById("random-placeholder").appendChild(input_csrf_token);

        //
        arranged_key_value_pairs += "csrf_token=" + document.getElementById("input_csrf_token").value + "&";

        // Right away, remove the hidden csrf input from the form.
        document.getElementById("random-placeholder").removeChild(input_csrf_token);
    }


    //
    for (var key in key_value_pairs) {
        arranged_key_value_pairs += key + "=" + key_value_pairs[key] + "&";
    }

    return arranged_key_value_pairs;
}


function my_ajax(x_obj) {
    var caller_class_name = x_obj.class_name;
    var crud_type = x_obj.crud_type;
    var request_type = x_obj.request_type;
    var key_value_pairs_arr = x_obj.key_value_pairs;
    var key_value_pairs_str = get_key_value_pairs(key_value_pairs_arr, request_type);


    //
    var url = get_local_url() + "public/controller/" + caller_class_name + "Controller.php";
    var xhr = new XMLHttpRequest();


    // Further set the url for "GET" request.
    if (request_type === "GET") {
        url += key_value_pairs_str;
    }


    //
    xhr.open(request_type, url, true);


    // TODO:DEBUG
    console.log("REQUEST TYPE: " + request_type);
    console.log("crud_type: " + crud_type);
    console.log("url: " + url);
    console.log("key_value_pairs_str: " + key_value_pairs_str);
    console.log("caller_class_name: " + caller_class_name);


    //
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText.trim();
            // Log before JSON parsing.
            console.log("*******************************");
            console.log("*** AJAX invoked by class: " + caller_class_name);
            console.log("*** CRUD Type: " + crud_type);

            console.log("*** Log before JSON parsing ***");
            console.log("response: " + response);


            //
            var json = null;

            try {
                json = JSON.parse(response);
            } catch (e) {
                console.log('ERROR:invalid json');
                json = null;
            }


            // If the response is not successful..
            if (json === null || !json.is_result_ok) {
                console.log("RESULT:json.is_result_ok: null/false");
            } else if (json.is_result_ok) {
                // Else if it's successful..
                console.log("RESULT:json.is_result_ok: " + json.is_result_ok);


                // "After-Effects" tasks if the AJAX is ok.
                decideAjaxAfterEffectsClassHandlers(x_obj, json);


            }


            // Show a flash notification of the overall result.
            show_flash_notification(x_obj, json);


            // AJAX Formatted JSON log.
            console.log("*******************************");
            console.log("*** Formatted JSON in class: " + caller_class_name);
            console.log("*** CRUD Type: " + crud_type);
            for (var key in json) {
                if (json.hasOwnProperty(key)) {
                    var val = json[key];

                    // Display in the console.
                    console.log(key + " => " + val);


                    // continue;
                    // Display errors in the form.
                    if (json.formErrorsShowable) {
                        var error_label = document.getElementById(key);
                        if (error_label != null) {
                            // Reset the error labels.
                            error_label.innerHTML = "error";
                            error_label.style.visibility = "hidden";


                            // Display error labels.
                            if (val != "") {
                                error_label.innerHTML = val;
                                error_label.style.visibility = "visible";
                            }

                        }
                    }
                }
            }


        }
    };


    // Send.
    if (request_type === "GET") {
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.send();
    }
    else {
        // You need this for AJAX POST requests.
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(key_value_pairs_str);
    }
}