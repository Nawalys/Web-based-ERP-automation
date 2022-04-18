<?php

require_once "database.php";

class certificates extends DataBase
{
    public $name = "";

    public function certificateCheck()
    {
        $query = "SELECT id FROM certificates WHERE name ='$this->name'";
        return $this->GetRow($query);
    }
}

$cCertificates = new certificates;
