<?php 
include("config.php");
include("session.php");
include("class_lib.php");
session_start();
// $stmt = "SELECT * FROM event INNER JOIN organizer ON event.organizer_id=organizer.organizer_id ORDER BY event_date;"

$stmt = "SELECT p.first_name,p.last_name, e.event_name, t.team_name, o.organizer_name, e.event_date, e.event_time, e.event_id ";
$stmt .= "FROM participant p, participant_team pt, team t, event e, event_team et , organizer o ";
$stmt .= "WHERE p.participant_id = pt.participant_id and pt.team_id = t.team_id and t.team_id = et.team_id and et.event_id = e.event_id and e.organizer_id = o.organizer_id ";
$stmt .= "ORDER BY e.event_date;";
$result = mysqli_query($db, $stmt );


while($res = mysqli_fetch_array($result)){
    $newArray[] = $res;    
}

$currentEvent = "";
$eventArray=[]; //store events

foreach($newArray as $innerArray){
    // Details of participants
    $participantName = $innerArray['first_name'] ." ".$innerArray['last_name'];
    $teamName = $innerArray['team_name'];

    // Details of event
    $eventName = $innerArray['event_name'];
    $organizerName = $innerArray['organizer_name'];
    $eventTime = date("H:i a",strtotime($innerArray['event_time']));
    $eventDate = date("jS M Y (l)",strtotime($innerArray['event_date']));

    // Print details for checking
    // echo $participantName ." joins ".$eventName ." as ".$teamName ." on ".$eventTime ." ".$eventDate ."<br>" ;

    $newEvent = FALSE; //Flag to store new event into eventArray
                    
    if($currentEvent != $eventName){
        $newEvent = TRUE;
    }
    $currentEvent = $eventName;

    if($newEvent){
        $eventArray[] = new Event($eventName,$eventTime,$eventDate,$organizerName);
    }
    
        // Get event index from array
        $keyForTeamArray=0;
        foreach ($eventArray as $key=>$value){ 
            if ($value->getEventName() == $eventName){
                $keyForTeamArray = $key;
            }
        }
        $eventArray[$keyForTeamArray] -> addParticipant($teamName,$participantName);
    
}
// echo '<pre>'; print_r($eventArray); echo '</pre>'; //nicely formatted array
$db->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Treasure Web - Event</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/event.css">
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
    <!-- End of Nav Bar -->

    <!-- Start of Content -->
    <div class="container-fluid p-0">
        <section id="headingCover">
            <div class="d-flex align-items-center justify-content-center text-light aw-vertical-align">
                <h1 class="aw-border text-center " style="font-size:xx-large">Let The Hunt Begin!</h1>
            </div>
        </section>

        <div class="container">
            <h1 style="font-size: 4rem;" class="text-center">
                Events
            </h1>
            <div class="aw-hr-long mb-3"></div> <!-- This is a red line -->

            <!-- For each event in the array, generate a card to display event information -->
            <div class="row">
                <?php
                foreach($eventArray as $event){ 
                // Details of event
                $eventName = $event -> getEventName();
                $eventTime = $event -> getEventTime();
                $eventDate = $event -> getEventDate();
                $organizerName = $event -> getOrganizerName();                
                ?>
                <div class="mb-3 col-md-6 col-lg-4 ">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo $eventName;?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <?php echo $organizerName;?>
                            </h6>
                            <div class="dropdown-divider"></div>
                            <p class="card-text ">
                                <?php                                     
                                    echo $eventTime;
                                    echo "<br>";
                                    echo $eventDate;
                                    ?>
                            </p>
                            <a href="#<?php echo str_replace(" ","_",$eventName); ?>_Details" class="card-link button"
                                data-toggle="modal">Details</a>

                            <?php 
                            if(!empty($_SESSION)){
                                if($_SESSION['usertype']=="User"){
                                    // echo '<a href="eventRegister.php" class="card-link">Join Event</a>';
                                    ?><a class="card-link" href="eventRegister.php?id=<?php echo $eventName?>" target="_blank">Join Event</a><?php
                                }
                            }else{
                                echo '<a href="login.php" class="card-link">Join Event</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php 
                }
                ?>
            </div>
            <!-- End of event card generation -->

            <?php 
                // For each event in array, generate modal to be poped-up when user click details
                foreach($eventArray as $event){ 
                $eventName = $event -> getEventName();
                $eventTime = $event -> getEventTime();
                $eventDate = $event -> getEventDate();
                $organizerName = $event -> getOrganizerName(); 
            ?>
            <div id="<?php echo str_replace(" ","_",$eventName); ?>_Details" class="modal fade" tabindex="-1"
                role="dialog" aria-labelledby="newsletterModal" aria-hidden="true">
                <div class="modal-dialog modal-lg d-flex flex-column justify-content-center" role="document">
                    <div class="modal-content">
                        <div class="modal-header d-block">
                            <div class="d-flex">
                                <h1 class="modal-title"><?php echo $eventName?></h1>
                                <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <h6 class="modal-title"> <span class="text-muted">By </span><?php echo $organizerName;?>
                            </h6>
                            <h6 class="modal-title"> <span class="text-muted">At </span><?php echo $eventTime?></h6>
                            <h6 class="modal-title"> <span class="text-muted">On </span><?php echo $eventDate;?>
                            </h6>
                        </div>

                        <div class="modal-body">
                            <h6>Registered Teams</h6>
                            <div id="accordion">
                                <?php 
                                    $teamArray = $event->teamArray;
                                    // For each team in this event
                                    foreach($teamArray as $team){
                                        $teamName = $team->teamName;
                                        $teamDetailsCard = str_replace(" ","",$teamName);
                                ?>
                                <div class="card">
                                    <div class="card-header" role="tab" id="<?php echo $teamDetailsCard ?>Heading">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#<?php echo $teamDetailsCard ?>" aria-expanded="false" aria-controls="collapseOne">
                                                <?php echo $teamName;?>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="<?php echo $teamDetailsCard ?>" class="collapse " role="tabpanel" aria-labelledby="headingOne">
                                        <div class="card-body">
                                            <ol>
                                                <?php
                                                    $participantArray = $team->participantArray;
                                                    // For each
                                                    foreach($participantArray as $participantName){
                                                        echo "<li>".$participantName."</li>";
                                                    }
                                                ?>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    }                                                         
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                }
            ?>
        </div>
    </div>
    <!-- End of Content -->

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>