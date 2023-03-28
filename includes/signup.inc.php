<?php

if(isset($_POST["submit"])){

    // grabbing the data from login.php form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];

    // SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($name, $email, $uid, $pwd, $pwdrepeat);


    $signup->signupUser();

    header("location: ../signup.php?success=none");
}