<?php

class DatabaseConnection {

    private $host = 'localhost';
    private $dbname = 'tasklist';
    private $user = 'root';
    private $pass = 'root';

    public function connect() {
        try {
            $connection = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                $this->user,
                $this->pass,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                )
            );

            return $connection;
        } catch (PDOException $e) {
            error_log('Connection failed: ' . $e->getMessage());
            die('Connection failed: ' . $e->getMessage());
        }
    }
}
?>
