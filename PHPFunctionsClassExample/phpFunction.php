
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Functions</title>
    <style>
    div{
        background-color: red;

    }
    </style>
</head>
<body>
<div>
<?php

$dollars = 12345;
echo number_format($dollars, 2, "." , ',')
?>
</div>

</body>
</html>


