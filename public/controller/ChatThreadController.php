<?php
require_once("MyController.php");
require_once(PUBLIC_PATH . "model/ChatThread.php");

class ChatThreadController extends MyController
{
    public function __construct()
    {
        parent::__construct();

        // Default
        $this->json = array();
        $this->json["is_result_ok"] = false;

        //
        if (isset($_POST["create"]) && $_POST["create"] == "yes") {

            $this->json['is_result_ok'] = $this->create();
        }
        else if (isset($_GET["read"]) && $_GET["read"] == "yes") {

        }
        else if (isset($_POST["update"]) && $_POST["update"] == "yes") {}
        else if (isset($_POST["delete"]) && $_POST["delete"] == "yes") {}




        // This is to let the user see the errors on their forms.
        $this->json['formErrorsShowable'] = true;

        //
        echo json_encode($this->json);
    }

    private function create() {
        global $session;

        // Check if the session's chat thread id is set.
        // If not, check if there's an available chat thread from a fascilitator.
        // If not also, then just create a new one.
        if (isset($session->chat_thread_id)) {
            //
            return true;
        }
        else if (ChatThread::is_there_available_thread_id()) {
            $ct = new ChatThread();
//            $ct->id = null;
            $ct->fascilitator_user_id = ChatThread::get_available_fascilitator_user_id();

            if ($ct->fascilitator_user_id == -69) { return false; }

            $is_creation_ok = $ct->create();

            if ($is_creation_ok) {
                $session->set_chat_thread_id($ct->id);
                return true;
            }
        }
        else {
            //
            return false;
        }


    }

}

//
$ctc = new ChatThreadController();
?>