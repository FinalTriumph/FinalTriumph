/* global $ */

$(document).ready(function() {
    
    var projectId = window.location.href.split('?')[1].substring(3);
    
    $.getJSON(window.location.origin + '/get-single-project-api?id='+projectId, function(data) {
        console.log(data);
        
        $("#single_project_left").append("<h3>"+data.project.title+"</h3><p class='s_pr_desc'>"+data.project.description+"</p><div id='lang_icons'></div>");
        $("#single_project_right").append("<img src='"+data.project.image+"' class='single_project_img' /><br /><a href='"+data.project.link+"' class='s_pr_link' target='_blank'>View Project</a>");
        
        var lang = data.project.languages.split(' ');
        
        for (var i = 0; i < lang.length; i++) {
            $('#lang_icons').append('<img src="/images/lang/'+lang[i]+'.png" class="s_pr_lang_icon" />');
        }
        
        var otherHTML;
        
        switch(data.project.category) {
            case 'new': 
                otherHTML = 'Other Newest Projects<hr class="pr_h_hr" /><span class="pr_h_desc">Created with main focus on PHP / MySQL / Laravel.</span>';
                break;
            case 'fccfe':
                otherHTML = 'Other Front End Projects for Free Code Camp<hr class="pr_h_hr" /><span class="pr_h_desc">Created with main focus on HTML / CSS / JavaScript / jQuery.</span>';
                break;
            case 'fccdv':
                otherHTML = 'Other Data Visualization Projects for Free Code Camp<hr class="pr_h_hr" /><span class="pr_h_desc">Created with main focus on D3.js / React.js.</span>';
                break;
            case 'fccbe':
                otherHTML = 'Other Back End Projects for Free Code Camp<hr class="pr_h_hr" /><span class="pr_h_desc">Created with main focus on Node.js / Express / MongoDB / Mongoose.</span>';
                break;
        }
        
        $("#s_pr_h3").html(otherHTML);
        
        for (var i = 0; i < data.other.length; i++) {
            if (data.other[i].id !== projectId) {
                $("#s_pr_other_projects").append('<div class="project_div"><div class="front"><img src="'+data.other[i]['image']+'" class="project_img" /></div> <div class="back"><img src="'+data.other[i]['image']+'" class="project_img" /><div class="project_img_back"><h3>'+data.other[i]['title']+'</h3><a href="/project?id='+data.other[i]['id']+'" class="back_link">Project Description</a><a href="'+data.other[i]['link']+'" class="back_link" target="_blank">View Project</a></div></div></div>');
            }
            $(".project_div").flip({ trigger: "hover", 	reverse: true, });
        }
        
        $(document).imagesLoaded( function() {
            $("#all_projects_div").css('opacity', '1');
            $('#spinner_wrapper, .spinner').hide();
        });
    });
});