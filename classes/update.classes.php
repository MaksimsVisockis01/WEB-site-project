<?php 

class Update extends Dbh{


    protected function getOpt($id){
        $dbh = $this->connect();
        $sql = "SELECT * FROM users WHERE usersId=$id";
        $stmt = $dbh->prepare($sql);
        if(!$stmt->execute()) {
            $stmt = null;
            header("location: ../update.php?error=stmtfailed");
            exit();
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            header("Location: users.php");
            exit();
        }
        echo '<div class="form-group">';
        echo '    <label for="name">Name</label>';
        echo '    <input type="name" class="form-control" id="name" name="name" value="' . $row['usersName'] . '">';
        echo '</div>';

        echo '<div class="form-group">';
        echo '    <label for="email">Email</label>';
        echo '    <input type="email" class="form-control" id="email" name="email" value="' . $row['usersEmail'] . '">';
        echo '</div>';

        echo '<div class="form-group">';
        echo '    <label for="username">Username</label>';
        echo '    <input type="username" class="form-control" id="username" name="username" value="' . $row['usersUid'] . '">';
        echo '</div>';

        echo '<input type="text" name="usersId" value="' . $row['usersId'] . '" hidden>';
    }
    protected function Update($name,$email,$username,$id) {
        $dbh = $this->connect();
        $sql = "UPDATE users
                SET usersName='$name', usersEmail='$email', usersUid='$username'
                WHERE usersId=$id ";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
           if ($stmt) {
                 header("Location: ../users.php?success=successfully updated");
           }else {
              header("Location: ../update.php?id=$id&error=unknown error occurred");
           }
    }
}



