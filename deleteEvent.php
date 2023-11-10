<?php
    session_start();
    if( isset($_SESSION['validuser']) ){
        
    }

    else{
        header('Location: login.php');      
    }

    $eventID = $_GET['eventID'];    

    

    require 'dbConnect.php';       

    $sql = "DELETE FROM wdv341_events WHERE events_id=:eventID";   
    
    $stmt = $conn->prepare($sql);   
    $stmt->bindParam(':eventID', $eventID); 
    $stmt->execute();       
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    header('Location: showEvents.php');

?>