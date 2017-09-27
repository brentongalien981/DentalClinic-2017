<?php
require_once("MyController.php");
require_once(PUBLIC_PATH . "model/ChatMessage.php");

class ChatMessageController extends MyController
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
            $this->json["objs"] = $this->read();
            $this->json["actual_user_id"] = $session->is_logged_in() ? $session->actual_user_id : -69;
            $this->json["is_result_ok"] = true;
        }
        else if (isset($_POST["update"]) && $_POST["update"] == "yes") {}
        else if (isset($_POST["delete"]) && $_POST["delete"] == "yes") {}
        else if (isset($_GET["fetch"]) && $_GET["fetch"] == "yes") {
            $this->initialize_validation("fetch");
            $this->tryValidate();

            if ($this->isValidationOk) {
                $this->json["objs"] = $this->fetch();
                $this->json["actual_user_id"] = $session->is_logged_in() ? $session->actual_user_id : -69;
                $this->json['is_result_ok'] = true;
            }
        }




        // This is to let the user see the errors on their forms.
        $this->json['formErrorsShowable'] = true;

        //
        echo json_encode($this->json);
    }

    private function read() {
        return ChatMessage::read();
    }

    private function fetch() {
        return ChatMessage::fetch($this->sanitizedVars);
    }

    private function create() {
        global $session;
        $s = $this->sanitizedVars;

        //
        $cm = new ChatMessage();
        $cm->id = null;
        $cm->chat_thread_id = $session->chat_thread_id;
        $cm->chatter_user_id = $session->is_logged_in() ? $session->actual_user_id : "null";
//        $cm->date_posted = null;
        $cm->message = $s["message"];
        $cm->is_new = 1;


        //
        $is_creation_ok = $cm->create();

        return $is_creation_ok;
    }
    
    

    private function initialize_validation($crud_type) {
        // Set the vars.
        switch ($crud_type) {
            case "create":
                $this->allowedAssocIndexes = array(
                    "message"
                );

                $this->requiredVarsLengthArray = array(
                    "message" => ["min" => 1, "max" => 2048]
                );
                break;
            case "fetch":
                $this->allowedAssocIndexes = array(
                    "latest_chat_message_date"
                );

                $this->requiredVarsLengthArray = array(
                    "latest_chat_message_date" => ["min" => 19, "max" => 20]
                );

                $this->validator->set_request_type("get");
                break;
        }
    }
}

//
$cmc = new ChatMessageController();
?>