<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends MY_Controller {

    public $action_message = array(
        'failed_auth'=>"Invalid login credentials. Please check you entries.",
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
            $this->authenticate();
        }
        else 
        { 
            $this->data['title'] = "Sign In | Underdog Idols";
            $this->active_page['signin'] = "active";
            $this->data['content_header'] = content_page_header($this->pages['signin']);
            $this->template('signin');
        }
	}

    public function authenticate()
    {
        if($this->check_inputs())
        {
            $contestant = $this->contestant->getByUsernamePassword($this->input->post('email'), $this->input->post('password'));
            
            if(count($contestant))
            {
                $this->session->set_userdata(json_decode(json_encode($contestant[0])));
                $this->output_results['message'] = "Login accepted...";
                $this->output_results['success'] = TRUE;
                $this->output_results['redirect'] = 'home/';
            }
            else
            {
                $this->output_results['message'] = $this->action_message['failed_auth'];
            }
        }

        $this->show_output_results();
    }

    public function check_inputs()
    {
        $this->validation->field_name('Submit')
        ->field_value($this->input->post('submit'))
        ->is_equal('signin')
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