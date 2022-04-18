<?php

use LDAP\Result;

class DataBase
{
    private $host = "localhost";
    private $dbName = "projestaj";
    private $userName = "root";
    private $password = "";
    public $db;


    public function __construct()
    {
        $this->db = mysqli_connect($this->host,$this->userName,$this->password,$this->dbName);
    }

    public function GetRows($query)
    {
        return mysqli_query($this->db,$query);
    }
    public function GetRow($query)
    {
        $rows = mysqli_query($this->db, $query);
        $arr = $rows->fetch_assoc();
        return $arr;
    }
    public function getAll(){
        $tableName = get_class($this);
        $query = "
            SELECT * FROM ". $tableName ."
        ";
        return $this->getRows($query);
    }
    public function Query($query)
    {
        return mysqli_query($this->db,$query);
    }
    public function InsertData($data)
    {
        $tableName = get_class($this);
        $query = "INSERT INTO $tableName SET
        name = '$data'";
        $this->Query($query);
        header("location:/Otomasyon/pages/addData/verikayit.php?verikayit=basarili");
    }

}
?>