<?php

$title = "Portfolio";

require_once('./views/inc/header.php');

?>

<div id="slider_div">
    <img id="slide_control_img" src="/images/mr33.png" />
    <div class="slide_img_div">
        <img class="mySlides" src="/images/ni33.png" alt="Notes App" />
    </div>
    <div class="slide_img_div">
        <img class="mySlides" src="/images/mr33.png" alt="Movie Reviews" id="def_f_slide" />
    </div>
    <div class="slide_img_div">
        <img class="mySlides" src="/images/lb33.png" alt="LaravelBlog" />
    </div>
    <div id="slider_arrows">
        <button class="display-left" onclick="plusDivs(-1)"> &#10092;</button>
        <button class="display-right" onclick="plusDivs(+1)">&#10093;</button>
    </div>
    <div id="slider_controls">
        <span class="slide_s" onclick="currentDiv(1)"></span>
        <span class="slide_s slide_s_selected" onclick="currentDiv(2)"></span>
        <span class="slide_s" onclick="currentDiv(3)"></span>
    </div>
</div>

<div id="spinner_wrapper">
    <div class="spinner"></div>
</div>

<div id="all_projects_div">
    <h3 class="pr_h_h3">Newest projects 
        <hr class="pr_h_hr" />
        <span class="pr_h_desc">Created with main focus on PHP / MySQL / Laravel.</span>
    </h3>
    <div id="new_projects"></div>
    
    <h3 class="pr_h_h3">Front End Projects for Free Code Camp
        <hr class="pr_h_hr" />
        <span class="pr_h_desc">Created with main focus on HTML / CSS / JavaScript / jQuery.</span>
    </h3>
    <div id="fccfe_projects">
        <div class="project_div cert_div">
            <div class="front">
                <img src="/images/certificates/FrontEnd.jpg" class="project_img" />
            </div>
            <div class="back">
                <img src="/images/certificates/FrontEnd.jpg" class="project_img cert_img" />
                <div class="project_img_back cert_back">
                    <a href="https://www.freecodecamp.org/finaltriumph/front-end-certification" class="back_link cert_back_link" target="_blank">Verify Certification</a>
                </div>
            </div>
        </div>
    </div>
    
    <h3 class="pr_h_h3">Data Visualization Projects for Free Code Camp 
        <hr class="pr_h_hr" />
        <span class="pr_h_desc">Created with main focus on D3.js / React.js.</span>
    </h3>
    <div id="fccdv_projects">
        <div class="project_div cert_div">
            <div class="front">
                <img src="/images/certificates/DataVis.jpg" class="project_img" />
            </div>
            <div class="back">
                <img src="/images/certificates/DataVis.jpg" class="project_img" />
                <div class="project_img_back cert_back">
                    <a href="https://www.freecodecamp.org/finaltriumph/data-visualization-certification" class="back_link cert_back_link" target="_blank">Verify Certification</a>
                </div>
            </div>
        </div>
    </div>
    
    <h3 class="pr_h_h3">Back End Projects for Free Code Camp 
        <hr class="pr_h_hr" />
        <span class="pr_h_desc">Created with main focus on Node.js / Express / MongoDB / Mongoose.</span>
    </h3>
    <div id="fccbe_projects">
        <div class="project_div cert_div">
            <div class="front">
                <img src="/images/certificates/BackEnd.jpg" class="project_img" />
            </div>
            <div class="back">
                <img src="/images/certificates/BackEnd.jpg" class="project_img" />
                <div class="project_img_back cert_back">
                    <a href="https://www.freecodecamp.org/finaltriumph/back-end-certification" class="back_link cert_back_link" target="_blank">Verify Certification</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/public/js/flip.js"></script>
<script type="text/javascript" src="/public/js/portfolio.js"></script>

<?php

require_once('./views/inc/footer.php')

?>