<?php
require_once("MyController.php");
require_once(PUBLIC_PATH . "model/ChatMsgSeenLog.php");

class ChatMsgSeenLogController extends MyController
{
    public function __construct()
    {
        parent::__construct();

        // Default
        global $session;
        $this->json = array();
        $this->json["is_result_ok"] = false;



        //
        if (isset($_POST["create"]) && $_POST["create"] == "yes") {

        }
        else if (isset($_GET["read"]) && $_GET["read"] == "yes") {
            if ($session->is_logged_in()) {

                $this->initialize_validation("read");
                $this->tryValidate();

                if ($this->isValidationOk) {
                    $this->json["objs"] = $this->read($this->sanitizedVars);

                    if ($this->json["objs"] != false) { $this->json['is_result_ok'] = true; }

                }
                else { $this->json['is_result_ok'] = false; }

            }
            else {
                $this->json["objs"] = $this->sanitizedVars["num_of_new_chat_msgs"];
                $this->json['is_result_ok'] = true;
                $this->json['is_user_anonymous'] = true;
                $this->json['num_of_new_chat_msgs'] = $this->sanitizedVars["num_of_new_chat_msgs"];

            }

        }
        else if (isset($_POST["update"]) && $_POST["update"] == "yes") {
            if ($session->is_logged_in()) {

                $this->initialize_validation("update");
                $this->tryValidate();

                if ($this->isValidationOk) {
                    $is_update_ok = $this->update($this->sanitizedVars);

                    $this->json['is_result_ok'] = $is_update_ok;

                }

            }
        }
        else if (isset($_POST["delete"]) && $_POST["delete"] == "yes") {}
        else if (isset($_GET["fetch"]) && $_GET["fetch"] == "yes") {

            if ($session->is_logged_in()) {

                $this->initialize_validation("fetch");
                $this->tryValidate();

                if ($this->isValidationOk) {
                    $this->json["objs"] = $this->fetch($this->sanitizedVars);

                    if ($this->json["objs"] != false) { $this->json['is_result_ok'] = true; }

                }

            }
            else {
                $this->json['is_user_anonymous'] = true;
            }
        }
        else if (isset($_GET["patch"]) && $_GET["patch"] == "yes") {

            if ($session->is_logged_in()) {

                $this->initialize_validation("patch");
                $this->tryValidate();

                if ($this->isValidationOk) {
                    $this->json["objs"] = $this->patch($this->sanitizedVars);

                    if ($this->json["objs"] != false) { $this->json['is_result_ok'] = true; }

                }

            }
        }




        // This is to let the user see the errors on their forms.
        $this->json['formErrorsShowable'] = true;

        //
        echo json_encode($this->json);
    }

    private function read() {
        return ChatMsgSeenLog::read($this->sanitizedVars);
    }

    private function update() {
        return ChatMsgSeenLog::update($this->sanitizedVars);
    }

    private function fetch() {
        return ChatMsgSeenLog::fetch($this->sanitizedVars);
    }

    private function patch() {
        return ChatMsgSeenLog::patch($this->sanitizedVars);
    }

    private function initialize_validation($crud_type) {
        // Set the vars.
        switch ($crud_type) {
            case "read":
                $this->allowedAssocIndexes = array(
                    "chat_thread_id"
                );

                $this->requiredVarsLengthArray = array(
                    "chat_thread_id" => ["min" => 1, "max" => 11]
                );

                $this->validator->set_request_type("get");
                break;
            case "update":
                $this->allowedAssocIndexes = array(
                    "chat_thread_id",
                    "chat_message_latest_date"
                );

                $this->requiredVarsLengthArray = array(
                    "chat_thread_id" => ["min" => 1, "max" => 11],
                    "chat_message_latest_date" => ["min" => 19, "max" => 20]
                );

                break;
            case "fetch":
                $this->allowedAssocIndexes = array(
                    "chat_thread_id",
                    "latest_thread_chat_msg_seen_log_date"
                );

                $this->requiredVarsLengthArray = array(
                    "chat_thread_id" => ["min" => 1, "max" => 11],
                    "latest_thread_chat_msg_seen_log_date" => ["min" => 19, "max" => 20]
                );

                $this->validator->set_request_type("get");
                break;
            case "patch":
                $this->allowedAssocIndexes = array(
                    "chat_thread_id"
                );

                $this->requiredVarsLengthArray = array(
                    "chat_thread_id" => ["min" => 1, "max" => 11]
                );

                $this->validator->set_request_type("get");
                break;
        }
    }
}

//
$cmslc = new ChatMsgSeenLogController();
?>