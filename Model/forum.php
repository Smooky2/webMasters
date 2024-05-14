<?php

class forum
{
    private ?string $id_forum=null ;
    private string $titre ;
    private string $description  ;
    private string $date_creation ;
    

    public function getid_forum()
    {
        return $this->id_forum;
    }
    public function setid_forum($a)
    {
        $this->id_forum=$a;
    }
    public function gettitre()
    {
        return $this->titre;
    }
    public function settitre($a)
    {
        $this->titre=$a;
    }
    public function getdescription()
    {
        return $this->description;
    }
    public function setdescription($a)
    {
        $this->description=$a;
    }
    public function getdate_creation()
    {
        return $this->date_creation;
    }
    public function setdate_creation($a)
    {
        $this->date_creation=$a;
    }
    
    
    public function __construct( $id_forum=null, $titre, $description, $date_creation)
    {
        $this->id_forum=$id_forum;
        $this->titre=$titre;
        $this->description=$description;
        $this->date_creation = $date_creation;
        
        
    }
       
        
    }

?>