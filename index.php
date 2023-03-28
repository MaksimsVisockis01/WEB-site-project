<?php
include_once 'header.php';
?>

<?php
if(isset($_SESSION["userid"])){
    echo"login";
}else{
    echo"no login";
}
?>
<?php
include_once 'footer.php';
?>