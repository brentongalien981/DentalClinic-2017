<?php
require_once("MyModel.php");

class ChatMessage extends MyModel
{
    public $id;
    public $chat_thread_id;
    public $chatter_user_id;
//    public $date_posted;
    public $message;
    public $is_new;
    private static $table_name = "ChatMessage";

    public function __construct()
    {
        parent::$db_fields = array(
            "id",
            "chat_thread_id",
            "chatter_user_id",
            "date_posted",
            "message",
            "is_new"
        );

        parent::$searchable_fields = null;
    }

    public static function read()
    {
        global $session;
        global $database;

        $q = "SELECT * FROM " . self::$table_name;
        $q .= " WHERE chat_thread_id = {$session->chat_thread_id}";
        $q .= " ORDER BY date_posted ASC";

        //
        $record_results = parent::readByQuery($q);


        $array_of_objs = array();

        while ($row = $database->fetch_array($record_results)) {
            $an_obj = array(
                "id" => $row["id"],
                "chat_thread_id" => $row["chat_thread_id"],
                "chatter_user_id" => $row["chatter_user_id"],
                "date_posted" => $row["date_posted"],
                "message" => $row["message"],
                "is_new" => $row["is_new"]
            );

            //
            array_push($array_of_objs, $an_obj);
        }

        return $array_of_objs;

    }

    public static function fetch($sanitized_vars)
    {
        global $session;
        global $database;
        $s = $sanitized_vars;

        $q = "SELECT * FROM " . self::$table_name;
        $q .= " WHERE chat_thread_id = {$session->chat_thread_id}";
        $q .= " AND is_new = 1";
        $q .= " AND date_posted > '{$s['latest_chat_message_date']}'";
        $q .= " ORDER BY date_posted ASC";

        //
        $record_results = parent::readByQuery($q);


        $array_of_objs = array();

        while ($row = $database->fetch_array($record_results)) {
            $an_obj = array(
                "id" => $row["id"],
                "chat_thread_id" => $row["chat_thread_id"],
                "chatter_user_id" => $row["chatter_user_id"],
                "date_posted" => $row["date_posted"],
                "message" => $row["message"],
                "is_new" => $row["is_new"]
            );

            //
            array_push($array_of_objs, $an_obj);
        }

        return $array_of_objs;

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
        if (!$database->start_transaction()) {
            return false;
        }


        $query_result = $database->get_result_from_query($query);

        if ($query_result) {
            //
            if (!$database->commit()) {
                return false;
            }

            //
            $this->id = $database->get_last_inserted_id();

            //
            return true;
        } else {
            //
            if (!$database->rollback()) {
                return false;
            }

            //
            return false;
        }
    }
}