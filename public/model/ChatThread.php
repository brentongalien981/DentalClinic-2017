<?php
require_once("MyModel.php");

class ChatThread extends MyModel
{
    const MAX_NUM_OF_ACTIVE_CHAT_THREADS = 15;
    const MAX_NUM_OF_ACTIVE_CHAT_THREADS_PER_FASCILITATOR = 5;


    public $id;
    public $fascilitator_user_id;
    private static $table_name = "ChatThread";

    public function __construct()
    {
        parent::$db_fields = array("id", "fascilitator_user_id");
        parent::$searchable_fields = null;
    }


    public static function is_there_available_thread_id()
    {
        global $database;

        $q = "SELECT COUNT(*) AS count FROM " . self::$table_name;
        $q .= " WHERE is_deleted = 0";

        $result = $database->get_result_from_query($q);

        while ($row = $database->fetch_array($result)) {
            if ($row["count"] < self::MAX_NUM_OF_ACTIVE_CHAT_THREADS) { return true; }
        }

        return false;
    }

    public static function get_available_fascilitator_user_id()
    {
        // Get the user_id of the first available fascilitator.
        global $database;

        $q = "SELECT id FROM Users";

        $result = $database->get_result_from_query($q);

        // Loop through all the users' ids.
        while ($row = $database->fetch_array($result)) {

            $current_user_id = $row["id"];

            $q2 = "SELECT COUNT(*) AS count FROM " . self::$table_name;
            $q2 .= " WHERE fascilitator_user_id = {$current_user_id}";

            $result2 = $database->get_result_from_query($q2);

            // Check if the current user has less than the max num of
            // chat threads per fascilitator.
            while ($row2 = $database->fetch_array($result2)) {
                if ($row2["count"] < self::MAX_NUM_OF_ACTIVE_CHAT_THREADS_PER_FASCILITATOR) { return $current_user_id; }
            }
        }

        // If the code reaches this far, there's no available fascilitator.
        return -69;
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

        $result = $database->get_result_from_query($query);

        if ($result) {
            $this->id = $database->get_last_inserted_id();
            return  true;
        }

        return false;


    }
}
?>