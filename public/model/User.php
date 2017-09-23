<?php

require_once("MyModel.php");

class User extends MyModel
{

    public $id;
    public $username;
    public $hashed_password;
    private static $table_name = "Users";

    public function __construct()
    {
        parent::$db_fields = array("id", "username", "hashed_password");
        parent::$searchable_fields = null;
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

    public static function authenticate_with_user_object_return($user_name = "") {
        global $database;

        $user_name = $database->escape_value($user_name);

        $query = "SELECT * FROM ". self::$table_name;
        $query .= " WHERE username = '{$user_name}' ";
        $query .= "LIMIT 1";

        $result_user_record = self::read_by_query_and_instantiate($query);

        return !empty($result_user_record) ? array_shift($result_user_record) : false;
    }

    public static function read_by_query_and_instantiate($query = "") {
        global $database;

        $result_set = $database->get_result_from_query($query);

        $objects_array = array();

        while ($row = $database->fetch_array($result_set)) {
//            $objects_array[] = self::instantiate($row);
            array_push($objects_array, self::instantiate($row));
        }

        return $objects_array;
    }

    // This is called if you're reading the user db
    // and instantiating user objects, then displaying them.
    private static function instantiate($record) {
        $object = new self;

        foreach ($record as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }

        return $object;
    }

}
?>