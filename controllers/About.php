<?php

class About extends Controller {
    
    public static function getEvents() {
        $events = Database::query('SELECT * FROM events ORDER BY id DESC');
        
        echo json_encode($events);
    }
}

?>