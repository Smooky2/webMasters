<?php
    class role
    {
        private $idrole;
        private $titre;


        function __construct($idrole, $titre){
			$this->idrole=$idrole;
			$this->titre=$titre;
		}

        function setidrole(string $idrole){
			$this->idrole=$idrole;
		}
        function settitre(string $titre){
			$this->titre=$titre;
		}



        function getidrole(){
			return $this->idrole;
		}
        function gettitre(){
			return $this->titre;
		}
	

      

        
    }
    

?>