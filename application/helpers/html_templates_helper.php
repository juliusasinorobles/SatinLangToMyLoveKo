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

?>