<?php

    class event{
        public $events_id;
        public $events_name;
        public $events_description;
        public $events_presenter;
        public $events_time;
        public $events_date;

        function setEventId($inId){
            $this->events_id = $inId;
        }

        function getEventId(){
            return $this->events_id;
        }

        function setEventName($inName){
            $this->events_name = $inName;
        }

        function getEventName(){
            return $this->events_name;
        }
        
        function setEventDescription($inDescription){
            $this->events_description = $inDescription;
        }

        function getEventDescription(){
            return $this->events_description;
        }

        public function getEventPresenter(){
            return $this->events_presenter;
        }
    
        public function setEventPresenter($inEventPresenter){
            $this->events_presenter = $inEventPresenter;
            return $this;
        }
        
        public function getEventTime(){
            return $this->events_time;
        }

        public function setEventTime($ineventTime){
            $this->events_time = $ineventTime;
            return $this;
        }

        public function getEventDate(){
            return $this->events_date;
        }

        public function setEventDate($ineventDate){
            $this->events_date = $ineventDate;
            return $this;
        }

    }

?>
<?php

require "dbConnect.php";

$outputObjArray = [];

try {
    $sql = "SELECT events_id, events_name, events_description, events_presenter, events_time, events_date FROM wdv341_events WHERE events_id = 1";   
    $stmt = $conn->prepare($sql);           
    $stmt->execute();                     
            
    foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {    
        
        $outputObj = new Event();
        $outputObj->setEventId($row ['events_id'] );
        $outputObj->setEventName($row ['events_name'] );
        $outputObj->setEventDescription($row ['events_description'] );
        $outputObj->setEventPresenter($row ['events_presenter'] );
        $outputObj->setEventTime($row ['events_time'] );
        $outputObj->setEventDate($row ['events_date'] );
    
        array_push($outputObjArray, $outputObj);
    }

}

catch(PDOException $e)  {
    echo "Errors: " . $e->getMessage();
}
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Retail Formatting</title>
</head>

<body>
<ul><?php echo(json_encode($outputObjArray));?></ul>
</body>

</html>