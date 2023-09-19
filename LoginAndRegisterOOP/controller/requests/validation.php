<?php

$configPath = __DIR__ . '\..\..\database\config.php';
include_once $configPath;


class validtaion extends config
{

    private string $filterValue;


    public function getFilterValue():string
    {
        return $this->filterValue;
    }

    public function isExists($name) // First 
    {
        return isset($_POST[$name]) ? "" : "$name is required";
    }

    public function required($name, $value) // Second 
    {
        return empty($value) ? "$name is required" : '';
    }


    public function realEscape($value) // Third
    {
        $config = new config;
        $connect = $config->getConn();
        $this->filterValue = $connect->real_escape_string($value);
    }

    public function unique($table, $name, $value) // Fourth 
    {
        $query = "SELECT * FROM $table WHERE $name = '$value'";
        $config = new config;
        $connect = $config->getConn();
        $result = $connect->query($query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return [];
        }
    }
    public function confirmed($name ,$value , $valueconfirm){
        return $value == $valueconfirm ? "" : "$name Not matching";
    }
}
