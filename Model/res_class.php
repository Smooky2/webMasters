<?php
class res
{
    private ?int $id;
    private ?DateTime $start;
    private ?DateTime $endDate;
    private ?int $Description;
    private ?array $my_image;

    public function __construct( $id,  $s, $e,$d, $i)
    {
        $this->id = $id;
        $this->start = $this->createDateTime($s);
        $this->endDate = $this->createDateTime($e);
        $this->Description = $d;
        $this->my_image = $i;
    }

    private function createDateTime(?string $date): ?DateTime
    {
        if ($date === null) {
            return null;
        }

        // Use try-catch to handle DateTime creation errors
        try {
            return new DateTime($date);
        } catch (Exception $e) {
            // Handle the exception, log it, or return null, depending on your needs
            return null;
        }
    }
    public function getIdEvent()
    {
        return $this->id;
    }

    public function getstart()
    {
        return $this->start;
    }

    public function setstart($s)
    {
        $this->start = $s;

        return $this;
    }

    public function getendDate()
    {
        return $this->endDate;
    }

    public function setendDate($e)
    {
        $this->endDate = $e;

        return $this;
    }

    public function getdesc()
    {
        return $this->Description;
    }

    public function setdesc($d)
    {
        $this->Description = $d;

        return $this;
    }
    public function getimage()
    {
        return $this->my_image['name'];
    }
    
    

    /*public function setimage($my_image)
    {
        $this->my_image = $my_image;

        return $this;
    }*/
}
