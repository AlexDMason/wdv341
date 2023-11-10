<?php
    session_start();

    if( isset($_SESSION['validuser']) ){
        
    }
    else{
        header('Location: login.php');  
    }
   
    require 'dbConnect.php'; 

    $sql = "SELECT events_id, events_name, events_description, events_presenter, events_date, events_time FROM wdv341_events"; 
    $stmt = $conn->prepare($sql);  
    $stmt->execute();  
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Events</title>

</head>
<body>
    <h1>Event System</h1>
    <h2>List of Events</h2>
    <h3>You are signed in as: <?php echo $_SESSION['username']; ?></h3>
    <ul>
        <li><a href="login.php">Admin Home</a></li>
        <li><a href="addNewEvent.php">New Event</a></li>
        <li><a href="showEvents.php">View Events</a></li>
        <li><a href="logout.php">Sign off</a></li>
    </ul>
    <div class="displayEvents">
        <table>
            
        <?php
            while($row = $stmt->fetch() ){
                echo "<tr>";
                echo "<td>" . $row["events_name"] . "</td>";
                echo "<td>" . $row['events_description'] . "</td>";
                echo "<td>" . $row['events_presenter'] . "</td>";
                echo "<td>" . $row['events_time'] . "</td>";
                echo "<td>" . $row['events_date'] . "</td>";
                echo "<td><a href='deleteEvent.php?eventID=" . $row['events_id'] . "'><button>Delete</button></a> </td>";
                echo "</tr>";  
            }
        ?>
        </table>
    </div>
        <a href="addNewEvent.php"><button>New Event</button></a>
</body>
</html>
