<?php
require_once('connect-pdo.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataBase Connection</title>
</head>
<body>
    <?php if(isset($conn)){ echo "Connection Successful";}else {echo $connectionError;};
        ?>
</body>
</html>