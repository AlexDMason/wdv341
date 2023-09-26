<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV101 Basic Form Handler Example</title>
</head>

<body>


Dear <?php echo $_POST["first_name"]; ?> <?php echo $_POST["last_name"]; ?><br>
<br><br>
Thank for you for your interest in <?php echo $_POST["school_name"]; ?>.  
<br><br>
We have you listed as an <?php echo $_POST["year"]; ?> starting this fall. 
<br><br>
You have declared <?php echo $_POST["school_majors"]; ?> as your major. 
<br><br>
Based upon your responses we will provide the following information in our confirmation email to you at <?php echo $_POST["email_address"]; ?>.
<br><br>
<?php echo $_POST["contact"]; ?>
<br><br>
You have shared the following comments which we will review:
<br><br>
<?php echo $_POST["comment"]; ?>

</body>
</html>
