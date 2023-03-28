<?php

class SignupContr extends Signup{

    private $name;
    private $email;
    private $uid;
    private $pwd;
    private $pwdrepeat;

    public function __construct($name, $email, $uid, $pwd, $pwdrepeat){
        //$this->'vatiable' is from signup.php form
        $this->name = $name;
        $this->email = $email;
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
    }

    public function signupUser(){
        if($this-> emtyInput() == false) {
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if($this-> invalidUid() == false) {
            header("location: ../signup.php?error=invalidUid");
            exit();
        }
        if($this-> invalidEmail() == false) {
            header("location: ../signup.php?error=invalidEmail");
            exit();
        }
        if($this-> pwdMatch() == false) {
            header("location: ../signup.php?error=pwdMatch");
            exit();
        }
        if($this-> uidTakenCheck() == false) {
            header("location: ../signup.php?error=uidoremailTaken");
            exit();
        }

        $this->setUser($this->name, $this->email, $this->uid, $this->pwd);
    }

    private function emtyInput(){
        //$result;
        if(empty($this->name) || empty($this->email) || empty($this->uid) || 
        empty($this->pwd) || empty($this->pwdrepeat)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function invalidUid() {
        //$result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
    
    private function invalidEmail() {
        //$result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
    
    private function pwdMatch() {
        //$result;
        if ($this->pwd !== $this->pwdrepeat) {
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck() {
        //$result;
        if (!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
}