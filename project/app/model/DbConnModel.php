<?php

class Db {
    public $connection;

    private $servername = "localhost";
    private $db = "DB";
    private $db_username = "rado";
    private $db_password = "123";

    function __construct() {
        try {
            $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->db", $this->db_username, $this->db_password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}