<?php
    session_start();

    
    $errorMsg = ""; 
    $validuser = false;


    if(isset($_POST['submit'])){
        echo "Form Submitted";

        $inUserName = $_POST['inUserName'];
        $inPassword = $_POST['inPassword'];

        require 'dbConnect.php';
        $sql = 'SELECT event_username, event_password FROM wdv341_eventuser WHERE event_username = :username and event_password = :password';
    
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':username', $inUserName);
        $stmt->bindParam(':password', $inPassword);

        $stmt->execute();
    
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();

        if($row){
            $errorMsg = "";
            $validuser = true;
            $_SESSION['validuser'] = true;
            $_SESSION['username'] = $inUserName;

        }
        else{
            $errorMsg = "Invalid";
            $validuser = false;
        }
    
    }
    else{
        if(isset($_SESSION['validuser'])){
            $validuser = true;
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h1>Event Admin Login</h1>
    <?php
    if($validuser){
       
    ?>
    <h3>You are signed in as: <?php echo $_SESSION['username']; ?></h3>
    <ul>
        <li><a href="login.php">Admin Home</a></li>
        <li><a href="addNewEvent.php">New Event</a></li>
        <li><a href="showEvents.php">View Events</a></li>
        <li><a href="logout.php">Sign off</a></li>
    </ul>
    <?php
    }
    else{
        
       
    ?>
    <form method="post" action="login.php">
        <span><?php echo $errorMsg ?></span>
        <p>
            <label for="inUserName">Username: </label>
            <input type="text" name="inUserName" id="inUserName">
        </p>
        <p>
            <label for="inPassword">Password: </label>
            <input type="password" name="inPassword" id="inPassword">
        </p>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
    <?php
    }
    ?>
</body>
</html>