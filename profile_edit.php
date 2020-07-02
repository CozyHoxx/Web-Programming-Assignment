<?php
    include ('config.php');
    if(isset($_POST['submit'])){
        session_start();
        $user_check = $_SESSION['email'];
        $editedfirstname = $_POST['firstname'];
        $editedlastname = $_POST['lastname'];
        $editedbirthday = $_POST['birthday'];
        $editedpassword = $_POST['password'];
        $editedrptpassword = $_POST['rptpassword'];
        if($editedpassword === $editedrptpassword){
            $editedfirstname = mysqli_real_escape_string($db, $editedfirstname);
            $editedlastname = mysqli_real_escape_string($db, $editedlastname);
            $editedbirthday = mysqli_real_escape_string($db, $editedbirthday);
            $editedpassword = mysqli_real_escape_string($db, $editedpassword);

            $db->query("UPDATE participant SET first_name='$editedfirstname', last_name='$editedlastname', birthday='$editedbirthday', password='$editedpassword'  WHERE email = '$user_check'");
            $_SESSION['birthday'] = $editedbirthday;
            $_SESSION['email'] = $user_check;
            $_SESSION['firstname'] = $editedfirstname;
            $_SESSION['lastname'] = $editedlastname;
            header("location: profile.php");
        }else{
            echo "<p>Wrong repeat passwrod!</p>";
            echo "<a href='profile.php'>go back</a>";
        }
    }elseif (isset($_POST['submit_org'])){
        session_start();
        $user_check = $_SESSION['organizer_email'];

        $editedorg_name = $_POST['organizer_name'];
        $editedurl = $_POST['url'];
        $editeddesc = $_POST['description'];
        $editedpassword = $_POST['password'];
        $editedrptpassword = $_POST['rptpassword'];
        if($editedpassword === $editedrptpassword){
            $editedorg_name = mysqli_real_escape_string($db, $editedorg_name);
            $editedurl = mysqli_real_escape_string($db, $editedurl);
            $editeddesc = mysqli_real_escape_string($db, $editeddesc);
            $editedpassword = mysqli_real_escape_string($db, $editedpassword);

            $db->query("UPDATE organizer SET organizer_name='$editedorg_name', url='$editedurl', description='$editeddesc', password='$editedpassword' WHERE organizer_email = '$user_check'");            
            $_SESSION['organizer_name'] = $editedorg_name;
            $_SESSION['url']= $editedurl;
            $_SESSION['description'] = $editeddesc;
            header("location: profile_org.php");
        }else{
            echo "<p>Wrong repeat passwrod!</p>";
            echo "<a href='profile_org.php'>go back</a>";
        }
    }



?>
