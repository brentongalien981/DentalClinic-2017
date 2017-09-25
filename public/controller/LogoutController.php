<?php
require_once("MyController.php");

class LogoutController extends MyController
{
    public function __construct()
    {
        parent::__construct();

        $this->logout();
    }

    private function logout() {
        global $session;
        if ($session->is_logged_in()) {
            $session->logout();
            redirect_to(LOCAL . "public/view/logout/index.php");
        }
        else {
            redirect_to(LOCAL . "public/index.php");
        }


    }
}

$lc = new LogoutController();
?>

