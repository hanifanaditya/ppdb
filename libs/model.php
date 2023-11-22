<?php

class Model extends Database {

    protected $table = "";
    protected $primary_key = "";

    function All(){
        try {
            $sql = "SELECT * FROM $this->table";
            return $this->select($sql);
        } catch(PDOException $err){
            return [];
        }
    }

    function GetByID($id){
        try {
            $sql = "SELECT * FROM $this->table WHERE $this->primary_key = $id";
            return $this->select($sql);
        } catch(PDOException $err){
            return [];
        }
    }

    function Insert($args = []){
        try {
            foreach($args as $k=>$v){
                $field[] = $k;
                $value[] = $v;
            }

            $f = join(',',$field);
            $v = "'" . implode ( "', '", $value ) . "'";

            $sql = "INSERT INTO $this->table ( $f ) VALUES ( $v )";

            return $this->query($sql);

        } catch(PDOException $err){
            return [];
        }
    }

    function Update($id,$args = []){
        try {
            foreach($args as $key=>$value){
                $field[] = $key."='".$value."'";
            }
            $set = join(',',$field);
            $sql = "UPDATE $this->table SET $set WHERE $this->primary_key = $id";

            return $this->query($sql);

        } catch(PDOException $err){
            return [];
        }
    }

    function Delete($id){
        try {
            $sql = "DELETE FROM $this->table WHERE $this->primary_key = $id";

            return $this->query($sql);

        } catch(PDOException $err){
            return [];
        }
    }
}