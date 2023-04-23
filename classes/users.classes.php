<?php

class Users extends Dbh{
    public function userCheck() {
        $dbh = $this->connect();
        $stmt = $dbh->prepare("SELECT * FROM users WHERE user_type = 'user' ORDER BY usersId ASC ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        


        if (count($result)) {
            echo '<table class="table table-striped">';
            echo '<thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>';
            echo '<tbody>';
            foreach ($result as $row) {
                echo '<tr>';
                echo '<th scope="row">' . $row['usersId'] . '</th>';
                echo '<td>' . $row['usersName'] . '</td>';
                echo '<td>' . $row['usersEmail'] . '</td>';
                echo '<td>' . $row['usersUid'] . '</td>';
                echo '<td>
                        <a href="update.php?usersId=' . $row['usersId'] . '" class="btn btn-success">Update</a>
                        <a href="includes/delete.inc.php?usersId=' . $row['usersId'] . '" class="btn btn-danger">Delete</a>
                    </td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }
    }
}