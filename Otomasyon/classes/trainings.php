<?php

require_once "database.php";

class trainings extends DataBase
{
    public $id = "";
    public $name = "";

    public function getTrainingName()
    {
        $query = "SELECT name FROM trainings WHERE id = '$this->id'";
        return $this->GetRow($query);
    }
}

$cTrainings = new trainings;