<?php

if(isset($_POST["submit"])){

    // grabbing the data from login.php form
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    

    // SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($uid, $pwd);


    $login->loginUser();

    header("location: ../index.php?error=none");
}