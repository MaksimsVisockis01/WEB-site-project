<?php

class Games extends Dbh{
    public function gameCheck() {
        $dbh = $this->connect();
        $stmt = $dbh->prepare("SELECT * FROM game ORDER BY GameId ASC ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if (count($result)) {
            echo '<table class="table table-striped">';
            echo '<thead>
                    <tr>
                        <th scope="col">GameId</th>
                        <th scope="col">Name</th>
                        <th scope="col">Discription</th>
                        <th scope="col">Price</th>
                        <th scope="col">FileName</th>
                    </tr>
                </thead>';
            echo '<tbody>';
            foreach ($result as $row) {
                echo '<tr>';
                echo '<th scope="row">' . $row['GameId'] . '</th>';
                echo '<td>' . $row['Name'] . '</td>';
                echo '<td>' . $row['Discription'] . '</td>';
                echo '<td>$' . $row['Price'] . '</td>';
                echo '<td><img src="GamePhotos/' . $row['FileName'] . '" alt="' . $row['FileName'] . '" width="200" height="200" onclick="showImage(\'' . $row['FileName'] . '\')"></td>';
                echo '
                    <div id="modal">
                        <img src="GamePhotos/' . $row['FileName'] . '" alt="' . $row['FileName'] . '">
                    </div>
                ';
                echo '<td>
                        <a href=".php?GameId=' . $row['GameId'] . '" class="btn btn-success">Update</a>
                        <a href="includes/.inc.php?GameId=' . $row['GameId'] . '" class="btn btn-danger">Delete</a>
                    </td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }
    }
}