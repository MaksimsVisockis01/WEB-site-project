<?php 

class UpdateList extends Dbh{


    protected function getOpt($id){
        $dbh = $this->connect();
        $sql = "SELECT * FROM game WHERE GameId=$id";
        $stmt = $dbh->prepare($sql);
        if(!$stmt->execute()) {
            $stmt = null;
            header("location: ../updateList.php?error=stmtfailed");
            exit();
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            header("Location: gameList.php");
            exit();
        }
        echo '<div class="form-group">';
        echo '    <label for="name">Name</label>';
        echo '    <input type="name" class="form-control" id="name" name="name" value="' . $row['Name'] . '">';
        echo '</div>';

        echo '<div class="form-group">';
        echo '    <label for="discription">Description:</label>';
        echo '   <textarea class="form-control" id="discription" name="discription">' . $row['Discription'] . '</textarea>';
        echo '</div>';

        echo '<div class="form-group">';
        echo '    <label for="price">Price:</label>';
        echo '    <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="' . $row['Price'] . '">';
        echo '</div>';

        echo '<div class="form-group">';
        echo '    <label for="file">Current file: ' . $row['FileName'] . '</label><br>';
        echo '    <input type="file" id="file" name="file" accept="image/*">';
        echo '</div>';

        echo '<input type="text" name="oldfilename" value="' . $row['FileName'] . '" hidden>';
        echo '<input type="text" name="GameId" value="' . $row['GameId'] . '" hidden>';
    }
    protected function Update($name,$discription,$price,$newfile,$id) {
        $dbh = $this->connect();
        $sql = "UPDATE game 
                SET Name='$name',Discription='$discription',Price='$price',FileName='$newfile' 
                WHERE GameId='$id'
                ";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
           if ($stmt) {
                 header("Location: ../gameList.php?success=successfully updated");
           }else {
              header("Location: ../gameList.php?id=$id&error=unknown error occurred");
           }
    }
}



