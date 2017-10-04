<?php
require_once("MyController.php");
require_once(PUBLIC_PATH . "model/ChatThread.php");

class ChatThreadController extends MyController
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

            $this->initialize_validation("create");
            $this->tryValidate();

            if ($this->isValidationOk) {
                $is_creation_ok = $this->create();

                $this->json['is_result_ok'] = $is_creation_ok;
            }
        }
        else if (isset($_GET["read"]) && $_GET["read"] == "yes") {
            // Make sure that the user is a dental fascilitator.
            if (!$session->is_logged_in()) {
                return;
            }

            $this->json["objs"] = $this->read();
            $this->json["is_result_ok"] = true;
        }
        else if (isset($_POST["update"]) && $_POST["update"] == "yes") {

            if ($session->is_logged_in()) {

                $this->initialize_validation("update");
                $this->tryValidate();

                if ($this->isValidationOk) {
                    $this->json["objs"] = $this->update($this->sanitizedVars);

                    if ($this->json["objs"] != false) { $this->json['is_result_ok'] = true; }

                }

            }
            else {
                $this->json['is_user_anonymous'] = true;
            }
        }
        else if (isset($_POST["delete"]) && $_POST["delete"] == "yes") {}
        else if (isset($_GET["fetch"]) && $_GET["fetch"] == "yes") {
            // Make sure that the user is a dental fascilitator.
            if (!$session->is_logged_in()) {
                return;
            }

            $this->initialize_validation("fetch");
            $this->tryValidate();

            if ($this->isValidationOk) {

                $this->json["objs"] = $this->fetch();
                $this->json["is_result_ok"] = true;
            }
        }


        // This is to let the user see the errors on their forms.
        $this->json['formErrorsShowable'] = true;

        //
        echo json_encode($this->json);
    }

    private function update() {
        return ChatThread::update($this->sanitizedVars);
    }

    private function create()
    {
        global $session;

//        // This chunk is not needed anymore.
//        // If it's a dental fascilitator trying to answer a customer's
//        // chat request, then do it.
//        if ($session->is_logged_in()) {
//            $session->set_chat_thread_id($this->sanitizedVars["chat_thread_id"]);
//            return true;
//        }


        // Check if the session's chat thread id is set.
        // If not, check if there's an available chat thread from a fascilitator.
        // If not also, then just create a new one.
        if (isset($session->chat_thread_id)) {
            //
            return true;
        } else if (ChatThread::is_there_available_thread_id()) {
            $ct = new ChatThread();
//            $ct->id = null;
            $ct->fascilitator_user_id = ChatThread::get_available_fascilitator_user_id();

            if ($ct->fascilitator_user_id == -69) {
                $this->json["error_summary"] = "The dental fascilitators are all busy right now..";
                return false;
            }

            $is_creation_ok = $ct->create();

            if ($is_creation_ok) {
                $session->set_chat_thread_id($ct->id);
                return true;
            }
        } else {
            //
            return false;
        }


    }

    private function read()
    {
        return ChatThread::read();
    }

    private function fetch()
    {
        return ChatThread::fetch($this->sanitizedVars);
    }

    private function initialize_validation($crud_type)
    {
        // Set the vars.
        switch ($crud_type) {
            case "create":
                $this->allowedAssocIndexes = array(
                    "chat_thread_id"
                );

                $this->requiredVarsLengthArray = array(
                    "chat_thread_id" => ["min" => 1, "max" => 11]
                );
                break;
            case "update":
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
            case "fetch":
                $this->allowedAssocIndexes = array(
                    "latest_chat_thread_date"
                );

                $this->requiredVarsLengthArray = array(
                    "latest_chat_thread_date" => ["min" => 19, "max" => 20]
                );

                $this->validator->set_request_type("get");
                break;
        }
    }

}

//
$ctc = new ChatThreadController();
?>