<?php

class Game extends Dbh{

    protected function addGame($name, $description, $price, $file) {
        $dbh = $this->connect();
        $sql = "INSERT INTO game (Name, Discription, Price, FileName) VALUES (?, ?, ?, ?);";
        $stmt = $dbh->prepare($sql);
        if(!$stmt->execute(array($name, $description, $price, $file))) {
            $stmt = null;
            header("location: ../gameAdd.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    protected function Gamecheck($name) {
        $dbh = $this->connect();
        $sql = "SELECT * FROM game WHERE Name = ?";
        $stmt = $dbh->prepare($sql);
        

        if(!$stmt->execute([$name])) {
            $stmt = null;
            header("location: ../gameAdd.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount() == 0) {
            $resultCheck = true;
        }else{
            $resultCheck = false;
        }
        return $resultCheck;
    }
}