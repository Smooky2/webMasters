<?php
class Review
{
    private ?int $idRev =null;
    private ?string $stars =null;
    private ?DateTime $dateRev =null;
    private ?int $idev=null;



    public function __construct($b,$idev, $idRev=null,$h=null)
    {
        $this->idRev = $idRev;
        $this->stars = $b;
       
        $this->dateRev = new DateTime();
        
        $this->idev = $idev;
        


    }
 
    public function getidRev(){return $this->idRev;}
    public function getstars(){return $this->stars;}
    public function getdateRev(){return $this->dateRev;}    

    public function getidev() {return $this->idev;}



    public function setsatrs(string $val){$this->stars=$val;}

}
?>