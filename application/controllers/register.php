<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_Controller {

    public $action_message = array(
        'success_insert'=>"Thank you! You have successfully registered please wait while page redirects.",
        'failed_insert'=>"Unable to process your request",
        'success_update'=>"Record successfully updated",
        'failed_update'=>"Unable to process your request",
        'success_delete'=>"Record successfully deleted",
        'failed_delete'=>"Unable to process your request",
        'failed_spam'=>"You're only allowed to send one entry in five hours. Please try again later."
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
        $this->load->model('contestant');  

        if($this->input->post('submit')) 
        {
            $this->registration();
        }
        else 
        { 
            $this->data['link_on_register'] = "";
            if($this->session->userdata('link'))
            {
                $this->data['link'] = $this->session->userdata('link');
                $this->data['link_on_register'] = $this->parser->parse('linkonregister', $this->data, TRUE);
                $this->session->unset_userdata('link');
            } 

            $this->data['title'] = "Register | Underdog Idols";
            $this->active_page['register'] = "active";
            $this->data['content_header'] = content_page_header($this->pages['register']);
            $this->template('register');
        }
	}

    public function registration()
    {
        if($this->check_inputs())
        {
            if($this->input->post('submit') == 'home-register')
            {
                $this->session->set_userdata('link', $this->input->post('link'));
                $this->output_results['success'] = TRUE;
                $this->output_results['redirect'] = "register/";    
            }
            else
            {
                $contestant = array();
                $contestant['first_name'] = $this->input->post('full_name');
                $contestant['password'] = $this->input->post('password');
                $contestant['email'] = $this->input->post('email');

                if($contestant['id'] = $this->contestant->insert($contestant))
                {
                    if($this->input->post('link'))
                    {
                        //redirect to payment
                        //$this->output_results['redirect'] = "payment/";
                    }

                    //mail($to, $subject, $message);
                    $this->output_results['success'] = TRUE;
                    $this->output_results['redirect'] = "profile/";
                    $this->output_results['message'] = $this->action_message['success_insert'];
                }else{               
                    $this->output_results['message'] = $this->action_message['success_insert'];
                }

            }
        }

        $this->show_output_results();
    }

    public function check_inputs()
    {            
        $this->validation->field_name('Submit')
        ->field_value($this->input->post('submit'))
        ->is_equal('home-register')
        ->required();

        if(!$this->validation->err)
        {
            $this->validation->field_name('Link')
            ->field_value($this->input->post('link'))
            ->is_url()
            ->required();
        }
        else
        {
            $this->validation->err = array();

            $this->validation->field_name('Submit')
            ->field_value($this->input->post('submit'))
            ->is_equal('main-register')
            ->required();            

            if(!$this->validation->err)
            {
                if($this->input->post('link'))
                {
                    $this->validation->field_name('Link')
                    ->field_value($this->input->post('link'))
                    ->is_url()
                    ->required();                    
                }

                $this->validation->field_name('Full Name')
                ->field_value($this->input->post('full_name'))
                ->no_special_chars()
                ->char_limit(25)
                ->required();

                $this->validation->field_name('Email')
                ->field_value($this->input->post('email'))
                ->char_limit(50)
                ->is_email()
                ->is_used($this->contestant->getByEmail(@$this->input->post('email')))
                ->required();

                $this->validation->field_name('Password')
                ->field_value($this->input->post('password'))
                ->no_special_chars()
                ->char_min_max(6, 25)
                ->char_limit(25)
                ->is_equal($this->input->post('repassword'))
                ->required();

                $this->validation->field_name('Code')
                ->field_value($this->input->post('code'))
                ->is_equal(decrypt($this->session->userdata('captcha')))
                ->required();

                $this->validation->field_name('Agreement on Terms and Policy')
                ->field_value($this->input->post('agree'))
                ->required();
            }        
        }

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