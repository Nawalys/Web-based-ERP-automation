<?php

require_once "database.php";

class trainingProcess extends DataBase
{
    public $id = "";
    public $trainingId = "";
    public $engineerStaffId = "";
    public $welderStaffId = [];
    public $time = "";
    public $situation = "";

    public function addTrainingProcess()
    {
        foreach ($this->welderStaffId as $welder) {
            $query = "INSERT INTO trainingprocess 
            (trainingId, engineerStaffId, welderStaffId, trainingTime, situation) VALUES
            ('$this->trainingId', '$this->engineerStaffId', '$welder', '$this->time', '$this->situation')";
            $this->Query($query);
        }
    }
    public function listTrainingProcess()
    {
        $query = "SELECT (tp.id)id,(tr.name)trainingName,(st.id)engineerId,(st.name)engineerName,(st.surname)engineerSurname,COUNT((sta.name))welderName,(tp.trainingTime)time
        FROM trainingprocess AS tp
        left join staff AS st ON tp.engineerStaffId = st.id
        left join staff AS sta ON tp.welderStaffId = sta.id
        left join trainings AS tr ON tp.trainingId = tr.id
		GROUP BY trainingName,time,engineerName;";
        return $this->GetRows($query);
    }
    public function listDetailTrainingProcess()
    {
        $query = "SELECT (tp.id)tId,(sta.name)welderName,(sta.surname)welderSurname,(tr.name)trainingName,(st.name)engineerName,(st.surname)engineerSurname,(tp.trainingTime)time,(tp.situation)situation,(sta.id)welderId
            FROM trainingprocess AS tp
            left join staff AS st ON tp.engineerStaffId = st.id
            left join staff AS sta ON tp.welderStaffId = sta.id
            left join trainings AS tr ON tp.trainingId = tr.id
            WHERE tr.name = '$this->trainingId' AND st.id = '$this->engineerStaffId' AND tp.trainingTime = '$this->time';";
        return $this->GetRows($query);
    }
    public function updateTrainingStatus()
    {
        $query = "UPDATE trainingprocess SET
        situation = '$this->situation'
	    WHERE welderStaffId = '$this->welderStaffId' AND id = '$this->id'";
        $this->Query($query);
    }
}

$cTrainingProcess = new trainingProcess;