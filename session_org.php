<?php
    include('config.php');
    //Start session
    session_start();
    //储存session
    $user_check = $_SESSION['login_user'];
    //SQL去fetch user information
    $ses_sql = mysqli_query($db, "SELECT * FROM organizer WHERE organizer_email='$user_check'");
    //如果我显示不了就改这个
    $row = mysqli_fetch_array($ses_sql);
    $_SESSION['userid']=$row['organizer_id'];
    $_SESSION['organizer_name'] = $row['organizer_name'];
    $_SESSION['organizer_email'] = $row['organizer_email'];
    $_SESSION['url'] = $row['url'];
    $_SESSION['description'] = $row['description'];

?>