<?php

$configPath = __DIR__ . '\..\database\config.php';

include_once $configPath;

class User
{
    private int $id;
    private string $username;
    private string $email;
    private string $password;

    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = md5($password);

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function create(){
        $query = "INSERT INTO `users`(username,email,password)
        VALUES('$this->username' ,'$this->email','$this->password')";
        $config = new config;
        $connect = $config->getConn();
        $result = $connect->query($query);
        if ($result){
            return true;
        }
        else {
            return false;
        }
    }
    public function read(){
        //code
    }
    public function update(){
        //code
    }
    public function delete(){
        //code
    }
    public function login(){
        $query = "SELECT * FROM `users` WHERE email = '$this->email' AND password = '$this->password' ";

        $config = new config;
        $connect = $config->getConn();
        $result = $connect->query($query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return [];
        }
    }
}
