<?php  

if(isset($_GET['usersId'])){
   
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['usersId']);

    include "../classes/dbh.classes.php";
    include "../classes/delete.classes.php";
    include "../classes/delete-contr.classes.php";
    
    $delete = new DeleteContr($id);
    $delete->deleteId();



}else {
	header("Location: ../update.php");
}