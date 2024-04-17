<?php

class forum
{
    private ?string $id_forum=null ;
    private string $titre ;
    private string $description  ;
    private string $date_creation ;
    private int $createur_forum_id;

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
    public function getcreateur_forum_id()
    {
        return $this->createur_forum_id;
    }
    public function setcreateur_forum_id($a)
    {
        $this->createur_forum_id=$a;
    }
    
    public function __construct( $id_forum=null, $titre, $description, $date_creation,$createur_forum_id )
    {
        $this->id_forum=$id_forum;
        $this->titre=$titre;
        $this->description=$description;
        $this->date_creation = $date_creation;
        $this->createur_forum_id=$createur_forum_id;
        
    }
       
        
    }

?>