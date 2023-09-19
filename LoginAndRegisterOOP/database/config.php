<?php

class config {

    private string $hostname = "localhost";
    private string $username = "root";
    private string $password = "";
    private string $dbname = 'phpdemo';
    private $conn;
    
    public function __construct() {
        $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
    }

    /**
     * Get the value of conn
     */ 
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * Set the value of conn
     *
     * @return  self
     */ 
    public function setConn($conn)
    {
        $this->conn = $conn;

        return $this;
    }
}
