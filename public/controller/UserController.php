<?php
/**
 * Created by PhpStorm.
 * User: ops
 * Date: 2017-09-22
 * Time: 06:50
 */

require_once("MyController.php");
require_once(PUBLIC_PATH . "model/User.php");

class UserController extends MyController
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
        $this->tryValidate();

        //
        $this->json = $this->errorsArray;

        //
        if ($this->isValidationOk) {
            //
            if (isset($_POST["create"]) && $_POST["create"] == "yes") { $this->create(); }
            else if (isset($_GET["read"]) && $_GET["read"] == "yes") {}
            else if (isset($_POST["update"]) && $_POST["update"] == "yes") {}
            else if (isset($_POST["delete"]) && $_POST["delete"] == "yes") {}
        }
        else {
            $this->json["is_result_ok"] = false;
        }




        // This is to let the user see the errors on their forms.
        $this->json['formErrorsShowable'] = true;

        //
        echo json_encode($this->json);
    }

    private function create() {
        global $session;
        $s = $this->sanitizedVars;

        //
        $u = new User();
        $u->id = null;
        $u->username = $s["username"];
        $u->hashed_password = password_hash($s["password"], PASSWORD_BCRYPT);

        //
        $this->json["is_result_ok"] = $u->create();
    }


}

//
$uc = new UserController();
?>