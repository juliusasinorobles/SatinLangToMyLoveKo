<?php

class MY_Controller extends CI_Controller
{
    public $data = array();
    public $pages = array();

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Manila');

        $this->load->helper(array(
            'html_crypt',
            'html_templates',
            'url',
            'html'));

        $this->load->library(array(
            'parser',
            'pagination',
            'session',
            'image_generator'
        ));

        $this->pages = array(
            "about" => array(
                    "class" => "about-header",
                    "title" => "About",
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
                    "title" => "Register",
                    "description" => "Join now and have a second chance to stardom!"
                )
        );

    }

    public function template($template = '')
    {
        $this->data['cpyear'] = date("Y");
        $this->data['base_url'] = base_url();
        $this->data['default_page'] = base_url();
        $this->data['body'] = $this->parser->parse($template, $this->data, TRUE);

        $this->parser->parse('masterpage', $this->data);
    }

    public function validate_code(){
        $this->image_generator->generate();
    }

    public function generate_code()
    {
        echo encrypt($this->image_generator->populate());
    }

    public function __destruct()
    {
        
    }

}
?>
