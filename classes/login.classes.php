<?php

class Login extends Dbh {

    protected function getUser($uid, $pwd) {
        $stmt = $this->connect()->prepare('SELECT usersPwd FROM users WHERE usersUid = ? OR usersEmail = ?;');

        if(!$stmt->execute(array($uid, $pwd))) {
            $stmt = null;
            header("location: ../login.php?error=stmtfailed");
            exit();
        }
        
        $loginData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($loginData) == 0) {
            $stmt = null;
            header("location: ../login.php?error=usernotfound");
            exit();
        }
        
        $checkPwd = password_verify($pwd, $loginData[0]["usersPwd"]);

        if($checkPwd == false) {
            $stmt = null;
            header("location: ../login.php?error=wrongpassword");
            exit();
        }elseif($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE usersUid = ? OR usersEmail = ? AND usersPwd = ?;');

            if(!$stmt->execute(array($uid, $uid, $pwd))) {
                $stmt = null;
                header("location: ../login.php?error=stmtfailed");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            
            if($user[0]['user_type'] == 'admin'){
                session_start();
                $_SESSION["adminid"] = $user[0]["usersId"];
                $_SESSION["adminuid"] = $user[0]["usersUid"];
            }else{
                session_start();
                $_SESSION["userid"] = $user[0]["usersId"];
                $_SESSION["useruid"] = $user[0]["usersUid"];
            }
            
            

            $stmt = null;
        }

        
    }


}