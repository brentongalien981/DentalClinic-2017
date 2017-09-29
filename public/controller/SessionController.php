<?php

require_once("MyController.php");

class SessionController extends MyController
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


        }
        else if (isset($_POST["update"]) && $_POST["update"] == "yes") {}
        else if (isset($_POST["delete"]) && $_POST["delete"] == "yes") {}
        else if (isset($_GET["fetch"]) && $_GET["fetch"] == "yes") {
        }
        else if (isset($_GET["refresh"]) && $_GET["refresh"] == "yes") {
            if ($session->is_logged_in()) {

                $this->json["objs"] = $this->refresh();
                $this->json['is_result_ok'] = true;
            }
        }




        // This is to let the user see the errors on their forms.
        $this->json['formErrorsShowable'] = true;

        //
        echo json_encode($this->json);
    }

    private function refresh() {
        return sessionize_csrf_token();
    }
}

//
$sc = new SessionController();
?>