<?php

class UpdateListContr extends UpdateList{
    private $id;

    public function __construct($id){
        $this->id = $id;
    }

    public function checkGameId(){
        $this->getOpt($this->id);
    }
}



?>