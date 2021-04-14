<?php include 'functions.php'; ?>
<?php include 'events_form.php';?>
 <?php
 date_default_timezone_set('America/Chicago');

 try {
     $conn = db_connect();
     $name = v_array('name', $_POST);
     $description = v_array('description', $_POST);
     $presenter = v_array('presenter', $_POST);
     $date = date('Y-m-d', strtotime($_POST['date']));
     $time = date('H:i:s', strtotime($_POST['time']));
     $current_date = date('Y-m-d H:i:s' ,strtotime($_POST['current']) );

        // echo '<pre>'; print_r($name);  echo '</pre>';

     if(!$name || !$description || !$presenter || !$date ||!$time) {
         throw new Exception('input field are required for inserting an events.');
     }

     $data = array(
         "name" => $name,
         "description" => $description,
         "presenter" => $presenter,
         "date" => $date,
         "time" => $time,
         "date_inserted" => $current_date,
         "date_updated" => $current_date

     );

     $query = 'INSERT INTO wdv341_events (name, description, presenter, date, time, date_inserted, date_updated ) 
     VALUES (:name, :description, :presenter, :date, :time, :date_inserted,:$date_updated)';


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