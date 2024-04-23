  <?php  
    
    class message
    {

    private ?string $id_message=null ;
    private string $contenu;
    private string $date_sys;
    private string $id_forum;
    private string $id_user;
    
    public function getidmessage()
    {
        return $this->id_message;
    }

    public function getcontenu()
    {
        return $this->contenu;
    }

    public function getIdUser()
    {
        return $this->id_user;
    }

    public function getDateSys()
    {
        return $this->date_sys;
    }

    public function getIdforum()
    {
        return $this->id_forum;
    }
    
    public function __construct( $id_message=null, $contenu, $date_sys,$id_forum )
    {
        $this->id_message=$id_message;
        $this->contenu=$contenu;
        $this->date_sys=$date_sys;
        $this->id_forum = $id_forum;
        $this->id_forum = $id_user;

        
    }
}
    ?>