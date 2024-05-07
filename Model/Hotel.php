<?php
class Hotel
{
    private  $id=null;
    private  $name=null;
    private  $location=null;
    private  $description=null;
    private  $images=null;

    public function __construct( $id =null,  $n,   $loc, $desc,  $imgs)
    {
        $this->id =$id;
        $this->name=$n;
        $this->location =$loc;
        $this->description =$desc;
        $this->images =$imgs;
    }



    public function getHotelId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($n)
    {
        $this->name = $n;

        return $this;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($loc)
    {
        $this->location = $loc;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($desc)
    {
        $this->description = $desc;

        return $this;
    }

    public function getImages()
    {
        return $this->images;
    }
}
?>