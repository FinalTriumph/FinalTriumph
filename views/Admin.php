<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <!--<link rel="icon" href="https://i.imgur.com/KFGajXy.png" />-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700&amp;subset=latin-ext" rel="stylesheet" />
    <link href="/public/css/admin.css" rel="stylesheet">
</head>

<body>
    
<?php 

session_start();

if (isset($_SESSION["admin"])) {
    if (Database::query('SELECT * FROM admin WHERE username=:username', array(':username'=>$_SESSION["admin"]))) {
        
        if (!isset($_SESSION['token'])) {
            $cstrong = true;
            $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
            $_SESSION['token'] = $token;
        }
        
        ?>
        
        <div id="logged_in_div">
            <p1>Logged in as <?php echo $_SESSION["admin"]; ?> | </p1>
            <a href="ka-ft-admin-logout"> Logout</a>
            <hr id="hr_log_form"/>
            <form action="ka-ft-admin-add-project" method="POST" id="add_project">
                <input type="text" name="title" placeholder="Title ..." required /><br />
                <input type="text" name="languages" placeholder="Languages ..." required /><br />
                <input type="text" name="image" placeholder="Image link ..." required /><br />
                <input type="text" name="link" placeholder="Project link ..." required /><br />
                <input type="text" name="category" placeholder="Category ..." required /><br />
                <textarea name="description" placeholder="Description ..." rows="5" required /></textarea><br />
                <input type="hidden" name="nocsrf" value="<?php echo $_SESSION['token']; ?>">
                <input type="submit" value="Add Project" id="add_project_btn" />
            </form>
            <hr id="hr_form_proj"/>
        </div>
        
        <?php
        
        $projects = Database::query('SELECT * FROM projects ORDER BY id DESC');
        
        foreach ($projects as $project) {
            echo '
            <form action="ka-ft-admin-update-project?id='.$project['id'].'" method="POST">
                <input type="text" name="title" placeholder="Title ..." value="'.$project['title'].'" required /><br />
                <input type="text" name="languages" placeholder="Languages ..." value="'.$project['languages'].'" required /><br />
                <input type="text" name="image" placeholder="Image link ..." value="'.$project['image'].'" required /><br />
                <input type="text" name="link" placeholder="Project link ..." value="'.$project['link'].'" required /><br />
                <input type="text" name="category" placeholder="Category ..." value="'.$project['category'].'" required /><br />
                <textarea name="description" placeholder="Description ..." rows="5" required />'.$project['description'].'</textarea><br />
                <input type="hidden" name="nocsrf" value="'.$_SESSION['token'].'">
                <input type="submit" value="Update Project" class="update_project_btn" />
            </form>
            <form action="ka-ft-admin-delete-project" method="POST">
                <input type="hidden" name="projectid" value="'.$project['id'].'" />
                <input type="hidden" name="nocsrf" value="'.$_SESSION['token'].'" />
                <input type="submit" onclick="return confirm(\'Delete this project?\')" value="Delete Project" class="delete_project_btn" />
            </form>
            <hr class="pr_sep" />
            ';
        }
    } else {
        
        session_unset();
        
        $cstrong = true;
        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
        $_SESSION['token'] = $token;
        
        ?>
        
        <form action="ka-ft-admin-login" method="POST" id="login_form">
            <input type="text" name="username" placeholder="Username ... " required /><br />
            <input type="password" name="password" placeholder="Password ..." required /><br />
            <input type="hidden" name="nocsrf" value="<?php echo $_SESSION['token']; ?>">
            <input type="submit" value="Login" id="login_btn">
        </form>
        
        <?php
    }
} else {
    
    if (!isset($_SESSION['token'])) {
        $cstrong = true;
        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
        $_SESSION['token'] = $token;
    }
    
    ?>
    <form action="ka-ft-admin-login" method="POST" id="login_form">
        <input type="text" name="username" placeholder="Username ... " required /><br />
        <input type="password" name="password" placeholder="Password ..." required /><br />
        <input type="hidden" name="nocsrf" value="<?php echo $_SESSION['token']; ?>">
        <input type="submit" value="Login" id="login_btn">
    </form>
    
    <?php
}

?>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script type="text/javascript" src="/public/js/admin.js"></script>

</body>
</html>