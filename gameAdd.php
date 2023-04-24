    <link rel="stylesheet" href="css/gameAdd.css">
<?php
include_once 'header.php';
    if(isset($_SESSION["adminid"])){
?>
<form action="includes/gameAdd.inc.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" maxlength="255" required><br>

  <label for="description">Description:</label>
  <textarea id="description" name="description"></textarea><br>

  <label for="price">Price:</label>
  <input type="number" id="price" name="price" placeholder="Price" max="99999" required><br>

  <label for="file">File:</label>
  <input type="file" id="file" name="file" accept="image/*"><br>

  <input type="submit" value="submit" name="submit">
  <a href="gameList.php" class="back-link">Back to game list</a>
</form>

<?php 
    }else{
        header("Location: index.php");
    }
?>