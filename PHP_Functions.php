<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Functions</title>
</head>
<body>
<h1>4-1 PHP Functions</h1>
<?php

$date=date_create("2023-09-15");
echo date_format($date,"m/d/Y") . "<br>";
echo date_format($date, "d/m/Y") . "<br>";
$discription = "              Intro to PHP DMACC web development class             ";
$number = "1234567890";


function writeMsg() {
   global $discription;
    echo($discription) . "<br>" . "number of characters before in string: ";
    echo strlen($discription) . "<br>" . "string after trimmed and lower case: ";
    echo strtolower(trim($discription)) . "<br>";
    if (stripos($discription, 'dmacc') !== false) {
        echo 'This string contains the word: DMACC';
    }
  };
  writeMsg();
  function writeNumber() {
    global $number;
    echo "<br>" . number_format($number) . "<br>";
    }
  writeNumber();
  function writeCurrency() {
   global $number;
  echo "$" . number_format($number, 2);
  }
  writeCurrency();

?>
    
</body>
</html>

</body>
</html>
