<?php 
class Notification {
    private $id;
    private $user_id;
    private $requested_role_id;

    public function __construct($id, $user_id, $requested_role_id) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->requested_role_id = $requested_role_id;
    }

    public function getId() {
        return $this->id;
    }

    public function getUser_id() {
        return $this->user_id;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    public function getRequested_role_id() {
        return $this->requested_role_id;
    }

    public function setRequested_role_id($requested_role_id) {
        $this->requested_role_id = $requested_role_id;
    }

}

?>