<?php

class LoginContr extends Login{

    private $uid;
    private $pwd;

    public function __construct($uid, $pwd){
        //$this->'vatiable' is from login.php form
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function loginUser(){
        if($this-> emtyInput() == false) {
            header("location: ../login.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->uid, $this->pwd);
    }

    private function emtyInput(){
        //$result;
        if(empty($this->uid) || empty($this->pwd)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
}