<?php
    include ('config.php');
    session_start();
    

    /*$connection->query("DELETE FROM participant WHERE email='$user_check'");
    header('location: index.html');*/

    if(isset($_POST['delete'])){
        $user_check = $_SESSION['email'];
        $db->query("DELETE FROM participant WHERE email='$user_check'");
        include "logout.php";
        header('location: index.php');
    }
    elseif(isset($_POST['delete_org'])){
        $user_check = $_SESSION['organizer_email'];
        $db->query("DELETE FROM organizer WHERE organizer_email='$user_check'");
        include "logout.php";
        header('location: index.php');
    }
?>
