<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basics</title>
</head>
<body>
    <?php echo 'Today Date is:'. " " . date('Y/m/d')?>
    <h1>PHP Basic</h1>
    <h3>Create a variable called user name!</h3>
    <?php
    $yourName = "<h2>My Name is Halah</h2>";
    echo $yourName;
    $number1 = "4";
    $number2 = "10";
    $total = $number1 + $number2;
    echo "<h4>Number 1 = $number1
    <br>Number 2 = $number2
    <br>Total = $total</h4>";
    
    ?>
   <h3>Create a PHP variable that is an array containing the values 'PHP', 'HTML' and 'Javascript'. </h3>
   <script>
   <?php
    $language = array('PHP', 'HTML', 'JAVASCRIPT');
    echo "document.write ('$language[0], $language[1], $language[2]');";
  ?>
  
    </script>
   

</body>
</html>