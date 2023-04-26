<?php

if (isset($_GET['GameId'])) {
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['GameId']);

    include "classes/dbh.classes.php";
    include "classes/updateList.classes.php";
    include "classes/updateList-contr.classes.php";
    
    $update = new UpdateListContr($id);
    $update->checkGameId();
    
}else if(isset($_POST['update']) && !isset($_FILES['file']) && !$_FILES['file']['error'] === UPLOAD_ERR_OK) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $discription = $_POST['discription'];
    $price = $_POST['price'];
    
    $oldfilename = $_POST['oldfilename'];
    $id = validate($_POST['GameId']);

    
    include "../classes/dbh.classes.php";
    include "../classes/updateList.classes.php";
    include "../classes/updateListPOST-contr.classes.php";
    
    $update = new UpdateContrListPOST($name,$discription,$price,$oldfilename,$id);
    $update->updateListOpt();

    
    header("location: ../gameList.php?success=succesfully updated text");
}else if(isset($_POST['update']) && isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK){
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $discription = $_POST['discription'];
    $price = $_POST['price'];
    $newfile = $_FILES['file']['name'];
    
    $oldfilename = $_POST['oldfilename'];
    $id = validate($_POST['GameId']);

    $file_size =  $_FILES['file']['size'];
    $tmp_image = $_FILES['file']['tmp_name'];
    
    include "../classes/dbh.classes.php";
    include "../classes/updateList.classes.php";
    include "../classes/updateListPOST-contr.classes.php";
    
    if ($newfile && $file_size > 0 || $file_size < 2000000) {
        
        if ($oldfilename) {
          $update = new UpdateContrListPOST($name,$discription,$price,$newfile,$id);
          $update->updateListOpt();
          $oldFilePath = '../GamePhotos/' . $oldfilename;
          if (file_exists($oldFilePath)) {
            unlink($oldFilePath);
          }
        }
        move_uploaded_file($tmp_image, "../GamePhotos/$newfile");
        header("location: ../gameList.php?success=succesfully updated text and photo");
    }
}else {
    
    header("Location: gameList.php?error=error");
}

?>