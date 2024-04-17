<?php
class User {
    private $id;
    private $nom;
    private $prenom;
    private $emails;
    private $adresse;
    private $pass;
    private $rpass;
    private $dater;
    private $phone;
    private $gender;
    private $idrole;
    // Constructor to initialize the user object
    public function __construct($id, $nom, $prenom, $emails, $adresse, $pass, $rpass, $dater, $phone, $gender,$idrole) {
        $this->id = uniqid();
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->emails = $emails;
        $this->adresse = $adresse;
        $this->pass = $pass;
        $this->rpass = $rpass;
        $this->dater = $dater;
        $this->phone = $phone;
		$this->gender = $gender;
        $this->idrole = $idrole;
    }

 

    // Getters and setters for each attribute
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getidrole() {
        return $this->idrole;
    }

    public function setidrole($idrole) {
        $this->idrole = $idrole;
    }
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getEmails() {
        return $this->emails;
    }

    public function setEmails($emails) {
        $this->emails = $emails;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function getPass() {
        return $this->pass;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function getRpass() {
        return $this->rpass;
    }
    public function getGender() {
        return $this->gender;
    }
    public function setRpass($rpass) {
        $this->rpass = $rpass;
    }

    public function getDater() {
        return $this->dater;
    }

    public function setDater($dater) {
        $this->dater = $dater;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }
	public function setGender($gender) {
        $this->gender = $gender;
    }
}


?>