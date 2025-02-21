<?php
include "database.php";
    class tache_transaction{
        private $conn;
        public function __construct(){
            $db = new database();
            $this->conn = $db->connect();
        }
    }
?>