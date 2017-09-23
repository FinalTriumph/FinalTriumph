<?php

$title = "About";

require_once('./views/inc/header.php')

?>

<div id="spinner_wrapper">
    <div class="spinner"></div>
</div>

<div id="about_content">
    <div id="about_top">
        <img src="/images/photo_ab.jpg" id="about_photo" />
        <div id="about_top_intro">
            <p1>My name is Kaspars Andžāns. I'm 28 years old, from Latvia.</p1>
            <p>After finishing school, in 2010, I have tried different professional areas, and my goal has always been to find something that I could really enjoy doing and to become good at it.</p>
            <p>At some point, when everything else had not gone as expected, I realized that, given my skill set, web development is the only option left that makes sense for me to focus on. And since I joined <a href="https://www.freecodecamp.org/" target="_blank">Free Code Camp</a>, on October 10, 2016, and started to learn coding, I am sure that this is exactly what I was looking for. That's why I chose pseudonym 'FinalTriumph'.</p>
            <p>Now I'm still learning, having fun with some practice projects and looking for opportunities, where I could put my already learned skills to work and to keep learning.</p>
        </div>
        <p>And, besides everything else, for almost 10 years I have deep interest about how the universe works, what exactly is universe, how human brain works, how human body functions, what is consciousness, why are we here, where exactly is here, what it's all about and other topics of this kind, from all possible angles.</p>
    </div>
    
    <h3 class="switch_dir_h3">Timeline with brief descriptions of what I have been doing from 2010. 
        <hr class="sw_d_hr" />
        <span id="sw_d_btn">Switch Timeline Direction <span id="sw_d_sp">&#8693;</span></span>
        <span id="exp_all_btn">Expand All <span id="exp_all_sp">&#10095;</span></span>
        <span id="cl_all_btn" class="cl_exp_btn_inact">Close All <span id="cl_all_sp">&#10094;</span></span>
    </h3>
    
    <div id="events_div"></div>
    <div id="events_div_opp"></div>
    
    <div id="ab_bottom_cont_div">
        <span id="sw_d_btn2">Switch Timeline Direction <span id="sw_d_sp2">&#8693;</span></span>
        <span id="exp_all_btn2">Expand All <span id="exp_all_sp2">&#10095;</span></span>
        <span id="cl_all_btn2" class="cl_exp_btn_inact">Close All <span id="cl_all_sp2">&#10094;</span></span>
    </div>
</div>

<script type="text/javascript" src="/public/js/about.js"></script>
    
<?php

require_once('./views/inc/footer.php')

?>