<?php  

include "classes/dbh.classes.php";
include "classes/gameList.classes.php";

$game = new Games();
$game->gameCheck();