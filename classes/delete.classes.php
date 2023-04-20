<?php

class Delete extends Dbh{
    protected function deleteUser($id){
    $dbh = $this->connect();
    $sql = "DELETE FROM users WHERE usersId=$id";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
   if ($stmt) {
   	  header("Location: ../update.php?success=successfully deleted");
   }else {
      header("Location: ../update.php?error=unknown error occurred");
   }
    }
}

?>