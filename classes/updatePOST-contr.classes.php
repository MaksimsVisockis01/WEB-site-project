<?php
class UpdateContrPOST extends Update{

    private $name;
    private $email;
    private $username;
    private $id;

    public function __construct($name,$email,$username,$id){
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->id = $id;
    }

    public function updateOpt(){
        if($this-> emtyInput() == false) {
            header("location: ../update.php?error=emptyinput");
            exit();
        }
        $this->Update($this->name, $this->email,$this->username,$this->id);
    }

    private function emtyInput(){
        if(empty($this->name) || empty($this->email) || empty($this->username)|| empty($this->id)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
}



?>