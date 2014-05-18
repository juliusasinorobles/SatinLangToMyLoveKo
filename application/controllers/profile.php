<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['title'] = "Profile | Underdog Idols";       
        $this->active_page['profile'] = "active"; 
        $this->data['content_header'] = content_profile_header($this->pages['profile'], $this->session->userdata('picture'), $this->session->userdata('full_name'), $this->session->userdata('about'));
        $this->template('profile/profile');
	}

    public function edit()
    {
        $this->load->model('contestant');  

        $contestant = $this->contestant->getById($this->session->userdata('id'));
        $this->session->set_userdata($contestant[0]);

        $this->data['title'] = "Profile Edit | Underdog Idols";        
        $this->data['content_header'] = content_page_header($this->pages['profile_edit']);
        $this->data['contestant'] = $contestant;
        
        $this->data['contestant_male'] = "";
        $this->data['contestant_female'] = "";
        
        if($contestant[0]->gender == "male")
        {
            $this->data['contestant_male'] = "selected";
        }
        if($contestant[0]->gender == "female")
        {
            $this->data['contestant_female'] = "selected";
        }

        $this->template('profile/profile_edit');
    }

    public function __destruct()
    {
        parent::__destruct();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */