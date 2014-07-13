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
            'curl',
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

        $this->redirect_sessions();

    }

    public function template($template = '')
    {
        $this->data['cpyear'] = date("Y");
        $this->data['base_url'] = base_url();
        $this->data['active_page'] = $this->active_page;
        $this->data['default_page'] = base_url();
        $this->data['site_header'] = $this->get_site_header();
        $this->data['site_footer'] = $this->get_site_footer();
        $this->data['body'] = $this->parser->parse($template, $this->data, TRUE);

        $this->parser->parse('masterpage', $this->data);
    }

    private function get_site_header()
    {
        $this->active_page['base_url'] = base_url();
        if($this->session->userdata('id'))
        {
            return $this->parser->parse("templates/header_login", $this->active_page, TRUE);
        }
        else
        {
            return $this->parser->parse("templates/header", $this->active_page, TRUE);
        }
    }

    private function get_site_footer()
    {
        if($this->session->userdata('id'))
        {
            return $this->parser->parse("templates/footer_login", $this->active_page, TRUE);
        }
        else
        {
            return $this->parser->parse("templates/footer", $this->active_page, TRUE);
        }
    }

    public function payment($link)
    {
        if($this->session->userdata('id'))
        {
            $this->load->model('video');
            $this->load->model('payment');

            $video = array();
            $video['contestant_id'] = $this->session->userdata('id');
            $video['link'] = $link;
            $video['video_title'] = $this->get_video_title($link);
            $video['embeded_link'] = str_replace('watch?v=', 'v/', $link);
            $video['thumbnail_link'] = str_replace('www', 'img', $video['embeded_link']);
            $video['thumbnail_link'] = str_replace('v/', 'vi/', $video['embeded_link'])."/0.jpg";
            //$video['genre'] = "";

            if($video['id'] = $this->video->insert($video))
            {
                $trans_id = $this->generate_trans_id($video);
                return $this->paypal_prelaunch($trans_id);
            }

        }
    }

    private function generate_trans_id($video)
    {
        $data = $this->video->getByIdInactive($video['id']);
        if(count($data) != 0)
        {
            $video = $data[0];
            $trans_id = "UIVREG".date("YmdHis")."c".$video->contestant_id."v".$video->id;
            return $trans_id;
        }
        return "";
    }

    private function paypal_prelaunch($trans_id)
    {
        $invoice = '&invoice='.$trans_id;
        $paypal = 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KNSFYMK69J5M2'.$invoice;
        return $paypal;
    }

    private function get_video_title($url)
    {
        $tmp = explode('watch?v=', $url);
        $video_id = $tmp[1];
        $api = 'https://gdata.youtube.com/feeds/api/videos/'.$video_id.'?v=2';
        
        $this->curl->create($api);
        $this->curl->option("SSL_VERIFYPEER",0);
        $this->curl->option("SSL_VERIFYHOST",2);
        $result = $this->curl->execute();

        $result = simplexml_load_string($result);   
        $result = json_decode(json_encode($result));

        $title = $result->title;
        
        return $title;
    }

    public function validate_code()
    {
        $this->image_generator->generate();
    }

    public function generate_code()
    {
        $encrypted_code = encrypt($this->image_generator->populate());
        $this->session->set_userdata('captcha', $encrypted_code);
        echo $encrypted_code;
    }

    private function redirect_sessions()
    {       
        $redirect_on = array(
            "home",
            "register",
            "signin"
            ); 

        if($this->session->userdata('id'))
        {
            if(in_array($this->uri->segment(1), $redirect_on) || $this->uri->segment(1) == false)
            {
                header("Location:".base_url()."profile");
                exit;   
            }
        }
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
