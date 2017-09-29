function refresh_session() {
    var crud_type = "refresh";
    var request_type = "GET";


    var key_value_pairs = {
        refresh: "yes"
    };



    var obj = new Session(crud_type, request_type, key_value_pairs);
    obj.refresh();
}