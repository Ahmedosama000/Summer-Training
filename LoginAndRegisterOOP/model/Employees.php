<?php

$configPath = __DIR__ . '\..\database\config.php';

include_once $configPath;

class Employees
{
    private int $id;
    private string $name;
    private int $salary;
    private string $address;
    private string $gender;
    private string $image;


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

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of salary
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set the value of salary
     *
     * @return  self
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    public function create()
    {

        $query = "INSERT INTO employees(name , salary , address , gender , image)
        VALUES ('$this->name' , '$this->salary' , '$this->address' , '$this->gender','$this->image')";

        $config = new config;
        $connect = $config->getConn();
        $result = $connect->query($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function read()
    {
        $query = "SELECT * FROM employees";
        $config = new config;
        $connect = $config->getConn();
        $result = $connect->query($query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return [];
        }
    }
    public function update()
    {
        $query = "UPDATE `employees` SET `name` = '$this->name',
        `salary` = '$this->salary',
        `address` = '$this->address',
        `gender` = '$this->gender',
        `image` = '$this->image'
        WHERE `employees`.`id` = '$this->id'";

        $config = new config;
        $connect = $config->getConn();
        $result = $connect->query($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function delete()
    {
        $query = $deleteSql = "DELETE FROM employees WHERE id=$this->id";

        $config = new config;
        $connect = $config->getConn();
        $result = $connect->query($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function readByID()
    {
        $query = "SELECT * FROM employees WHERE id = '$this->id' ";
        $config = new config;
        $connect = $config->getConn();
        $result = $connect->query($query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return [];
        }
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}
