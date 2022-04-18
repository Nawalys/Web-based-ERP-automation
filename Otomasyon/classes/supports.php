<?php
require_once "database.php";



class supports extends DataBase
{
    public $id = "";
    public $staffId = "";
    public $technicalStaffId = "";
    public $subject = "";
    public $explanation = "";
    public $situation = "";

    public function addNewSupport()
    {
        $query = "INSERT INTO supports SET
        staffId = '$this->staffId',
        subject = '$this->subject',
        explanation = '$this->explanation' ";

        return $this->Query($query);
    }

    public function selfSupportList()
    {
        $query = "SELECT (sup.id)id,(sup.situation)situation,(tst.name)name,(tst.surname)surname,(sup.subject)subject
        FROM supports AS sup        
        left join staff AS tst ON sup.technicalStaffId = tst.id
        left join staff AS stf ON sup.staffId = stf.id
        WHERE sup.staffId = '$this->staffId' ORDER BY Id DESC";
        return $this->GetRows($query);
    }
    public function allSupportList()
    {
        $query = "SELECT  (sup.id)id,(stf.name)stfName,(stf.surname)stfSurname,(tst.name)tstName,(tst.surname)tstSurname,(sup.subject)subject,(sup.explanation)explanation,(sup.situation)situation
        FROM supports AS sup
        left join staff AS tst ON sup.technicalStaffId = tst.id
        left join staff AS stf ON sup.staffId = stf.id";
        return $this->GetRows($query);
    }
    public function updateSupport()
    {
        $query = "UPDATE supports SET 
        technicalStaffId = '$this->technicalStaffId',
        situation = '$this->situation'
        WHERE id = '$this->id'";
        return $this->Query($query);
    }
    public function deleteSupport()
    {
        $query ="DELETE FROM supports WHERE id = '$this->id'";
        return $this->Query($query);
    }
}

$cSupports = new supports;

?>