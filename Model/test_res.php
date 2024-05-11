<?php
class res2
{
    private  $id;
    private  $start;
    private  $endDate;
    private  $Description;

    public function __construct( $id,  $s, $e,$d)
    {
        $this->id = $id;
        $this->start =$s;
        $this->endDate = $e;
        $this->Description = $d;
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

}
?>
