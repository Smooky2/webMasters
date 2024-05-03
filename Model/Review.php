<?php
class Review
{
    private ?int $idRev =null;
    private ?string $stars =null;
    private ?DateTime $dateRev =null;
    private ?int $id_user=null;
    private ?int $idev=null;



    public function __construct($idRev=null , $b,$h, $id_user=null,$idev=null)
    {
        $this->idRev = $idRev;
        $this->stars = $b;
        $this->dateRev = $h;
        $this->id_user = $id_user;
        $this->idev = $idev;

    }
 
    public function getidRev(){return $this->idRev;}
    public function getstars(){return $this->stars;}
    public function getdateRev(){return $this->dateRev;}    
    public function getid_user() {return $this->id_user;}
    public function getidev() {return $this->idev;}



    public function setsatrs(string $val){$this->stars=$val;}

}
?>