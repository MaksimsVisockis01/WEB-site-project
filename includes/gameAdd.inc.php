<?php

if(isset($_POST["submit"]) && isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK){

    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $file = $_FILES['file']['name'];
    $file_size =  $_FILES['file']['size'];
    $tmp_image = $_FILES['file']['tmp_name'];
    
    
    include "../classes/dbh.classes.php";
    include "../classes/gameAdd.classes.php";
    include "../classes/gameAdd-contr.classes.php";
    
    
    
    $game = new GameContr($name, $description, $price, $file, $file_size);
    $game->checkGame();

    move_uploaded_file($tmp_image, "../GamePhotos/$file");

    header("location: ../gameAdd.php?error=none");
}