<?php

//Start session
session_start();

//If user in already logged in then redirect to home page
if(isset($_SESSION["userid"]) && $_SESSION["userid"]===true){
    header("location:index.html");
    exit;
}


?>