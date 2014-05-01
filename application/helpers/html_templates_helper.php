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

function content_profile_header($page){
	$html = '<header class="'. $page['class'] .'">
                <div class="row">
                    <div class="large-4 columns">
                        <div style="width: 250px; height: 250px; overflow: hidden; border-radius: 50%; box-shadow: -3px 2px 1px #2d0e40;">
                            <img src="resources/images/sample.jpg" style="width: 100%;  background: #333; "/>
                        </div>                    	
                    </div>
                    <div class="large-8 columns">
                        <h1 class="page-title">john doe</h1>
                    	<h4 class="page-sub-title">" I\'m still alive but I\'m barely breathing<br/>Just prayin\' to a God that I don\'t believe in "</h4>
                    	<div>
                    		<a class="button small">Edit Profile</a>
                    	</div>
                    </div>
                </div>
            </header>';
	return $html;
}

?>