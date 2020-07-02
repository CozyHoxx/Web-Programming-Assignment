<?php 
include('config.php');
include('session.php');
session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/eventRegister1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2f1615a533.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
</head>

<body>
<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <div style=" width: 55px; height: 50px;  overflow: hidden;  ">
                <img src="img/SVG/Artboard 1.svg" alt="" style=" object-fit:fill; width: 60px;">
            </div>
            <a href="index.php" class="navbar-brand text-uppercase">Treasure Web</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="index.php">Home </a>
                    </li>
                    <li class="nav-item">
                        <!-- <a href="event.php" class="nav-link">Events</a> -->
                        <?php 
                            if(!empty($_SESSION) && $_SESSION['usertype']=="Organizer"){
                                echo '<a href="eventOrganizer.php" class=" active nav-link">Events<span class="sr-only">(current)</span></a>';
                            } else {
                                echo '<a href="event.php" class=" active nav-link">Events<span class="sr-only">(current)</span></a>';
                            }
                        ?>
                    </li>
                    <li class="nav-item">
                        <!-- <a href="profile.html" class="nav-link">Profile</a> -->
                        <?php 
                            if(!empty($_SESSION) && $_SESSION['usertype']=="Organizer"){
                                echo '<a href="profile_org.php" class="nav-link">Profile</a>';
                            } else if (!empty($_SESSION) && $_SESSION['usertype']=="User"){
                                echo '<a href="profile.php" class="nav-link">Profile</a>';
                            }
                        ?>
                    </li>
                    <!-- This part is for small screen -->
                    <?php
                    if(!empty($_SESSION)){
                        include("config.php");
                    $id=$_SESSION['userid'];
                    if ($_SESSION['usertype']=='User'){
                        $findname="SELECT first_name as name from participant WHERE participant_id='$id'";
                    } else {
                        $findname="SELECT organizer_name as name from organizer WHERE organizer_id='$id'";
                    }
                    $run=$db->query($findname);
                    $Loginname=$run->fetch_assoc();
                    $name = $Loginname['name'];
                    $greetings = "Hello " . $Loginname['name']."!";
                    echo '<div class="mr-auto  align-items-center text-light d-flex d-md-none">';
                       echo $greetings.
                    '<button class = "btn btn-outline-light btn-sm ml-2">Log Out</button>';
                    }else{?>

                    <li class="specialDropdown nav-item dropdown d-md-none">
                        <a class="nav-link dropdown-toggle active" href="#" id="utilitiesDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login/Signup
                        </a>
                        <div class="dropdown-menu mb-2 " aria-labelledby="utilitiesDropdown">
                            <a class="dropdown-item" href="login.php">Login</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="signup.php">New around here? Sign up</a>
                        </div>
                    </li>


                    <?php
                    }                                        
                    ?>

                </ul>
            </div>
            <!-- This part is for large screen -->
            <?php
                if(!empty($_SESSION)){
                    include("config.php");
                    $id=$_SESSION['userid'];
                    if ($_SESSION['usertype']=='User'){
                        $findname="SELECT first_name as name from participant WHERE participant_id='$id'";
                    } else {
                        $findname="SELECT organizer_name as name from organizer WHERE organizer_id='$id'";
                    }
                    $run=$db->query($findname);
                    $Loginname=$run->fetch_assoc();
                    $name = $Loginname['name'];
                    $greetings = "Hello " . $Loginname['name']."!";
                    ?>
            <div class="mr-auto d-none d-md-inline align-items-center text-light">
                <?php echo $greetings?>
                <button class="btn btn-outline-light btn-sm ml-2" onclick="window.location.href='logout.php'">Log
                    Out</button>
            </div>
            <?php
                }    
                 else {
                    echo '<div class="dropdown mb-2 d-none d-md-inline pt-2">
                            <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Login/Signup
                            </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="login.php">Login</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="signup.php">New around here? Sign up</a>                    
                        </div>';
                }
            ?>
        </div>
        </div>
    </nav>

    <!-- Registration form start -->
    <main>
        <div class = "wrapper">
                <div class = "title">
                    Event Registration<br>
                    <?php echo $_GET['id']?>
                </div>
                
                <div>
                    <h2>Team Information</h2>
                </div>

                <!-- FORM1 -->
            <form action="eventRegister1.php" method="post" name="form1">
                <div class="form">
                        <div class="input_field">
                            <label>Team Name</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fas fa-users"></i> </span>
                            </div>
                            <input type="text" class="input" name="team_name" required>
                        </div>
                </div>
                
                <div class="form">
                    <?php 
                        for($i = 1; $i <= 3;$i++){
                    ?> 
                    <div class = "leader">
                    <p><strong>Team Member <?php echo $i;?> :</strong></p>
                    </div>
                    <div class="input_field">
                        <label>Full Name</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input type="text" class="input" name="full_name<?php echo $i;?>" required>
                    </div>
                    <div class="input_field">
                        <label>I/C Number</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="far fa-id-card"></i> </span>
                        </div>
                        <input type="text" class="input" name="ic_number<?php echo $i;?>" required>
                    </div>
                    <div class="input_field">
                        <label>Gender</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-venus-mars"></i> </span>
                        </div>
                        <div class="custom_select">
                            <select name="gender<?php echo $i;?>">
                                <option >Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="input_field">
                        <label>Email</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input type="text" class="input" name="email<?php echo $i;?>" required>
                    </div>
                    <div class="input_field">
                        <label>Phone Number</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <input type="text" class="input" name="phone_number<?php echo $i;?>" required>
                    </div>
                    <?php       
                        }                    
                    ?>

                        
                    
                    <!-- ----------------FINAL FORM-------------- -->
                    <div class="input_field2">
                        <label class="check">
                            <input type="checkbox" required>
                            <span class="checkmark"></span>
                        </label>
                        <p>Agreed to <a href="TREASURE WEB T&C.pdf">Terms and Conditions</a></p>
                    </div>
                    <div class="input_field">
                        <input type="submit" name="Submit" value ="Register" class="btn">
                    </div>
                </div>
            </form>
     </div>
            


    </main>
    <footer class="bg-light p-3 pt-2 mt-0 ">
        <ul class="list-inline text-uppercase text-center ">
            <li class="list-inline-item mx-3 ">
                <a href="events.html " class="text-danger ">Events</a>
            </li>
        </ul>

    </footer>
</body>
</html>