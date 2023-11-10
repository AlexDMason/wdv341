<?php

    
    $numberError = "";

    if(isset($_POST['submit'])){
        echo "<h3>Your Form has been succesfully Submitted</h3>"; 

        $numberOfItems = $_POST['numberOfItems'];
        
        if(is_numeric($numberOfItems)){
            $numberError = "";
        }
        else{
            $numberError = "Please input a value";
        }
    }
    else{

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Self Post Form</title>
</head>
<body>
    <form method="post" action="selfPost.php">
        <div>
            <label for="numberOfItems">Number of value: </label>
            <input type="text" name="numberOfItems" id="numberOfItems">
            <span class="errorMsg"><?php echo $numberError; ?></span>
        </div>
        <p>
            <input type="submit" value="Submit" name="submit">
            <input type="reset" value="Reset" name="reset">
        </p>    
    </form>
</body>
</html>