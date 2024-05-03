<?php
class Event
{
    private ?int $idE =null;
    private ?string $nomE =null;
    private ?Date $dateE =null;
    private ?Time $heureE =null;
    private ?string $lieuE =null;
    private ?string $descrpE =null;
    private ?string $categoE =null;
    private ?string $fraisE =null;
    private ?string $img =null;





    public function __construct($idE , $b, $c,$h, $d, $e ,$f ,$g,$i)
    {
        $this->idE = $idE;
        $this->nomE = $b;
        $this->dateE = $c;
        $this->heureE = $h;
        $this->lieuE = $d;
        $this->descrpE = $e;
        $this->categoE = $f;
        $this->fraisE = $g;  
        $this->img = $i;


    }
 
    public function getidE(){return $this->idE;}
    public function getnomE(){return $this->nomE;}
    public function getdateE(){return $this->dateE;}
    public function getheureE(){return $this->heureE;}    
    public function getlieuE() {return $this->lieuE;}
    public function getdescrpE(){return $this->descrpE;}
    public function getgategoE(){ return $this->categoE;}
    public function getfraisE(){return $this->fraisE;}
    public function getimg(){return $this->img;}


    public function setidE(int $val){$this->idE=$val;}
    public function setnomE(string $val){$this->nomE=$val;}
    public function setdateE(Date $val){$this->dateE=$val;}
    public function setheureE(Time $val){$this->heureE=$val;}
    public function setlieuE(string $val){$this->lieuE=$val;}
    public function setdescrepE(string $val){$this->descrepE=$val;}
    public function setgategoE(string $val){$this->categoE=$val;}
    public function setfraisE(string $val){$this->fraisE=$val;}
    public function setimg(string $val){$this->img=$val;}

}
?>