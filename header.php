<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Databes Website</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navbar.css">
    <script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous"></script>
    <script>
    $(function() {
      $(".toggle").on("click", function() {
          if ($(".item").hasClass("active")) {
              $(".item").removeClass("active");
          } else {
              $(".item").addClass("active");
          }
      });
    });
    </script>
  </head>
<body>

<nav>
    <ul class="menu">
        <li class="logo"><a href="index.php">GameShop</a></li>
        <li class="item"><a href="#">About</a></li>
        <li class="item"><a href="#">Forum</a></li>
        <li class="item"><a href="#">Services</a></li>

        <?php
        if(isset($_SESSION["userid"])){
            echo"
              <li class='item button secondary'><a href='logout.php'>Logout</a></li>
            ";
        }elseif(isset($_SESSION["adminid"])){
            echo"
              <li class='item'><a href='users.php'>User Ctrl</a></li>
              <li class='item button secondary'><a href='logout.php'>Logout</a></li>
            ";
        
        }else{
            echo"
              <li class='item button'><a href='login.php'>Log In</a></li>
              <li class='item button secondary'><a href='signup.php'>Sign Up</a></li>
            ";
        }
        ?>
        
        <li class="toggle"><span class="bars"></span></li>
    </ul>
</nav>
