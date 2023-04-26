<?php  

if(isset($_GET['GameId'])){
   
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['GameId']);

    include "../classes/dbh.classes.php";
    include "../classes/deleteList.classes.php";
    include "../classes/deleteList-contr.classes.php";
    
    $delete = new DeleteContrList($id);
    $delete->deletePhotoById();
    $delete->deleteListById();



}else {
	header("Location: ../update.php");
}