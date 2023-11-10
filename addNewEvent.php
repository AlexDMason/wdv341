<?php

session_start();
if(isset($_SESSION['validuser'])){

}else{
    header('Location: login.php');
}

$today = date("M-D-Y");

$confirmMessage = false;

$eventNameMsg = "";

$dateInserted = currentDateUSFormat();
$dateUpdated = currentDateUSFormat();

function currentDateUSFormat(){
  $date = date_default_timezone_set("America/Chicago");
  $date = date("m/d/Y");
  return $date;
  
}

function currentDateSqlFormat()
{
  $date = date_default_timezone_set("America/Chicago");
  $date = date("m/d/Y"); 
  return $date;
}

if(isset($_POST['submit'])){
    echo "<h1> Process the form, it has been submitted, ";


    $inEventName = $_POST['events_name'];
    $inEventDesc = $_POST['events_description'];
    $inEventPresenter = $_POST['events_presenter'];
    $inEventTime = $_POST['events_time'];
    $inEventDate = $_POST['events_date'];

    function validateEventName($inName){
      if($inName == ""){
        global $validInput, $eventNameMsg;
        $validInput = false;
        $eventNameMsg = "Invalid name";
      }
    }

    $validInput = true;
    validateEventName($inEventName);
    if($validInput){

    }
    else{

    }

    $host = $_POST['events_location'];
    if(!empty($host)){
        header("refresh:0");
        
    }else{
      $eventName = $_POST['events_name'];
      $eventDescription = $_POST['events_description'];
      $eventPresenter = $_POST['events_presenter'];
      $eventDate = $_POST['events_date'];
      $eventTime = $_POST['events_time'];
      $eventDateInserted = currentDateSqlFormat();
      $eventDateUpdated = currentDateSqlFormat();
}

    require 'dbConnect.php';

    $sql = "INSERT INTO wdv341_events";
    $sql .= "(events_name, events_description, events_presenter, events_time, events_date, events_date_inserted, events_date_updated)";
    $sql .=" VALUES ";
    $sql .="(:eventName, :eventDesc, :eventPresenter, :eventTime, :eventDate, :eventDateInserted, :eventDateUpdated)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':eventName', $inEventName);
    $stmt->bindParam(':eventDesc', $inEventDesc);
    $stmt->bindParam(':eventPresenter', $inEventPresenter);
    $stmt->bindParam(':eventTime', $inEventTime);
    $stmt->bindParam(':eventDate', $inEventDate);
    $stmt->bindParam(':eventDateInserted', $eventDateInserted);
    $stmt->bindParam(':eventDateUpdated', $eventDateUpdated);

    $stmt->execute();

    $confirmMessage = true;
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .gotcha {
            display: none;
        }
        </style>
</head>
<body>

<h3>You are signed in</h3>
    <ul>
        <li><a href="login.php">Admin Home</a></li>
        <li><a href="addNewEvent.php">New Event</a></li>
        <li><a href="showEvents.php">View Events</a></li>
        <li><a href="logout.php">Sign off</a></li>
    </ul>

<?php
if($confirmMessage){
?>
  <div class="confirmMessage">
  <h2>Thank you, your information has been inputted</h2>
</div>
<?php
}
else{
?>


<form method="post" action="addNewEvent.php">

<label for="events_name">Event Name: </label>
<input type="text" name="events_name" id="events_name">
<span class="errMsg"><?php echo $eventNameMsg; ?></span>

<label for="events_description">Event Description: </label>
<input type="text" name="events_description" id="events_description">

<label for="events_presenter">Event Presenter: </label>
<input type="text" name="events_presenter" id="events_presenter">

<label for="events_time">Event Time: </label>
<input type="time" name="events_time" id="events_time">

<div class="gotcha">
<label for="events_location">Event Location: </label>
<input type="text" name="events_location" id="events_location" value="">
</div>

<label for="events_date">Event Date: </label>
<input type="date" name="events_date" id="events_date">

<label for="events_date_inserted">Event Date Inserted: </label>
<input type="text" name="events_date_inserted" id="events_date_inserted" value="<?php echo $dateInserted ?>" readonly> 

<label for="events_updated_date">Event Date Updated: </label>
<input type="text" name="events_updated_date" id="events_updated_date" value="<?php echo $dateUpdated ?>" readonly> 

<p>
    <input type="submit" value="submit" name="submit">
    <input type="reset">
</p>
</form>
</body>
</html>
<?php
}
?>