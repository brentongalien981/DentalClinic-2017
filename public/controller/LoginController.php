<?php
require_once("MyController.php");
require_once(PUBLIC_PATH . "model/User.php");

class LoginController extends MyController
{
    public function __construct()
    {
        parent::__construct();

        // Set the vars.
        $this->allowedAssocIndexes = array(
            "username",
            "password"
        );

        $this->requiredVarsLengthArray = array(
            "username" => ["min" => 8, "max" => 64],
            "password" => ["min" => 8, "max" => 256]
        );

        //
        // Do this for GET requests.
        $this->validator->set_request_type("get");
        $this->tryValidate();

        //
        $this->json = $this->errorsArray;

        //
        if ($this->isValidationOk) {
            //
            if (isset($_POST["create"]) && $_POST["create"] == "yes") {}
            else if (isset($_GET["read"]) && $_GET["read"] == "yes") { $this->read(); }
            else if (isset($_POST["update"]) && $_POST["update"] == "yes") {}
            else if (isset($_POST["delete"]) && $_POST["delete"] == "yes") {}
        }




        // This is to let the user see the errors on their forms.
        $this->json['formErrorsShowable'] = true;

        //
        echo json_encode($this->json);
    }

    private function read() {
        global $session;
        $s = $this->sanitizedVars;

        //
        $logging_user = User::authenticate_with_user_object_return($s["username"]);

        // Default result.
        $this->json["is_result_ok"] = false;


        if ($logging_user) {

            //
            $do_passwords_match = password_verify($s["password"], $logging_user->hashed_password);

            if ($do_passwords_match) {
                $session->login($logging_user);
                //
                $this->json["is_result_ok"] = true;
            }
        }



    }
}
//
$uc = new LoginController();
?>