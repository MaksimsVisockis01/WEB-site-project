<?php

class DeleteContr extends Delete{
    private $id;

    public function __construct($id){
        $this->id = $id;
    }

    public function deleteId(){
        $this->deleteUser($this->id);
    }
}



?>