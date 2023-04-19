<?php

class Users extends Dbh{

    public function userCheck() {
        $dbh = $this->connect();
        $stmt = $dbh->prepare("SELECT * FROM users ORDER BY usersId DESC");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if (count($result)) {
            $i = 0;
            echo '<table class="table table-striped">';
            echo '<thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>';
            echo '<tbody>';
            foreach ($result as $row) {
                $i++;
                echo '<tr>';
                echo '<th scope="row">' . $i . '</th>';
                echo '<td>' . $row['usersName'] . '</td>';
                echo '<td>' . $row['usersEmail'] . '</td>';
                echo '<td>
                        <a href="update.php?id=' . $row['usersId'] . '" class="btn btn-success">Update</a>
                        <a href="php/delete.php?id=' . $row['usersId'] . '" class="btn btn-danger">Delete</a>
                    </td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }

        echo '<div class="link-right">';
        echo '<a href="index.php" class="link-primary">Create</a>';
        echo '</div>';
    }
}