<?php

class Database {
    private $db_host;
    private $db_user;
    private $db_password;
    private $db_name;
    protected $connection;

    function __construct() {
        $this->db_host = Config::$db_host;
        $this->db_user = Config::$db_user;
        $this->db_password = Config::$db_password;
        $this->db_name = Config::$db_name;

        $this->get_connect();
    }

    private function get_connect(){
        try {
            $this->connection = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }

    // get data form table
    function select($sql){
        try {
            $cmd = $this ->connection->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll();
        } catch(PDOException $err){
            return [];
        }
    }
    
    function query($sql){
        try {
            $cmd = $this ->connection->exec($sql);
            return true;
        } catch(PDOException $err){
            return false;
        }
    }

    function __destruct(){
        $this->connection = null;
    }
}