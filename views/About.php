<?php

$title = "About";

require_once('./views/inc/header.php')

?>

<div id="about_top">
    <img src="/images/photo_ab.jpg" id="about_photo" />
    <div id="about_top_intro">
        <p1>My name is Kaspars Andžāns. I'm 28 years old, from Latvia.</p1>
        <p>After finishing school in 2010, I have tried different professional areas, and my goal has always been to find something that I could really enjoy doing and to become good at it. So far I have managed to collect a lot of data about myself, life in general, existence itself, my role in it and what is it that I really value and want to do in my life.</p>
        <p>At some point, when everything else had not gone as expected, I realized that, given my skill set, web development is the only option left that makes sense for me to focus on. And since I joined Free Code Camp, on October 10, 2016, and started to learn coding, I am absolutely sure, that this is exactly what I was looking for. This is my "final triumph".</p>
        <p>Now I'm still learning, having fun with some practice projects and looking for opportunities, where I could put my already learned skills to work and to keep learning.</p>
    </div>
    <p>And besides everything else, for almost 10 years I have deep interest about how universe works, what exactly is universe, what is consciousness, how human brain works, how human body functions, why are we here, what are we, where exactly is here and these kind of topics from scientific, religious, philosophical, intuitive and pure common sense point of view.</p>
</div>

<h3 class="switch_dir_h3">Timeline with brief descriptions of what I have been doing from 2010. 
    <hr class="sw_d_hr" />
    <span id="sw_d_btn">Switch Timeline Direction <span id="sw_d_sp">&#8693;</span></span>
    <span id="exp_all_btn">Expand All <span id="exp_all_sp">&#10095;</span></span>
    <span id="cl_all_btn" class="cl_exp_btn_inact">Close All <span id="cl_all_sp">&#10094;</span></span>
</h3>

<div id="events_div"></div>
<div id="events_div_opp"></div>

<script type="text/javascript" src="/public/js/about.js"></script>
    
<?php

require_once('./views/inc/footer.php')

?>