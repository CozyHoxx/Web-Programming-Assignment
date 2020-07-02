<?php
    class Event {
        private $eventName;
        private $eventTime;
        private $eventDate;
        private $organizer;
        var $teamArray = [];

        function __construct($eventName,$eventTime,$eventDate,$organizer){
            $this->eventName = $eventName;
            $this->eventTime = $eventTime;
            $this->eventDate = $eventDate;
            $this->organizer = $organizer;
        }

        function addTeam($teamName){
            $flagToAdd = TRUE;
            foreach ($this->teamArray as $key=>$value){
                if ($value == $teamName){
                    $flagToAdd = FALSE;
                }
            }
            if($flagToAdd){       
                $this->teamArray[] = new Team($teamName);
            }
        }

        function addParticipant($teamName,$participantName){
            $flagToAdd = TRUE;
            $keyForTeamArray;
            foreach ($this->teamArray as $key=>$value){ //check if team name already exist
                
                if ($value->teamName == $teamName){
                    $flagToAdd = FALSE; 
                    $keyForTeamArray = $key;
                }
            }
            if($flagToAdd){       
                $this->teamArray[] = new Team($teamName,$participantName);
            }else{
                $this->teamArray[$keyForTeamArray]->addParticipant($participantName);                
            }
        }

        function setName($newName){
            $this->eventName = $newName;
        }

        function getEventName(){
            return $this->eventName;
        }

        function setTime($newTime){
            $this->eventTime = $newTime;
        }

        function getEventTime(){
            return $this->eventTime;
        }

        function getEventDate(){
            return $this->eventDate;
        }

        function getOrganizerName(){
            return $this->organizer;
        }

        

}

class Team{
    var $teamName;
    var $participantArray = [];

    function __construct($teamName,$participantName){
        $this->teamName = $teamName;
        $this->participantArray[] = $participantName;
    }

    function addParticipant($participantName){
        $flagToAdd = TRUE;
        foreach ($this->participantArray as $key => $value){
            if($value == $participantName){
                $flagToAdd = FALSE;
            }
        }
        if($flagToAdd){
            $this->participantArray[] = $participantName;
        }
    }

}

?>
