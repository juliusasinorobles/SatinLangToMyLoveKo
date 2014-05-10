<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
 
        <base href="{base_url}" />       
        <title>{title}</title>
        <meta name="description" content="" />
        <meta name="author" content="Underdog Idols" />

        <meta name="viewport" content="width=device-width; initial-scale=1.0" />

        <script type="text/javascript">
            var default_page = '{default_page}';
            var webroot = '{base_url}';
        </script>
        
        <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
        <link rel="shortcut icon" href="resources/images/logo.png" />
        
        <link rel="stylesheet" href="resources/css/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="resources/css/foundation.css" />
        <link rel="stylesheet" href="resources/css/style.css">

        <script src="resources/js/jquery.js"></script>
        <script src="resources/js/fastclick.js"></script>
        <script src="resources/js/modernizr.js"></script>
        
        <script src="resources/js/foundation/foundation.js"></script>
        <script src="resources/js/foundation/foundation.alert.js"></script>
        <script src="resources/js/foundation/foundation.dropdown.js"></script>
        <script src="resources/js/foundation/foundation.tab.js"></script>
        <script src="resources/js/foundation/foundation.magellan.js"></script>

        <script src="resources/js/js.functions.js"></script>
    </head>

    <body>

    <div class="site-header">
        <div class="site-nav">
            <div class="row">
                <div class="medium-6 large-6 columns">
                    <ul class="master-menu">
                        <li class="active"><a href="home">Home</a></li>
                        <li><a href="about">About UI</a></li>
                        <li><a href="video">Video</a></li>
                        <li><a href="contactus">Contact Us</a></li>
                    </ul>
                </div>
                <div class="medium-6 large-6 columns">
                    <ul class="master-menu">
                        <li><a href="faq">FAQ</a></li>
                        <li><a href="privacypolicy">Privacy</a></li>
                        <li><a href="register">Register</a></li>
                        <li><a href="signin">Sign In</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="medium-12 large-12 columns" style="text-align: center;">
                <h1 style="display: inline-block;
					margin-left: auto;
					margin-right: auto;
					margin-top: -60px;">
                    <a href="{base_url}"><img src="resources/images/logo.png" style="height: 160px; margin-top: 5px;"/></a>
                </h1>
            </div>
        </div>
    </div>

<!--     <nav class="top-bar">
            <ul class="title-area">
                <li class="name">
                    <h1><a href="{base_url}"><img src="resources/images/test2.png" style="height: 130px; margin-top: 10px;"/></a></h1>
                </li>
                <li class="toggle-topbar menu-icon">
                    <a href="#"></a>
                </li>
            </ul>
            <section class="top-bar-section">
                <!-- Right Nav Section -->
                <!-- <ul class="right">
                <li><a href="home">Home</a></li>
                <li><a href="about">Video</a></li>
                <li><a href="about">About</a></li>
                <li><a href="faq">FAQ</a></li>
                <li><a href="register">Register</a></li>
                <li><a href="privacypolicy">Privacy Policy</a></li>
                <li><a href="termsandconditions ">Terms &amp; Conditions</a></li>
                <li><a href="contactus">Contact Us</a></li>
                <li class="has-form"><a href="#" class="button">Sign In</a></li>
            </ul>
            </section>
        </nav> -->

    {body}

    <div class="site-footer">
        <div class="row">
            <div class="medium-9 large-9 columns">
                <div class="row">
                    <div class="medium-6 large-6 columns">
                        <ul class="site-footer-links">
                            <li><a href="home">Home</a></li>
                            <li><a href="privacypolicy">Privacy Policy</a></li>
                            <li><a href="faq">FAQ</a></li>
                            <li><a href="contactus">Contact Us</a></li>
                        </ul><br/>
                    </div>
                    <div class="medium-6 large-6 columns">
                        <ul class="site-footer-links">
                            <li><a href="about">About</a></li>
                            <li><a href="termsandconditions">Terms &amp; Conditions</a></li>
                            <li><a href="register">Register</a></li>
                            <li><a href="contactus">Sign In</a></li>
                        </ul><br/>
                    </div>

                </div>
                <p class="copyright">&copy; Copyright {cpyear} - Underdog Idols</p>
            </div>
            <div class="medium-3 large-3 columns">
                <ul class="site-footer-follow-us">
                    <li><a href="#" class="mail"> </a></li>
                    <li><a href="#" class="facebook"> </a></li>
                    <li><a href="#" class="twitter"> </a></li>
                    <li class="linkedin"><a href="#" class="linkedin"> </a></li>
                </ul>
            </div>
        </div>
    </div>
    
    </body>
</html>
