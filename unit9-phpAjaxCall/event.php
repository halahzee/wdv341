<?php 

require_once('connection.php');

//create class called event
class Event {
    private $event_conn;

    
    function __construct() {
        $this->event_conn = new Connection();
    }

    
    public function get_events($query, $values = array()) {
        $conn = $this->event_conn->open();
        $statement_obj = $conn->prepare($query);

       
    
        if($values) {
            foreach($values as $value) {
                $statement_obj->bindValue($value[0], $value[1]);
            }
        }

        $statement_obj->execute();
        $results = $statement_obj->fetchAll(PDO::FETCH_ASSOC);
        $conn = $this->event_conn->close();
        
        return $results;
    }
}
?>