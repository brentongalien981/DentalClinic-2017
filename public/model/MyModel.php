<?php
/**
 * Created by PhpStorm.
 * User: ops
 * Date: 2017-09-22
 * Time: 09:08
 */

class MyModel
{

    protected static $searchable_fields;
    protected static $db_fields;


    protected function get_sanitized_attributes()
    {
        global $database;
        $sanitized_attributes = array();
        // sanitize the values before submitting
        // Note: does not alter the actual value of each attribute
        foreach ($this->get_attributes() as $key => $value) {
            $sanitized_attributes[$key] = $database->escape_value($value);
        }
        return $sanitized_attributes;
    }

    protected function has_attribute($attribute) {
        // We don't care about the value, we just want to know if the key exists
        // Will return true or false
        return array_key_exists($attribute, $this->get_attributes());
    }

    protected function get_attributes()
    {
        // return an array of attribute names and their values
        $attributes = array();
        foreach (self::$db_fields as $field) {
            if (property_exists($this, $field)) {
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }

    public static function updateByQuery($query = "")
    {
        global $database;

        $database->get_result_from_query($query);
        return ($database->get_num_of_affected_rows() == 1) ? true : false;
    }

    public static function readByQuery($query = "")
    {
        global $database;

        $result_set = $database->get_result_from_query($query);

        //
        return $result_set;
    }

}