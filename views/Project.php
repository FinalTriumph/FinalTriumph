<?php

$title = "Single Project";

require_once('./views/inc/header.php');

?>

<div id="spinner_wrapper">
    <div class="spinner"></div>
</div>

<div id="all_projects_div">
    <div id="single_project">
        <div id="single_project_left">
        </div>
        <div id="single_project_right">
        </div>
    </div>
    
    <h3 class="pr_h_h3" id="s_pr_h3"></h3>
    
    <div id="s_pr_other_projects"></div>
</div>

<script type="text/javascript" src="/public/js/flip.js"></script>
<script type="text/javascript" src="/public/js/project.js"></script>

<?php

require_once('./views/inc/footer.php')

?>