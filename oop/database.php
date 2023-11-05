<?php

class Database {
    public $host;
    public $username;
    public $password;
    public $database;

    public $connection;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->connect();
    }

    public function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }else {
            echo "";
        }
        
    }

    public function close() {
        $this->connection->close();
    }
}
?>