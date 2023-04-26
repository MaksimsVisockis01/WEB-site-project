<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Databes Website</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<form action="includes/updateList.inc.php" 
		      method="POST" enctype="multipart/form-data">
            
		   <h4 class="display-4 text-center">Update</h4><hr><br>

		   	
		   <?php
            require_once 'includes/updateList.inc.php'; 
            ?>

		   <button type="submit" 
		           class="btn btn-primary"
		           name="update">Update</button>
		    <a href="gameList.php" class="link-primary">Back to games list</a>
	    </form>
	</div>
</body>
</html>