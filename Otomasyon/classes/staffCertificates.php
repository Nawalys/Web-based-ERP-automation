<?php

require_once "database.php";

class staffCertificates extends DataBase
{
    public $id = "";
    public $staffId = "";
    public $certificateId = [];

    public function addPersonalCertificate()
    {
        foreach ($this->certificateId as $cer) {
            $query = "INSERT INTO  staffcertificates
                (staffId, certificateId) VALUES
                ($this->staffId, $cer)";
            $this->Query($query);
        }
    }
    public function addPersonalOneCertificate()
    {
        $query = "INSERT INTO staffcertificates SET
        staffId = '$this->staffId',
        certificateId = '$this->certificateId'";
        $this->Query($query);
    }
    public function listStaffCertificate($department)
    {
        if ($department == "İnsan kaynakları" || $department == "Bilgi teknolojileri") {
            $subquery = "GROUP BY staffName,staffSurname";
        } elseif ($department == "Revir") {
            $subquery = "WHERE sc.certificateId = '1' OR 
                        sc.certificateId = '2' 
                        GROUP BY staffName,staffSurname";
        } elseif ($department == "Kalite kontrol") {
            $subquery = "WHERE (st.position = 'Kaynakçı') AND 
                        sc.certificateId = 5 OR 
                        sc.certificateId = 6 OR 
                        sc.certificateId = 7 
                        GROUP BY staffName,staffSurname";
        }

        $query = "SELECT (sc.id)id,(st.id)staffId,(st.name)staffName,(st.surname)staffSurname,(st.tc)staffTc,COUNT((ce.name))certificateName
        FROM staffcertificates AS sc
        left join staff AS st ON sc.staffId = st.Id
        left join certificates AS ce ON sc.certificateId = ce.Id
        " . $subquery;
        return $this->GetRows($query);
    }
    public function listStaffCertificateDetail($department)
    {
        if ($department == "") {
            $subquery = "";
        } elseif ($department == "İnsan kaynakları" || $department == "Bilgi teknolojileri") {
            $subquery = "";
        } elseif ($department == "Revir") {
            $subquery = "AND (sc.certificateId = '1' OR sc.certificateId = '2')";
        } elseif ($department == "Kalite kontrol") {
            $subquery = "AND (st.position = 'Kaynakçı') AND 
                            (sc.certificateId = 5 OR 
                            sc.certificateId = 6 OR 
                            sc.certificateId = 7)";
        }
        $query = "SELECT (sc.id)id,(ce.name)certificateName,(st.name)staffName,(st.surname)staffSurname
        FROM staffcertificates AS sc
        left join staff AS st ON sc.staffId = st.Id
        left join certificates AS ce ON sc.certificateId = ce.Id
        WHERE sc.staffId = '$this->staffId'" . $subquery;
        return $this->Query($query);
    }
    public function deletePersonalCertificate()
    {
        $query = "DELETE FROM staffcertificates WHERE id = '$this->id'";
        return $this->Query($query);
    }
}

$cStaffCertificates = new staffCertificates;
