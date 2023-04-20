<?php

class UpdateContr extends Update{
    private $id;

    public function __construct($id){
        $this->id = $id;
    }

    public function checkId(){
        $this->getOpt($this->id);
    }
}



?>