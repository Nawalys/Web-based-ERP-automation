<?php

use LDAP\Result;

require_once "database.php";

class staff extends DataBase
{
    public $id = "";
    public $tc = "";
    public $name = "";
    public $surname = "";
    public $birthday = "";
    public $gender = "";
    public $phoneNumber = "";
    public $email = "";
    public $adrress = "";
    public $startDate = "";
    public $department = "";
    public $position = "";
    public $password = "";

    public function matchCheck()
    {
        // Kullanıcı adı-şifre var mı kontrolü
        $query = "SELECT * FROM staff 
        WHERE tc = '$this->tc' AND password = '$this->password'";
        return $this->GetRows($query);
    }
    public function getStaffId()
    {
        //Tc ile personelin Id sini alma
        $query = "
        SELECT id FROM staff
        WHERE tc = '$this->tc'
        ";
        $result = $this->GetRow($query);
        $id = $result["id"];
        return $id;
    }
    public function sessionCheck()
    {
        $query = "SELECT * FROM staff WHERE tc = '$this->tc'";
        $result = $this->GetRow($query);

        if (!isset($result)) {
            header("location:/Otomasyon/pages/login/giris.php");
        } else {
            return $result;
        }
    }
    public function changePassword()
    {
        $query = "UPDATE staff SET 
        password = '$this->password' 
        WHERE tc = '$this->tc'";

        return $this->Query($query);
    }
    public function addNewStaff()
    {
        $query = "INSERT INTO staff SET
            tc = '$this->tc',
            name = '$this->name',
            surname = '$this->surname',
            birthday = '$this->birthday',
            gender = '$this->gender',
            phoneNumber = '$this->phoneNumber',
            email = '$this->email',
            address = '$this->adrress',
            startDate = '$this->startDate',
            department = '$this->department',
            position = '$this->position' ";
        return $this->Query($query);
    }
    public function updateStaff()
    {
        $query = "UPDATE staff SET
            tc = '$this->tc',
            name = '$this->name',
            surname = '$this->surname',
            birthday = '$this->birthday',
            gender = '$this->gender',
            phoneNumber = '$this->phoneNumber',
            email = '$this->email',
            address = '$this->adrress',
            startDate = '$this->startDate',
            department = '$this->department',
            position = '$this->position'  WHERE Id = '$this->id'";

        return $this->Query($query);
    }
    public function deleteStaff()
    {
        $query = "DELETE FROM staff
        WHERE id = '$this->id'";

        return $this->Query($query);
    }
    public function searchStaff($value)
    {
        $query = ("SELECT * FROM staff WHERE 
        name LIKE '%$value%' OR 
        tc LIKE '%$value%'");
        $x = 0;
        $result = $this->GetRows($query);
        while ($row = $result->fetch_array()) {
            $x++;
            if ($x < 11) {
                $tc = $row['tc'];
                $name = $row['name'];
                $surname = $row['surname'];
                echo '<li class="list-group-item">' . $tc . '|' . $name . ' ' . $surname . '</li>';
            }
        }
    }
    public function getStaffName()
    {
        $query = "SELECT name,surname FROM staff WHERE id = '$this->id'";
        return $this->GetRow($query);
    }
}

$cStaff = new staff;
