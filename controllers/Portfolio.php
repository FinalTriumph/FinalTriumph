<?php

class Portfolio extends Controller {
    
    public static function getProjects() {
        $projects = Database::query('SELECT * FROM projects ORDER BY id DESC');
        
        echo json_encode($projects);
    }
}

?>