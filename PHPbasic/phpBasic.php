<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    echo "Number1" . " = " . $number1;
    echo "<br><br>";
    echo "Number2" . " = " . $number2;
    echo "<br><br>";
    echo "Number1". "+" . " ". "Number2"." " ."=" . " ";
    echo "$number1" + "$number2";

    ?>
   <h2>Create a variable that is an php array</h2>
   <?php
    $language = array('PHP.', 'HTML.', 'JAVASCRIPT.')?>
    <h3>List of Languages</h3>
    <ul>
    <?php foreach ($language as $language) { ?>
    <li><?php echo $language ?></li>
    <?php }  ?>
    </ul>

   
    
   

</body>
</html>