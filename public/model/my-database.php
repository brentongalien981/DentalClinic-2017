<?php


class MySQLDatabase {

    private $connection;

//    private $prepared_statement;

    function __construct() {
        $this->open_connection();
    }


    /**
     * @return bool|mysqli_result
     */
    public function start_transaction() {
//        $query = "SET autocommit=0;";
        $query = "START TRANSACTION";

        $is_result_ok = true;


        try {
            
            
            
            $query_result = $this->get_result_from_query($query);
            
        }
        catch (Exception $e) {
            $is_result_ok = false;

            
            
            
        }
        finally {
            //
            
        }


        
        return $is_result_ok;
    }


    public function commit() {
        $query = "COMMIT";

        $is_result_ok = true;

        try {
            $this->get_result_from_query($query);
        }
        catch (Exception $e) {
            $is_result_ok = false;

            
            
            
        }
        finally {
            // TODO:DEBUG
            
            
            //
            return $is_result_ok;
        }
    }



    public function rollback() {
        $query = "ROLLBACK";

        $is_result_ok = true;

        try {
            $this->get_result_from_query($query);
        }
        catch (Exception $e) {
            $is_result_ok = false;

            
            
            
        }



        //
        return $is_result_ok;
    }





    public function open_connection() {
        $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        if (mysqli_connect_errno()) {
            die("Database connection failed: " .
                mysqli_connect_error() .
                " (" . mysqli_connect_errno() . ")"
            );
        }
    }

    public function get_connection() {
        return $this->connection;
    }

    public function escape_value($string) {
        $escaped_string = mysqli_real_escape_string($this->connection, $string);
        return $escaped_string;
    }

    public function close_connection() {
        if (isset($this->connection)) {
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }

    private function confirm_query_result($query_result) {
        if (!$query_result) {
            die("Database query failed.");
        }
    }

    public function fetch_array($result_set) {
        return mysqli_fetch_array($result_set);
    }

    public function get_last_inserted_id() {
        // get the last id inserted over the current db connection
        return mysqli_insert_id($this->connection);
    }

    public function get_num_of_affected_rows() {
        return mysqli_affected_rows($this->connection);
    }

    public function get_escaped_value($string) {
        $escaped_string = mysqli_real_escape_string($this->connection, $string);
        return $escaped_string;
    }

    public function get_num_rows_of_result_set($result_set) {
        return mysqli_num_rows($result_set);
    }

    public function get_result_from_query($query) {
        $result = mysqli_query($this->connection, $query);
        $this->confirm_query_result($result);
        return $result;
    }

}

$database = new MySQLDatabase();
?>