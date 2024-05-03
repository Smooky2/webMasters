<?php
class Review
{
    private ?int $idRev =null;
    private ?string $stars =null;
    private ?DateTime $dateRev =null;
    private ?int $id_user=1;
    private ?int $idev=null;



    public function __construct($b,$idev, $idRev=null,$h=null, $id_user=null)
    {
        $this->idRev = $idRev;
        $this->stars = $b;
       
        $this->dateRev = new DateTime();
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