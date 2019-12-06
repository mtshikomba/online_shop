<?php

namespace Config\Database;
use mysqli;

class DB {

    public static function connect()
    {
        // Create connection
        $conn = new mysqli("localhost", "root", "", "online_shop");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            return $conn;
        }
    }

    // select one
    public static function select_one_from_db($table, $id)
    {
        
        return \mysqli_query(DB::connect(), "SELECT * FROM $table WHERE id = $id");
    }

    // select many
    public static function select_many_from_db($table)
    {
        return \mysqli_query(DB::connect(), "SELECT * FROM $table");
    }

    // delete
    public static function delete_from_db($table, $id)
    {
        
        return \mysqli_query(DB::connect(),"DELETE FROM $table WHERE id = $id");
    }

    // insert
    public static function insert_to_db($values, $table)
    {
        
        $values = implode("','", $values);
        return \mysqli_query(DB::connect(), "INSERT INTO $table VALUES ($values)");
    }
}
