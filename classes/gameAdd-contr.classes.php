<?php
// var_dump($_POST);
// var_dump($_FILES);
// die();
class GameContr extends Game{

    private $name;
    private $description;
    private $price;
    private $file;
    private $file_size;

    public function __construct($name, $description, $price, $file, $file_size){
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->file = $file;
        $this->file_size = $file_size;
    }

    public function checkGame(){
        if($this-> emptyInput() == false) {
            header("location: ../gameAdd.php?error=emptyinput");
            exit();
        }
        if($this-> gameTaken() == false) {
            header("location: ../gameAdd.php?error=gameTaken");
            exit();
        }
        if($this-> invalidFileExtension() == false) {
            header("location: ../gameAdd.php?error=invalidfileextension");
            exit();
        }

        $this->addGame($this->name, $this->description, $this->price, $this->file);
    }

    private function emptyInput(){
        if(empty($this->name) || empty($this->description) || empty($this->price) || $this->file_size <= 0){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    private function gameTaken() {
        if (!$this->Gamecheck($this->name)) {
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidFileExtension() {
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        $file_extension = pathinfo($this->file, PATHINFO_EXTENSION);
        
        if (!in_array($file_extension, $allowed_extensions)) {
            $result = false;
        } else {
            $result = true;
        }
        
        return $result;
    }
}