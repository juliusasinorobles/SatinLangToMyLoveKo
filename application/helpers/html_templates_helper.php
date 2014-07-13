<?php

function content_page_header($page){
    $html = '<header class="'. $page['class'] .'">
                <div class="row">
                    <div class="large-12 columns">
                        <h1 class="page-title">'. $page['title'] .'</h1>
                        <h4 class="page-sub-title">'. $page['description'] .'</h4>
                    </div>
                </div>
            </header>';

    return $html;
}

function content_profile_header($page, $picture, $full_name, $about){
	$html = '<header class="'. $page['class'] .'">
                <div class="row">
                    <div class="large-4 columns">
                        <div class="profile-pic">
                            <img src="'. ( empty($picture) ? 'resources/images/default-profile-pic.jpg' : $picture ) .'" />
                        </div>       	
                    </div>
                    <div class="large-8 columns">
                        <h1 class="page-title">'. $full_name .'</h1>
                    	<h4 class="page-sub-title">"'. ( empty($about) ? '<i>Introduce yourself to the viewers. Write something about yourself. </i>' : nl2br($about) ) .'"</h4>
                    	<div>
                    		<a class="button small" href="profile/edit">Edit Profile</a>
                    	</div>
                    </div>
                </div>
            </header>';
	return $html;
}

function content_profile_header_public($page, $picture, $full_name, $about){
    $html = '<header class="'. $page['class'] .'">
                <div class="row">
                    <div class="large-4 columns">
                        <div class="profile-pic">
                            <img src="'. ( empty($picture) ? 'resources/images/default-profile-pic.jpg' : $picture ) .'" />
                        </div>          
                    </div>
                    <div class="large-8 columns">
                        <h1 class="page-title">'. $full_name .'</h1>
                        <h4 class="page-sub-title">"'. ( empty($about) ? '<i>Meet your new star!</i>' : nl2br($about) ) .'"</h4>
                    </div>
                </div>
            </header>';
    return $html;
}

?>