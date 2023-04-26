<?php

class DeleteContrList extends DeleteList{
    private $id;

    public function __construct($id){
        $this->id = $id;
    }

    public function deleteListById(){
        $this->deleteListId($this->id);
    }

    public function deletePhotoById(){
        $this->deletePhotoId($this->id);
    }
}



?>