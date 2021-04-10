<?php include 'functions.php'; ?>
<?php
date_default_timezone_set('America/Chicago');

try {
    $conn = db_connect();
    $name = v_array('name', $_POST);
    $desc = v_array('desc', $_POST);
    $pres = v_array('pres', $_POST);
    $date = date('Y-m-d', strtotime($_POST['date']));
    $time = date('H:i:s', strtotime($_POST['time']));
    $current_date = date('Y-m-d H:i:s' ,strtotime($_POST['current']) );



    //    echo '<pre>'; print_r($name);  echo '</pre>';
    //    echo '<pre>'; print_r($desc);  echo '</pre>';
    //    echo '<pre>'; print_r($pres);  echo '</pre>';
    //    echo '<pre>'; print_r($date);  echo '</pre>';
    //    echo '<pre>'; print_r($time);  echo '</pre>';
    //    echo '<pre>'; print_r($current_date);  echo '</pre>';


    if(!$name || !$desc || $pres || $date) {
        throw new Exception('input field are required for updating events.');
    }

    // // Get image data, save image to server
    // $destination = 'uploads';
    // $file_data = $_FILES['image'];
    // $tmp_name = $file_data['tmp_name'];
    // $file_name = $file_data['name'];
    // $file_path = "$destination/$file_name";
    // $file_uploaded = move_uploaded_file($tmp_name, $file_path);
    // if(!$file_data || !$file_uploaded) {
    //     throw new Exception('A valid image is required.');
    // }

    $data = array(
        "name" => $name,
        "description" => $desc,
        "presenter" => $pres,
        "date" => $date,
        "time" => $time,
        "date_inserted" => $current_date,
        "date_updated" => $current_date
    
    );

    $query = 'INSERT INTO wdv341_events (name, description, presenter, date, time, date_inserted, date_updated ) 
    VALUES ($name, $description, $presenter, $date, $time, $date_inserted, $date_updated)';


    $stmt = $conn->prepare($query);
    $result = $stmt->execute($data);
        } catch(PDOException $e) {
    write_log($e->getMessage());
        } catch(Exception $e) {
    write_log($e->getMessage());
        }

$conn = null;
$message = $result ? '?result=success' : '?result=failed';

header("Location: events_form.php$message");
?>