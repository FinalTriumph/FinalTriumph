<?php

class Project extends Controller {
    
    public static function singleProject() {
        if (isset($_GET['id'])) {
            if (Database::query('SELECT * FROM projects WHERE id=:id', array(':id'=>$_GET['id']))) {
                require_once("./views/Project.php");
            } else {
                header("Location: /portfolio");
            }
        } else {
            header("Location: /portfolio");
        }
    }
    
    public static function getSingleProject() {
        if (isset($_GET['id'])) {
            $project = Database::query('SELECT * FROM projects WHERE id=:id', array(':id'=>$_GET['id']))[0];
            $otherProjects = Database::query('SELECT * FROM projects WHERE category=:category ORDER BY id DESC', array(':category'=>$project['category']));
            $json = '{ "project": '.json_encode($project).', "other": '.json_encode($otherProjects).' }';
            echo $json;
        }
    }
}

?>