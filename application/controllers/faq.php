<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq extends MY_Controller {

    public $action_message = array(
        'success_insert'=>"Thank you! Your question has been sent",
        'failed_insert'=>"Unable to process your request",
        'success_update'=>"Record successfully updated",
        'failed_update'=>"Unable to process your request",
        'success_delete'=>"Record successfully deleted",
        'failed_delete'=>"Unable to process your request",
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function _remap()
    {
        $this->index();
    }

    public function index()
    {
        $this->load->model('faqs');  

        if($this->input->post('submit')) 
        {
            $this->send();
        }
        else 
        { 
            $this->data['title'] = "FAQ | Underdog Idols";
            $this->data['content_header'] = content_page_header($this->pages['faq']);
            $this->template('faq'); 
        }
    }

    public function send()
    {
        if($this->check_inputs())
        {
            $faq = array();
            $faq['name'] = $this->input->post('name');
            $faq['email'] = $this->input->post('email');
            $faq['question'] = $this->input->post('question');            
            $faq['ipaddress'] = $this->input->ip_address();
            
            if( $faq['id'] = $this->faqs->insert($faq) )
            {
                //mail($to, $subject, $message);
                $this->output_results['success'] = TRUE;
                $this->output_results['message'] = $this->action_message['success_insert'];
            }else{               
                $this->output_results['message'] = $this->action_message['success_insert'];
            }
        }

        $this->show_output_results();
    }

    public function check_inputs()
    {
        $this->validation->field_name('Submit')
        ->field_value($this->input->post('submit'))
        ->is_equal('faq')
        ->required();

        $this->validation->field_name('Name')
        ->field_value($this->input->post('name'))
        ->no_special_chars()
        ->char_limit(25)
        ->required();

        $this->validation->field_name('Email')
        ->field_value($this->input->post('email'))
        ->char_limit(50)
        ->is_email()
        ->required();

        $this->validation->field_name('Question')
        ->field_value($this->input->post('question'))
        ->no_special_chars()
        ->char_limit(255)
        ->required();

        $this->validation->field_name('Code')
        ->field_value($this->input->post('code'))
        ->is_equal(decrypt($this->session->userdata('captcha')))
        ->required();

        if (!$this->validation->err) 
        {    
            return true;
        }
        else 
        {
            $this->output_results['message'] = $this->validation->err;
            return false;
        }        
    }

    public function __destruct()
    {
        parent::__destruct();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */