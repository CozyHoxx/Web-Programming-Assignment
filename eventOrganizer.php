<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Events</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
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
                        <a class="nav-link " href="index.php">Home </a>
                    </li>
                    <li class="nav-item">
                        <!-- <a href="event.php" class="nav-link">Events</a> -->
                        <?php 
                            if(!empty($_SESSION) && $_SESSION['usertype']=="Organizer"){
                                echo '<a href="eventOrganizer.php" class="nav-link active">Events<span class="sr-only">(current)</span></a>';
                            } else {
                                echo '<a href="event.php" class="nav-link active">Events<span class="sr-only">(current)</span></a>';
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

<section class="mt-5 pt-3 bg-light">
    <div class="container">
        <h1 style="font-size: 3rem;" class="text-center">
            Your Events
        </h1>
        <table class="table mb-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Event Name</th>
                    <th scope="col">Event Date</th>
                    <th scope="col">Event Time</th>
                    <th scope="col">Details</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //The session is for testing purpose
                //$_SESSION['userid']=3;
                include_once("config.php");
                $id=$_SESSION['userid'];
                $queryEvent ="SELECT * FROM event WHERE organizer_id = $id ORDER BY event_date";
                $findevent=$db->query($queryEvent);
                while($rowevent = $findevent->fetch_assoc()){
                    echo '<tr>
                    <td scope="row">'.$rowevent['event_name'].'</td>
                    <td>'.date("jS M Y (l)", strtotime($rowevent['event_date'])).'</td>
                    <td>'.date("H:i a",strtotime($rowevent['event_time'])).'</td>
                    <td><a href="Detail.php?id='.$rowevent['event_id'].'" target="_blank">Click for details</a></td>
                    <td><a href="changeDetail.php?id='.$rowevent['event_id'].'" >Modify</a></td>
                    <td><a onclick="javascript:confirmationDelete($(this));return false; " href="deleteEvent.php?id='.$rowevent['event_id'].'">Delete</a></td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>

        <div>
            <h3>Add a new event</h3>
            <form id="addForm" action="addEvent.php?<?php echo 'id='.$id?>" method="post">
                <div class="form-group mb-2"><label for="gameName" style="width:30%">Name</label><input type="text" name="gameName" required></div>
                <div class="form-group mb-2"><label for="gameDate" style="width:30%">Date</label><input type="date" name="gameDate" required></div>
                <div class="form-group mb-2"><label for="gameTime" style="width:30%">Time</label><input type="time" name="gameTime"  required></div>
                <div><input type="submit" name="addGame" value="Add a new game"></div>
            </form>
        </div>

        <h2 style="font-size: 2.5rem;" class="text-center mt-4">
            All Events
        </h2>
        <div class="aw-hr-long mb-3"></div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Event Name</th>
                    <th scope="col">Event Date</th>
                    <th scope="col">Event Time</th>
                    <th scope="col">Organizer</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $queryAllEvent="SELECT * from event INNER JOIN organizer ON event.organizer_id=organizer.organizer_id ORDER BY event_date";
                $findAllevent=$db->query($queryAllEvent);
                while($rowAllevent = $findAllevent->fetch_assoc()){
                    echo '<tr>
                    <td scope="row">'.$rowAllevent['event_name'].'</td>
                    <td>'.date("jS M Y (l)", strtotime($rowAllevent['event_date'])).'</td>
                    <td>'.date("H:i a",strtotime($rowAllevent['event_time'])).'</td>
                    <td>'.$rowAllevent['organizer_name'].'</td>
                    <td>'.$rowAllevent['organizer_email'].'</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</section>

    <!-- Start of Footer -->
    <footer class="bg-light p-3 pt-5 mt-0 ">
        <ul class="list-inline text-uppercase text-center ">
            <li class="list-inline-item mx-3 ">
                <a href="events.html " class="text-danger ">Events</a>
            </li>
        </ul>

    </footer>
    <!-- End of Footer -->

    <!-- JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        function confirmationDelete(anchor)
        {
            var conf = confirm('Are you sure want to delete this record?');
            if(conf)
                window.location=anchor.attr("href");
        }
    </script>
</body>

</html>