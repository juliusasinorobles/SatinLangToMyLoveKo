<?php

class MY_Controller extends CI_Controller
{
    public $data = array();
    public $pages = array();
    public $active_page = array();
    public $output_results = array();

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array(
            'html_crypt',
            'html_templates',
            'url',
            'html'));

        $this->load->library(array(
            'parser',
            'pagination',
            'session',
            'image_generator',
            'validation',
            'session'
        ));

        $this->active_page = array(
            "home" => "",
            "about" => "",
            "faq" => "",
            "privacypolicy" => "",
            "termsandconditions" => "",
            "contactus" => "",
            "register" => "",
            "profile" => "",
            "profile_edit" => "",
            "video" => "",
            "signin" => ""
        );

        $this->pages = array(
            "about" => array(
                    "class" => "about-header",
                    "title" => "About Underdog Idols",
                    "description" => "Where it’s never too late to get your second chance at stardom!"
                ),
            "faq" => array(
                    "class" => "faq-header",
                    "title" => "Frequently Asked Questions",
                    "description" => "Sometimes people ask us things. Here's the most common ones."
                ),
            "privacypolicy" => array(
                    "class" => "privacypolicy-header",
                    "title" => "Privacy Policy",
                    "description" => "How we use and protect any information that you give us when you use this website."
                ),
            "termsandconditions" => array(
                    "class" => "termsandconditions-header",
                    "title" => "Terms &amp; Conditions",
                    "description" => "Please carefully read our terms and conditions before using this site."
                ),
            "contactus" => array(
                    "class" => "contactus-header",
                    "title" => "Contact Us",
                    "description" => "Send us an email. We'll be happy to talk to you."
                ),
            "register" => array(
                    "class" => "register-header",
                    "title" => "Register For Pre-Launch",
                    "description" => "Join now and have a second chance to stardom!"
                ),
            "profile" => array(
                    "class" => "profile-header",
                    "title" => "",
                    "description" => ""
                ),
            "profile_edit" => array(
                    "class" => "profile-header",
                    "title" => "Profile Edit",
                    "description" => "Update information about yourself so viewers will know you better."
                ),
            "video" => array(
                    "class" => "video-header",
                    "title" => "Promotional Video",
                    "description" => "Watch our promotional clip to see what's in stored."
                ),
            "signin" => array(
                    "class" => "signin-header",
                    "title" => "Sign In",
                    "description" => "Your second chance to stardom! This is the time to make it happen!"
                )
        );

    }

    public function template($template = '')
    {
        $this->data['cpyear'] = date("Y");
        $this->data['base_url'] = base_url();
        $this->data['active_page'] = $this->active_page;
        $this->data['default_page'] = base_url();
        $this->data['site_header'] = $this->get_site_header();
        $this->data['body'] = $this->parser->parse($template, $this->data, TRUE);

        $this->parser->parse('masterpage', $this->data);
    }

    private function get_site_header(){
        if($this->session->userdata('id'))
        {
            return $this->parser->parse("templates/header_login", $this->active_page, TRUE);
        }
        else
        {
            return $this->parser->parse("templates/header", $this->active_page, TRUE);
        }
    }

    public function validate_code(){
        $this->image_generator->generate();
    }

    public function generate_code()
    {
        $encrypted_code = encrypt($this->image_generator->populate());
        $this->session->set_userdata('captcha', $encrypted_code);
        echo $encrypted_code;
    }

    public function mail($to, $subject, $message)
    {
        //send mail...
    }

    public function show_output_results()
    {
        echo json_encode($this->output_results, TRUE);
    }

    public function debug($val){
        echo "<pre>";
        var_dump($val);
        echo "</pre>";
    }

    public function __destruct()
    {
        
    }

}
?>
