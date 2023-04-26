<?php

class DeleteList extends Dbh{
    protected function deleteListId($id){
        $dbh = $this->connect();
        $sql = "DELETE FROM game WHERE GameId=$id";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        if ($stmt) {
        	  header("Location: ../gameList.php?success=successfully deleted");
        }else {
           header("Location: ../gameList.php?error=unknown error occurred");
        }
    }

    protected function deletePhotoId($id){
        $dbh = $this->connect();
        $sql = "SELECT FileName FROM game WHERE GameId=$id";
        $stmt = $dbh->prepare($sql);
        if(!$stmt->execute()) {
            $stmt = null;
            header("location: ../gameList.php?error=stmtfailed");
            exit();
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            header("Location: gameList.php?error=FA error");
            exit();
        }

        $foto = $row['FileName'];
        $fotoPath = '../GamePhotos/' . $foto;
        
        if (file_exists($fotoPath)) {
            unlink($fotoPath);
        }

    }
}

?>