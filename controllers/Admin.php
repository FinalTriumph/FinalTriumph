<?php

class Admin extends Controller {
    
    
    public static function login() {
        /* Only one/first  time, saves username and hashed password
        if (!empty($_POST['username'] && !empty($_POST['password']))) {
            Database::query('INSERT INTO admin VALUES (\'\', :username, :password)', array(':username'=>$_POST['username'], ':password'=>password_hash($_POST['password'], PASSWORD_BCRYPT)));
        }
        */
        if (!empty($_POST['username'] && !empty($_POST['password']))) {
            
            session_start();
            
            if (!isset($_POST['nocsrf'])) {
                die("Invalid token");
            }
            
            if ($_POST['nocsrf'] !== $_SESSION['token']) {
                die("Invalid token");
            }
            
            if (password_verify($_POST['password'], Database::query('SELECT password FROM admin WHERE username=:username', array(':username'=>$_POST['username']))[0]['password'])) {
                session_start();
                $_SESSION['admin'] = $_POST['username'];
            }
        }
        
        header('Location: /ka-ft-admin');
    }
    
    public static function logout() {
        
        session_start();
        session_unset();
        
        header("Location: /ka-ft-admin");
    }
    
    public static function addProject() {
        
        session_start();
        
        if (isset($_SESSION["admin"])) {
            if (!Database::query('SELECT * FROM admin WHERE username=:username', array(':username'=>$_SESSION["admin"]))) {
                die("Unauthorized page");
            }
        } else {
            die("Unauthorized Page");
        }
        
        if (!isset($_POST['nocsrf'])) {
            die("Invalid token");
        }
        
        if ($_POST['nocsrf'] !== $_SESSION['token']) {
            die("Invalid token");
        }
        
        if (!empty($_POST['title']) && !empty($_POST['languages']) && !empty($_POST['image']) && !empty($_POST['link']) && !empty($_POST['description']) && !empty($_POST['category']) ) {
                
            Database::query('INSERT INTO projects VALUES (\'\', :title, :languages, :image, :link, :description, :category)', array(':title'=>$_POST['title'], ':languages'=>$_POST['languages'], ':image'=>$_POST['image'], ':link'=>$_POST['link'], ':description'=>$_POST['description'], ':category'=>$_POST['category']));
        }
        
        header("Location: /ka-ft-admin");
    }
    
    public static function updateProject() {
        
        session_start();
        
        if (isset($_SESSION["admin"])) {
            if (!Database::query('SELECT * FROM admin WHERE username=:username', array(':username'=>$_SESSION["admin"]))) {
                die("Unauthorized page");
            }
        } else {
            die("Unauthorized Page");
        }
        
        if (!isset($_POST['nocsrf'])) {
            die("Invalid token");
        }
        
        if ($_POST['nocsrf'] !== $_SESSION['token']) {
            die("Invalid token");
        }
        
        if (!isset($_GET['id'])) {
            die("Project id not specified");
        }
        
        if (!empty($_POST['title']) && !empty($_POST['languages']) && !empty($_POST['image']) && !empty($_POST['link']) && !empty($_POST['description']) && !empty($_POST['category']) ) {
                
            Database::query('UPDATE projects SET title=:title, languages=:languages, image=:image, link=:link, description=:description, category=:category WHERE id=:id', array(':id'=>$_GET['id'], ':title'=>$_POST['title'], ':languages'=>$_POST['languages'], ':image'=>$_POST['image'], ':link'=>$_POST['link'], ':description'=>$_POST['description'], ':category'=>$_POST['category']));
        }
        
        header("Location: /ka-ft-admin");
    }
    
    public static function deleteProject() {
        
        session_start();
        
        if (isset($_SESSION["admin"])) {
            if (!Database::query('SELECT * FROM admin WHERE username=:username', array(':username'=>$_SESSION["admin"]))) {
                die("Unauthorized page");
            }
        } else {
            die("Unauthorized Page");
        }
        
        if (!isset($_POST['nocsrf'])) {
            die("Invalid token");
        }
        
        if ($_POST['nocsrf'] !== $_SESSION['token']) {
            die("Invalid token");
        }
        
        if (!isset($_POST['projectid'])) {
            die("Project id not specified");
        }
        
        Database::query('DELETE FROM projects WHERE id=:id', array(':id'=>$_POST['projectid']));
        
        header("Location: /ka-ft-admin");
    }
}

?>