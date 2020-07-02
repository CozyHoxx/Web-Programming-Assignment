<?php
    include ('config.php');

    if(isset($_POST['signupparticipant'])){
        if($_POST['password'] === $_POST['rptpassword']){
            $first_name = $_POST['firstname'];
            $last_name = $_POST['lastname'];
            $email = $_POST['email'];
            $psword = $_POST['password'];

            $sql = "SELECT * FROM participant where email='$email'";
            $result = mysqli_query($db, $sql);
            $count = mysqli_num_rows($result);
            //看有没有且只有一个用户有没有重复了
            if ($count == 0) {
                $first_name = mysqli_real_escape_string($db, stripslashes($first_name));
                $last_name = mysqli_real_escape_string($db, stripslashes($last_name));
                $email = mysqli_real_escape_string($db, stripslashes($email));
                $psword = mysqli_real_escape_string($db, stripslashes($psword));
                $signup_participant_sql="INSERT INTO participant(first_name, last_name, email, password) VALUES('$first_name', '$last_name', '$email', '$psword') ";
                $db->query($signup_participant_sql);
                header('location: login.php');
            } else {
                echo "This email has been registered";
            }
        }else{
            echo('The two passwords are different !');
        }
    }
?>
<?php

?>