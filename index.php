<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Treasure Web - Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/index.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <!-- Start of Nav Bar -->
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
                        <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <!-- <a href="event.php" class="nav-link">Events</a> -->
                        <?php 
                            if(!empty($_SESSION) && $_SESSION['usertype']=="Organizer"){
                                echo '<a href="eventOrganizer.php" class="nav-link">Events</a>';
                            } else {
                                echo '<a href="event.php" class="nav-link">Events</a>';
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
    <!-- End of Nav Bar -->

    <!-- <div class="container"> -->
    <div id="carouselExampleIndicators2" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active ">
                <img class="d-block w-100 " src="img/carousel1.png " alt="First slide ">
                <div class="carousel-caption ">
                    <h3>Fun For All</h3>
                    <p>Each treasure hunt game is unique and sure to bring you the fun you deserved.</p>
                </div>
            </div>
            <div class="carousel-item ">
                <img class="d-block w-100 " src="img/carousel2.png " alt="Second slide ">
                <div class="carousel-caption">
                    <h3>Challenge Your Brain</h3>
                    <p>Push your brain to its limit by solving riddles and puzzles.</p>
                </div>
            </div>
            <div class="carousel-item ">
                <img class="d-block w-100 " src="img/carousel3.png " alt="Third slide ">
                <div class="carousel-caption ">
                    <h3>Teamwork Makes The Dream Work</h3>
                    <p>Pair up with friends to search for the greatest treasure out there.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="container-fluid bg-light mb-0 pb-1 ">
        <div class="container ">
            <h1 class="display-4 text-center py-3 ">Welcome to Treasure Web</h1>
            <h3 class="dropdown-divider aw-hr-long "></h3>
            <p class="lead text-center ">Where all your treasure hunting fun begins</p>
        </div>
    </div>

    <!-- </div> -->



    <!-- Start of Footer -->
    <!-- <div class="dropdown-divider "></div> -->
    <footer class="bg-light p-3 pt-2 mt-0 ">
        <ul class="list-inline text-uppercase text-center ">
            <li class="list-inline-item mx-3 ">
                <a href="events.html " class="text-danger ">Events</a>
            </li>
        </ul>

    </footer>
    <!-- End of Footer -->

    <!-- JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js "
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous ">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js "
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49 " crossorigin="anonymous ">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js "
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy " crossorigin="anonymous ">
    </script>
</body>

</html>