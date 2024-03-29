<?php

namespace App\Models;

use Config\Database\DB;

require_once ROOT_PATH .  "config/db.php";

abstract class BaseModel {

    protected $table;
    protected $columns;

    public function insert($values)
    {
        return DB::insert_to_db($values, $this->columns, $this->table);
    }

    public function get_one($id)
    {
        return DB::select_one_from_db($this->table, $id);
    }

    public function get_many()
    {
        return DB::select_many_from_db($this->table);
    }

    public function delete($id)
    {
        return DB::delete_from_db($this->table, $id);
    }

    public function query_db($query){
        return DB::query_db($query);
    }

    public function last_insert_id(){
        return mysqli_fetch_assoc($this->query_db("SELECT * FROM $this->table ORDER BY id DESC LIMIT 1"))["id"];
    }

    public function get_in_range($ids){
        $query = "";
        
        for($i = 0; $i < count($ids) - 2; $i++):
            $query .= (string) "id = ". $ids[$i]. " OR ";
        endfor;

        $query .= " id = ". $ids[count($ids) - 1] . ";";
        $query = "SELECT * FROM $this->table WHERE $query";
        return $this->query_db($query);
    }
}
