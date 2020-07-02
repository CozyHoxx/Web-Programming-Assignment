<?php
    include ('config.php');

    if(isset($_POST['signuporganizer'])){
        if($_POST['password'] === $_POST['rptpassword']){
            $organizer_name = $_POST['organizername'];
            $organizer_email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM organizer where organizer_email='$organizer_email'";
            $result = mysqli_query($db, $sql);
            $count = mysqli_num_rows($result);
            //看有没有且只有一个用户有没有重复了
            if ($count == 0) {
                $organizer_name = mysqli_real_escape_string($db, $organizer_name);
                $organizer_email = mysqli_real_escape_string($db, $organizer_email);
                $password = mysqli_real_escape_string($db, $password);
                $signup_organizer_sql = "INSERT INTO organizer(organizer_name, organizer_email, password) VALUES('$organizer_name', '$organizer_email', '$password') ";
                $db->query($signup_organizer_sql);
                header('location: login.php');
            } else {
                echo "This email has been registered";
            }
        }else{
            echo('The two passwords are different !');
        }
    }

//    include ('config.php');
//
//    if(isset($_POST['signupporganizer'])){
//        if($_POST['password'] === $_POST['rptpassword']){
//            $organizer_name = $_POST['organizername'];
//            $email = $_POST['email'];
//            $psword = $_POST['password'];
//
//            $organizer_name = mysqli_real_escape_string($connection, $organizer_name);
//            $email = mysqli_real_escape_string($connection, $email);
//            $psword = mysqli_real_escape_string($connection, $psword);
//            $signup_organizer_sql = "INSERT INTO organizer(organizer_name, organizer_email, password) VALUES('$organizer_name', '$email', '$psword') ";
//            $connection->query($signup_organizer_sql);
//            header('location: login.php');
//        } else {
//            echo('The two passwords are different !');
//        }
//    }
?>
