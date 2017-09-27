<?php

// A class to help work with Sessions
// In our case, primarily to manage logging users in and out
// Keep in mind when working with sessions that it is generally
// inadvisable to store DB-related objects in sessions


class Session {

//    public $my_static_counter;
    private $logged_in = false;
    public $actual_user_id;
    public $actual_user_name;
//    public $actual_user_type_id;
    public $currently_viewed_user_id;
    public $currently_viewed_user_name;
    public $cart_id;
    public $user_id;
    public $seller_user_id;
    public $buyer_user_id;

    // Chat
    public $chat_thread_id;

    function __construct() {

        // Initializations for all kinds of users, specifically anonymous ones..
        $this->default_initialize();


        // Initializations for users that actually has db records.
        $this->check_login();

        if ($this->logged_in) {
// actions to take right away if user is logged in
        } else {
// actions to take right away if user is not logged in
        }
    }

    private function default_initialize() {
        if (isset($_SESSION["chat_thread_id"])) { $this->set_chat_thread_id($_SESSION["chat_thread_id"]); }
    }

    public function set_chat_thread_id($chat_thread_id) {
        $this->chat_thread_id = $_SESSION["chat_thread_id"] = $chat_thread_id;
    }



    public function is_viewing_own_account() {
        if ($this->actual_user_id === $this->currently_viewed_user_id) {
            return true;
        } else {
            return false;
        }
    }



    public function is_admin() {
        if ($this->actual_user_type_id == 1) { return true; }
        return false;
    }



    public function is_logged_in() {
        return $this->logged_in;
    }

    public function login($user) {
// database should find user based on username/password

        session_regenerate_id();


        if ($user) {
//            $_SESSION["my_static_counter"] = 0;

            $this->actual_user_id = $_SESSION["actual_user_id"] = $user->id;
            $this->actual_user_name = $_SESSION["actual_user_name"] = $user->username;
//            $this->actual_user_type_id = $_SESSION["actual_user_type_id"] = $user->user_type_id;

            $this->currently_viewed_user_id = $_SESSION["currently_viewed_user_id"] = $user->id;
            $this->currently_viewed_user_name = $_SESSION["currently_viewed_user_name"] = $user->username;

            $this->logged_in = true;

//            // Chat
//            $this->chat_thread_id = $_SESSION["chat_thread_id"] = null;
        }
    }

    public function logout() {
        unset($_SESSION["actual_user_id"]);
        unset($_SESSION["actual_user_name"]);
//        unset($_SESSION["actual_user_type_id"]);

        unset($_SESSION["currently_viewed_user_id"]);
        unset($_SESSION["currently_viewed_user_name"]);


        // Chat.
        unset($_SESSION["chat_thread_id"]);



        unset($this->actual_user_id);
        unset($this->actual_user_name);
//        unset($this->actual_user_type_id);

        unset($this->currently_viewed_user_id);
        unset($this->currently_viewed_user_name);

        // Chat.
        unset($this->chat_thread_id);
//        unset($this->chat_with_user_id);



        $this->logged_in = false;
        session_unset();
        session_destroy();
    }


// This is basically called in the constructor
// to check everytime if there's been a logged in actual user.
// I do this because we use the method require("my_user.php")
// and everytime that happens, an instantiation happens at the end
// of this file. And with that, we create a new user object everytime.
// So we check.
    private function check_login() {
        if (isset($_SESSION["actual_user_id"])) {
            $this->actual_user_id = $_SESSION["actual_user_id"];
            $this->actual_user_name = $_SESSION["actual_user_name"];
//            $this->actual_user_type_id = $_SESSION["actual_user_type_id"];

            $this->currently_viewed_user_id = $_SESSION["currently_viewed_user_id"];
            $this->currently_viewed_user_name = $_SESSION["currently_viewed_user_name"];

            $this->logged_in = true;


            // Chat.
            if (isset($_SESSION["chat_thread_id"])) {
                //
                $this->set_chat_thread_id($_SESSION["chat_thread_id"]);
//                $this->chat_thread_id = $_SESSION["chat_thread_id"];
//                $this->chat_with_user_id = $_SESSION["chat_with_user_id"];
            }



        } else {
            unset($this->actual_user_id);
            unset($this->actual_user_name);
//            unset($this->actual_user_type_id);

            unset($this->currently_viewed_user_id);
            unset($this->currently_viewed_user_name);


//            // Chat.
//            unset($this->chat_thread_id);

            $this->logged_in = false;
        }
    }

    public function set_currently_viewed_user($now_currently_viewed_user_id, $now_currently_viewed_user_name) {
        $this->currently_viewed_user_id = $_SESSION["currently_viewed_user_id"] = $now_currently_viewed_user_id;
        $this->currently_viewed_user_name = $_SESSION["currently_viewed_user_name"] = $now_currently_viewed_user_name;
    }

    public function reset_currently_viewed_user() {
        $this->currently_viewed_user_id = $_SESSION["currently_viewed_user_id"] = $_SESSION["actual_user_id"];
        $this->currently_viewed_user_name = $_SESSION["currently_viewed_user_name"] = $_SESSION["actual_user_name"];
    }

}

$session = new Session();
//$message = $session->message();
?>