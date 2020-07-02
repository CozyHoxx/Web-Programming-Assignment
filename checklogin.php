<?php
include_once("config.php");
session_start();

if (isset($_POST['loginSubmit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "cannot login without password and email!";
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // protect MySQL injection
        $email = stripslashes($email);
        $password = stripslashes($password);
        $email = mysqli_real_escape_string($db, $email);
        $password = mysqli_real_escape_string($db, $password);
        $sql = "SELECT * FROM participant where email='$email' and password='$password'";
        $result = mysqli_query($db, $sql);
        $count = mysqli_num_rows($result);

        //看有没有且只有一个用户匹配上了
        // if count = 0, user data is not in database
        if ($count == 1) {
            $_SESSION['login_user'] = $email;
            header("location: event.php");
        } else {
            echo "Username or Password is invalid";
            header("location: login.php");

        }
        mysqli_close();
    }
} else if (isset($_POST['loginSubmit_org'])) {
    if (empty($_POST['organiser_email']) || empty($_POST['organiser_password'])) {
        echo "without password and email you cannot login";
    } else {
        $email = $_POST['organiser_email'];
        $password = $_POST['organiser_password'];

        // protect MySQL injection
        $email = stripslashes($email);
        $password = stripslashes($password);
        $email = mysqli_real_escape_string($db, $email);
        $password = mysqli_real_escape_string($db, $password);
        $sql = "SELECT * FROM organizer where organizer_email='$email' and password='$password'";
        $result = mysqli_query($db, $sql);
        $count = mysqli_num_rows($result);

        //看有没有且只有一个用户匹配上了
        if ($count == 1) {
            $_SESSION['login_user'] = $email;
            header("location: profile_org.php");
        } else {
            echo "Username or Password is invalid";
            header("location: login.php");
        }
        mysqli_close();
    }
}

?>
