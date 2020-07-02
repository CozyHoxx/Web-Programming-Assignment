<html>
<head>
	<title>Add Data</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
<?php

	include_once("config.php");	
	if (isset($_POST['addGame'])){
		$name=$_POST['gameName'];
		$date=$_POST['gameDate'];
		$time=$_POST['gameTime'];
		$id=$_GET['id'];
		if (empty($name)||empty($date)||empty($time)){
			if(empty($name)) {
				echo '<p style="color:red;">Name field is empty.</p><br>';
			}		
			if(empty($date)) {
				echo '<p style="color:red;">Date field is empty.</p><br>';
			}
			if(empty($time)) {
				echo '<p style="color:red;">Time field is empty.</p><br>';
			}
			echo "<br><a href='javascript:self.history.back();'>Go Back</a>";
		} else { 
			$add = mysqli_query($db, "INSERT into event(event_name,event_date,event_time,organizer_id) values ('$name','$date','$time','$id')");
			echo "<p style='color:green;'>Data added successfully.</p>";
			echo "<br/><a href='eventOrganizer.php'>Go back</a>";
			mysqli_close($db);
		}
	}
?>
</body>
</html>