<?php
include_once 'header.php';
if(isset($_SESSION["adminid"])){
?>
<link rel="stylesheet" href="css/style.css">

<div class='container'>
	<div class='box'>
		<h4 class='display-4 text-center'>Users</h4><br>
            <?php if (isset($_GET['error'])) { ?>
		        <div class="alert alert-danger" role="alert">
			<?php echo $_GET['error']; ?>
                </div>
			<?php } ?>
			
			<?php if (isset($_GET['success'])) { ?>
		        <div class="alert alert-success" role="alert">
			<?php echo $_GET['success']; ?>
		        </div>
		    <?php } ?>

<?php
require_once 'includes/users.inc.php'; 

}else{
    header("Location: index.php");
}
?>