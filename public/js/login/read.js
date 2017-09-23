function login() {
    var crud_type = "read";
    var request_type = "GET";

    var username = $("#username").val();
    var password = $("#password").val();

    var key_value_pairs = {
        read: "yes",
        username: username,
        password: password
    };


    var obj = new Login(crud_type, request_type, key_value_pairs);
    obj.create();
}