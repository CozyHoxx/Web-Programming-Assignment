<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php 
include_once("config.php");


if(isset($_POST['Submit'])) {	
	//The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
	$team_name = mysqli_real_escape_string($db, $_POST['team_name']);
	for($i = 1; $i <= 3; $i++){
		
		$name = mysqli_real_escape_string($db, $_POST['full_name'.$i]);
		$ic = mysqli_real_escape_string($db, $_POST['ic_number'.$i]);
		$gender = mysqli_real_escape_string($db, $_POST['gender'.$i]);
		$email = mysqli_real_escape_string($db, $_POST['email'.$i]);
		$phone = mysqli_real_escape_string($db, $_POST['phone_number'.$i]);	
		
		// checking empty fields
		if(empty($team_name) || empty($name) || empty($ic) || empty($gender) || empty($email)|| empty($phone)) {
					
			if(empty($team_name)) {
				echo "<font color='red'>Team Name field is empty.</font><br/>";
			}

			if(empty($name)) {
				echo "<font color='red'>Name field is empty.</font><br/>";
			}
			
			if(empty($ic)) {
				echo "<font color='red'>I/C field is empty.</font><br/>";
			}
			
			if(empty($gender)) {
				echo "<font color='red'>Gender field is empty.</font><br/>";
			}

			if(empty($phone)) {
				echo "<font color='red'>Phone Number field is empty.</font><br/>";
			}
			
			if(empty($email)) {
				echo "<font color='red'>Email field is empty.</font><br/>";
			}
			
			//link to the previous page
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
			
		} else { 
			// if all the fields are filled (not empty) 
			
			//Step 3. Execute the SQL query.	
			//insert data to database	
			//Prepared Statement: Prepare, bind, execute
			$stmt = $db->prepare("INSERT INTO participant(team_name,full_name,ic_number,gender,email,phone_number) VALUES (?, ?, ?, ?,?,?)");
			$stmt->bind_param("ssssss", $team_name, $name, $ic, $gender, $email, $phone);
			$stmt->execute();
			$stmt->close();
			
			//Step 4. Process the results.
			//display success message & the new data can be viewed on index.php
		
			//Step 5: Freeing Resources and Closing Connection using mysqli	

			}
			
	}
		sleep(3);
		echo "<font color='green'>Sucessfully Registered!. <br>";
		echo "You will be redirected to homepage in a moment.<br>";
		echo "If you are not redirected automatically, <a href=\"index.html\">Click Here</a> <br>";
		header("Refresh:5; url=index.html");
		$db->close();
		
}


?>
</body>
</html>