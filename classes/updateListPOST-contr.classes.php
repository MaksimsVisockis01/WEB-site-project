<?php
// var_dump($_POST);
// var_dump($_FILES);
// die();
class UpdateContrListPOST extends UpdateList{

    private $name;
    private $discription;
    private $price;
    private $file;
    private $id;

    public function __construct($name,$discription,$price,$file,$id){
        $this->name = $name;
        $this->discription = $discription;
        $this->price = $price;
        $this->file = $file;
        $this->id = $id;
    }

    public function updateListOpt(){
        if($this-> emptyInput() == false) {
            header("location: ../gameList.php?error=emptyinput");
            exit();
        }
        if($this-> invalidFileExtension() == false) {
            header("location: ../gameList.php?error=invalidFileExtension");
            exit();
        }
        $this->Update($this->name, $this->discription,$this->price,$this->file,$this->id);
    }

    private function emptyInput(){
        if(empty($this->name) || empty($this->discription) || empty($this->price)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    private function invalidFileExtension() {
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        $file_extension = pathinfo($this->file, PATHINFO_EXTENSION);
        
        if (!in_array(strtolower($file_extension), $allowed_extensions)) {
            $result = false;
        } else {
            $result = true;
        }
        
        return $result;
    }
}



?>