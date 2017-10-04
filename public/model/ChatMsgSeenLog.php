<?php
require_once("MyModel.php");
require_once("ChatMessage.php");

class ChatMsgSeenLog extends MyModel
{
    public $chat_msg_id;
    public $seen_by_user_id;
    private static $table_name = "ChatMsgSeenLog";

    public static function has_chat_msg_seen_by_all($chat_msg_id)
    {
        global $session;
        $query = "SELECT * FROM ChatMsgSeenLog ";
        $query .= "WHERE chat_msg_id = {$chat_msg_id}";

        $record_results = parent::readByQuery($query);

        global $database;
        $num_of_results = $database->get_num_rows_of_result_set($record_results);

        // TODO: REMINDER: Set this to a variable number that changes depending
        // on the number of chatters involved. For now it's just between 2 chatters,
        // but in the future, update it so that it involves more than 2 chatters.
        $max_num_of_chatters_involved = 1;

        if ($num_of_results == $max_num_of_chatters_involved) {
            return true;
        } else {
            return false;
        }
    }


    public function __construct()
    {
        parent::$db_fields = array(
            "chat_msg_id",
            "seen_by_user_id"
        );

        parent::$searchable_fields = null;
    }

    public static function has_user_seen_chat_msg($chat_msg_id)
    {
        global $session;
        global $database;

        $query = "SELECT * FROM " . self::$table_name;
        $query .= " WHERE chat_msg_id = {$chat_msg_id}";
        $query .= " AND seen_by_user_id = {$session->actual_user_id} ";

        $record_results = parent::readByQuery($query);


        $num_of_results = $database->get_num_rows_of_result_set($record_results);

        return ($num_of_results == 0) ? false : true;
    }

    public function create()
    {
        global $database;
        $attributes = $this->get_sanitized_attributes();

        $query = "INSERT INTO " . self::$table_name . " (";
        $query .= join(", ", array_keys($attributes));
        $query .= ") VALUES ('";
        $query .= join("', '", array_values($attributes));
        $query .= "')";

        //
        $to_be_replaced = "'null'";
        $replace_by = "NULL";
        $query = str_replace($to_be_replaced, $replace_by, $query);

        // Start transaction.
        if (!$database->start_transaction()) { return false; }


        $query_result = $database->get_result_from_query($query);

        if ($query_result) {
            //
            if (!$database->commit()) { return false; }

            //
            $this->id = $database->get_last_inserted_id();

            //
            return true;
        } else {
            //
            if (!$database->rollback()) { return false; }

            //
            return false;
        }
    }


    public function update($data)
    {
        global $database;
        global $session;
        $d = $data;

        $chat_msg_result_set = ChatMessage::select_by_query($d);

        while ($row = $database->fetch_array($chat_msg_result_set)) {

            $current_chat_msg_id = $row["id"];

            $chat_msg_seen_log = new ChatMsgSeenLog();
            $chat_msg_seen_log->chat_msg_id = $current_chat_msg_id;
            $chat_msg_seen_log->seen_by_user_id = $session->actual_user_id;


            if (!$chat_msg_seen_log->does_record_exist()) {
                $is_log_creation_ok = $chat_msg_seen_log->create();
            }



//            // If there's an error, disregard everything.
//            if (!$is_log_creation_ok) { return false; }


            //
            if (self::has_chat_msg_seen_by_all($current_chat_msg_id)) {
                $is_update_ok = ChatMessage::set_chat_msg_old($current_chat_msg_id);

                // Error? Then quit..
//                if (!$is_update_ok) { return false; }
            }
        }

        return true;
    }

    private function does_record_exist() {
        global $database;

        $q = "SELECT * FROM " . self::$table_name;
        $q .= " WHERE chat_msg_id = {$this->chat_msg_id}";
        $q .= " AND seen_by_user_id = {$this->seen_by_user_id}";

        $result_set = self::readByQuery($q);

        $num_of_result = $database->get_num_rows_of_result_set($result_set);

        return ($num_of_result > 0) ? true : false;
    }


    public static function read($data)
    {
        global $session;
        global $database;
        $d = $data;

        $q = "SELECT * FROM ChatMessage ";
        $q .= "WHERE chat_thread_id = {$d['chat_thread_id']} ";
        $q .= "ORDER BY date_posted ASC";

        //
        $record_results = parent::readByQuery($q);



        // The number of all the unread chat msgs in a chat-thread
        // relative to one specific user.
        $num_of_unread_chat_msgs = 0;

        while ($row = $database->fetch_array($record_results)) {

            // If the chat_msg is new..
            if ($row["is_new"] == 1) {
                // ..check if it hasn't been seen by the user.
                $current_chat_msg_id = $row["id"];

                $is_log_creation_ok = null;


                // If the user hasn't seen the chat msg, then create
                // a log record.
                if (!self::has_user_seen_chat_msg($current_chat_msg_id)) {

                    ++$num_of_unread_chat_msgs;
                }
            }
        }

        //
        $array_of_objs = array(
            "chat_thread_id" => $d["chat_thread_id"],
            "num_of_unread_chat_msgs" => $num_of_unread_chat_msgs
        );

        return $array_of_objs;
    }

    public static function fetch($data)
    {
        global $session;
        global $database;
        $d = $data;

        $q = "SELECT * FROM ChatMessage ";
        $q .= "WHERE chat_thread_id = {$d['chat_thread_id']} ";
        $q .= "AND date_posted > '{$d['latest_thread_chat_msg_seen_log_date']}' ";
        $q .= "ORDER BY date_posted ASC";

        //
        $record_results = parent::readByQuery($q);



        // The number of all the unread chat msgs in a chat-thread
        // relative to one specific user.
        $num_of_unread_chat_msgs = 0;

        while ($row = $database->fetch_array($record_results)) {

            // If the chat_msg is new..
            if ($row["is_new"] == 1) {
                // ..check if it hasn't been seen by the user.
                $current_chat_msg_id = $row["id"];

                $is_log_creation_ok = null;


                // If the user hasn't seen the chat msg, then create
                // a log record.
                if (!self::has_user_seen_chat_msg($current_chat_msg_id)) {

                    ++$num_of_unread_chat_msgs;
                }
            }
        }

        //
        $chat_thread_latest_chat_msg_date = ChatMessage::get_chat_thread_latest_chat_msg_date($d['chat_thread_id']);

        //
        $array_of_objs = array(
            "chat_thread_id" => $d["chat_thread_id"],
            "num_of_unread_chat_msgs" => $num_of_unread_chat_msgs,
            "chat_thread_latest_chat_msg_date" => $chat_thread_latest_chat_msg_date
        );

        return $array_of_objs;
    }

    public static function patch($data)
    {
        global $session;
        global $database;
        $d = $data;

        $q = "SELECT * FROM ChatMessage ";
        $q .= "WHERE chat_thread_id = {$d['chat_thread_id']} ";
        $q .= "AND is_new = 1";

        //
        $record_results = parent::readByQuery($q);



        // The number of all the unread chat msgs in a chat-thread
        // relative to one specific user.
        $num_of_unread_chat_msgs = 0;

        while ($row = $database->fetch_array($record_results)) {

            // ..check if it hasn't been seen by the user.
            $current_chat_msg_id = $row["id"];


            //
            if (!self::has_user_seen_chat_msg($current_chat_msg_id)) {

                ++$num_of_unread_chat_msgs;
            }
        }


        //
        $array_of_objs = array(
            "chat_thread_id" => $d["chat_thread_id"],
            "num_of_unread_chat_msgs" => $num_of_unread_chat_msgs
        );

        return $array_of_objs;
    }

}