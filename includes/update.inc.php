<?php
if (isset($_GET['usersId'])) {
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['usersId']);

    include "classes/dbh.classes.php";
    include "classes/update.classes.php";
    include "classes/update-contr.classes.php";
    
    $update = new UpdateContr($id);
    $update->checkId();
}else if(isset($_POST['update'])){
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $username = validate($_POST['username']);
    $id = validate($_POST['usersId']);
    
    include "../classes/dbh.classes.php";
    include "../classes/update.classes.php";
    include "../classes/updatePOST-contr.classes.php";
    
    $update = new UpdateContrPOST($name,$email,$username,$id);
    $update->updateOpt();
    
}else {
    header("Location: users.php");
}





?>