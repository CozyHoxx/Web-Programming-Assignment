<?php
include_once("config.php");
include("class_lib.php");
// SELECT e.event_name, t.team_id, t.team_name FROM event e , team t, event_team et WHERE e.event_id = et.event_id AND t.team_id = et.team_id
// SELECT p.first_name, e.event_name, t.team_name FROM participant p, participant_team pt, team t, event e, event_team et  WHERE p.participant_id = pt.participant_id and pt.team_id = t.team_id and t.team_id = et.team_id and et.event_id = e.event_id
// $selectQuery = "Select * from participant;";

// $selectQuery = "SELECT * FROM event INNER JOIN organizer ON event.organizer_id=organizer.organizer_id ORDER BY event_date;";
// $selectQuery = "SELECT p.first_name,p.last_name, e.event_name, t.team_name FROM participant p, participant_team pt, team t, event e, event_team et WHERE p.participant_id = pt.participant_id and pt.team_id = t.team_id and t.team_id = et.team_id and et.event_id = e.event_id;";
$selectQuery = "SELECT p.first_name,p.last_name, e.event_name, t.team_name, o.organizer_name, e.event_date, e.event_time FROM participant p, participant_team pt, team t, event e, event_team et , organizer o WHERE p.participant_id = pt.participant_id and pt.team_id = t.team_id and t.team_id = et.team_id and et.event_id = e.event_id and e.organizer_id = o.organizer_id ORDER BY e.event_date";

$queryResult = mysqli_query($db,$selectQuery);


while($res = mysqli_fetch_array($queryResult)){
    $newArray[] = $res;
    // print_r($res) ;
    // echo "<br>";
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

    // Print details
    // echo $participantName ." joins ".$eventName ." as ".$teamName ." on ".$eventTime ." ".$eventDate ."<br>" ;

    $newEvent = FALSE; //Flag to print a different event card, false = the event in this row is the same as previous row
                    
    if($currentEvent != $eventName){
        $newEvent = TRUE;
    }

    $currentEvent = $eventName;
    if($newEvent){
        $eventArray[] = new Event($eventName,$eventTime,$eventDate,$organizerName);
        $keyForTeamArray=0;
        foreach ($eventArray as $key=>$value){
            if ($value->getEventName() == $eventName){
                $keyForTeamArray = $key;
            }
        }
        $eventArray[$keyForTeamArray] -> addParticipant($teamName,$participantName);
    }else{
        // Get event index from array
        $keyForTeamArray=0;
        foreach ($eventArray as $key=>$value){ 
            if ($value->getEventName() == $eventName){
                $keyForTeamArray = $key;
            }
        }
        $eventArray[$keyForTeamArray] -> addParticipant($teamName,$participantName);
    } 
}
// echo '<pre>'; print_r($eventArray); echo '</pre>'; //nicely formatted array


$db->close();




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>


    <?php
    
    foreach($eventArray as $event){ 
        // Details of event
        $eventName = $event -> getEventName();
        $eventTime = $event -> getEventTime();
        $eventDate = $event -> getEventDate();
        $organizerName = $event -> getOrganizerName();
        
        // print_r($event); echo "<br><br>";
        // diplay card 
        ?>
        <div class="row">
        
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
                            <a href="#" class="card-link">Join Event</a>

                        </div>
                </div>
            </div>

            <div id="<?php echo str_replace(" ","_",$eventName); ?>_Details" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="newsletterModal" aria-hidden="true">
                <div class="modal-dialog modal-lg d-flex flex-column justify-content-center" role="document">
                    <div class="modal-content">
                        <div class="modal-header d-block">
                            <div class="d-flex">
                                <h1 class="modal-title"><?php echo $eventName?></h1>
                                <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <h6 class="modal-title"> <span class="text-muted">By </span><?php echo $organizerName;?></h6>
                            <h6 class="modal-title"> <span class="text-muted">At </span><?php echo $eventTime?></h6>
                            <h6 class="modal-title"> <span class="text-muted">On </span><?php echo $eventDate;?>
                            </h6>
                        </div>

                        <div class="modal-body">
                            <h6>Registered Teams</h6>
                            <div id="accordion">

                            <?php 

                                $teamArray = $event->teamArray;
                                foreach($teamArray as $team){
                                    $teamName = $team->teamName;
                                    $teamDetailsCard = str_replace(" ","",$teamName);

                            ?>

                                <div class="card">
                                    <div class="card-header" role="tab" id="<?php echo $teamDetailsCard ?>Heading">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#<?php echo $teamDetailsCard ?>" aria-expanded="false"
                                                aria-controls="collapseOne">
                                                <?php echo $teamName;?>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="<?php echo $teamDetailsCard ?>" class="collapse " role="tabpanel"
                                        aria-labelledby="headingOne" >
                                        <div class="card-body">
                                            <ol>
                                                <?php
                                                $participantArray = $team->participantArray;
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
        </div>
    <?php
        }
    ?>
    </div>

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