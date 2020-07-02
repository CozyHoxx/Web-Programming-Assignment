<?php
include("config.php");
	if (isset($_GET['id'])){
		$id=$_GET['id'];
		$deletequery="DELETE from event where event_id='$id'";
		$rundelete=$db->query($deletequery);
		if ($rundelete){
			echo "alert('The event has been deleted!')";
			header("location:eventOrganizer.php");
		}
	}
	
?>