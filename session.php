<?php
if (isset($_POST['submit'])){
	$email=$_POST['email'];
	$password=$_POST['password'];

	$query="SELECT * from participant where email='$email' and password='$password'"; 
	$que="SELECT * from organizer where organizer_email='$email' and password='$password'";
	include_once("config.php");
	$run=$db -> query($query); // participant
	$runorg=$db -> query($que); // organizer

	if (($run -> num_rows != 1 &&  $runorg -> num_rows !=1)){
		echo '<script>alert("Wrong email or password!")</script>';
		header("location:login.php");
	} else {
		session_start();
		// $queryforuser="SELECT * from participant where email='$email' and password='$password'";
		// $run2=$db -> query($queryforuser);
		if (($run -> num_rows) == 1){
			$_SESSION['usertype']="User";
			$row = $run->fetch_assoc();
			$_SESSION['userid']=$row['participant_id'];
			$_SESSION['firstname'] = $row['first_name'];
			$_SESSION['lastname'] = $row['last_name'];
			$_SESSION['birthday'] = $row['birthday'];
			$_SESSION['email'] = $row['email'];
			header("location: event.php");
		} else {
			//$queryfororganizer="SELECT * from organizer where email='$email' and password='$password'";
			//$run = $db -> query($queryfororganizer);
			$_SESSION['usertype']="Organizer";
			$row = $runorg->fetch_assoc();
			$_SESSION['userid']=$row['organizer_id'];
			$_SESSION['organizer_name'] = $row['organizer_name'];
			$_SESSION['organizer_email'] = $row['organizer_email'];
			$_SESSION['url'] = $row['url'];
			$_SESSION['description'] = $row['description'];
			header("location: eventOrganizer.php");
		}
	}
}
?>