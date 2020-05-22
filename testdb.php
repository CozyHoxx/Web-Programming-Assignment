<!-- THIS FILE IS TO TEST THE QUERY OUTPUT OF THE DATABASE -->

<?php 
include_once("config.php");
$event = mysqli_query($db,"SELECT * FROM event");
$organizer = mysqli_query($db, "SELECT * FROM organizer");

?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
    <table class="table">

	<tr bgcolor='#CCCCCC'>
		<td>organizer id</td>
		<td>organizer name </td>
    </tr>
    <?php 
		
		
		while($res = mysqli_fetch_array($organizer)) { 
            // print_r($res);
			echo "<tr>";
			echo "<td>".$res['organizer_id']."</td>";
            echo "<td>".$res['organizer_name']."</td>";

		}
		
		
	?>
	</table>

	<table class="table">
	<tr bgcolor='#CCCCCC'>
		<td>Event id</td>
		<td>Event Name</td>
		
	</tr>
	<?php 
		while($res = mysqli_fetch_array($event)) { 
            
			echo "<tr>";
			
            echo "<td>".$res['event_id']."</td>";
            echo "<td>".$res['event_name']."</td>";
            
		
		}
		
	?>
    </table>
    </table>

<table class="table">
<tr bgcolor='#CCCCCC'>
    <td>Event id</td>
    <td>Event Name</td>
    <td>organizer Name</td>

    
</tr>
<?php 
    
    while($res = mysqli_fetch_array($event)) { 
        echo "<tr>";
        echo "<td>".$res['event_id']."</td>";
        echo "<td>".$res['event_name']."</td>";
        
    
    }
    
    
    mysqli_close($db);
?>
</table>
</body>
</html>