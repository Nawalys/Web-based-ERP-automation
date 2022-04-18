<?php
require_once "database.php";

class examinationFollowUp extends DataBase
{
    public $staffId = "";
    public $examinationId = "";

    public function addNewEmploymentExamination()
    {
        $query = "INSERT INTO examinationfollowup SET
        staffId = '$this->staffId',
        examinationId = '1'";

        return $this->Query($query);
    }
    public function deleteExamination()
    {
        $query = "DELETE FROM examinationfollowup 
        WHERE staffId = '$this->staffId'";
        return $this->Query($query);
    }
    public function listFollowUpExaminations()
    {
        $query = "SELECT (st.tc)tc,(st.name)name,(st.surname)surname,(st.startDate)startDate,(ex.name)examinationName
        FROM examinationfollowup AS ef
        left join staff AS st ON ef.staffId = st.id
        left join examinations AS ex ON ef.examinationId = ex.id";
        return $this->GetRows($query);
    }
}

$cExaminationFollowUp = new examinationFollowUp;
