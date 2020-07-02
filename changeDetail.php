<?php
	include("config.php");

	if (isset($_POST['modify'])){
		echo $_POST['gameName']." ". $_POST['gameDate']." ".$_POST['gameTime'] ;
		$name=$_POST['gameName'];
		$date=$_POST['gameDate'];
		$time=$_POST['gameTime'];
		$id=$_POST['eventid'];

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
			$modifyrun="UPDATE event SET event_name='$name', event_date='$date',event_time='$time' WHERE event_id='$id'";
			$result=$db->query($modifyrun);
			header("Location:eventOrganizer.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Modify your events</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
	<div class="container">
		<div class="mt-4 mb-3">
        <h2 style="font-size: 2.5rem;" class="text-center">
            Modifying Your Events
        </h2>
    </div>

        <?php
        include("config.php");
			if (isset($_GET['id'])){
				$id=$_GET['id'];
				$que="SELECT * FROM event WHERE event_id='$id'";
				$run=$db->query($que);
				while($res=$run->fetch_assoc()){
					$name=$res['event_name'];
					$date=$res['event_date'];
					$time=$res['event_time'];
				}
			}
		?>

		<form name="editForm" action="changeDetail.php" method="post">
			<div class="form-group mb-2"><label for="gameName" style="width:30%">Name</label><input type="text" name="gameName" value="<?php echo $name?>"></div>
            <div class="form-group mb-2"><label for="gameDate" style="width:30%">Date</label><input type="date" name="gameDate" value="<?php echo $date?>"></div>
            <div class="form-group mb-2"><label for="gameTime" style="width:30%">Time</label><input type="time" name="gameTime" value="<?php echo $time?>"></div>
            <div><input type="hidden" name="eventid" value="<?php echo $_GET['id'];?>"></div>
            <div><input type="submit" name="modify" value="Change the detail"></div>
        </form>
    <div class="mt-4 row justify-content-center">
		<a href="eventOrganizer.php">Back</a>
	</div>
</div>
</body>

</html>
<?php mysqli_close($db)?>
