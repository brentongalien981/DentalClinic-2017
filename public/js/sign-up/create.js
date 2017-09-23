function createUser() {
    var crud_type = "create";
    var request_type = "POST";

    var username = $("#username").val();
    var password = $("#password").val();

    var key_value_pairs = {
        create: "yes",
        username: username,
        password: password
    };


    var obj = new User(crud_type, request_type, key_value_pairs);
    obj.create();
}