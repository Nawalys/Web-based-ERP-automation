<?php

require_once "database.php";

class examinationProcess extends DataBase
{
    public $doctorId = "";
    public $staffId = "";
    public $time = "";
    public $examinationId = "";
    public $comment = "";

    public function createExamination()
    {
        $query = "INSERT INTO examinationprocess SET
            doctorId = '$this->doctorId',
            staffId = '$this->staffId',
            time = '$this->time',
            examinationId = '$this->examinationId',
            comment = '$this->comment'";
        return $this->Query($query);
    }
    public function listAllExamination()
    {
        $query = "SELECT (ep.id)id,(st.id)doctorId,(st.name)doctorName,(st.surname)doctorSurname,COUNT((sta.name))staffName,(ep.time)time,(ex.id)examinationId,(ex.name)examinationName
        FROM examinationprocess AS ep
        left join staff AS st ON ep.doctorId = st.id
        left join staff AS sta ON ep.staffId = sta.id
        left join examinations AS ex ON ep.examinationId = ex.id
        GROUP BY time,examinationName;";
        return $this->GetRows($query);
    }
    public function listDetailExamination()
    {
        $query = "SELECT (ep.id)id,(sta.name)staffName,(sta.surname)staffSurname,(st.name)doctorName,(st.surname)doctorSurname,(ep.time)time,(ex.name)examinationName,(ep.comment)comment
        FROM examinationprocess AS ep
        left join staff AS st ON ep.doctorId = st.id
        left join staff AS sta ON ep.staffId = sta.id
        left join examinations AS ex ON ep.examinationId = ex.id
        WHERE st.id = '$this->doctorId' AND ex.id = '$this->examinationId' AND ep.time = '$this->time'";
        return $this->GetRows($query);
    }
}

$cExaminationProcess = new examinationProcess;
