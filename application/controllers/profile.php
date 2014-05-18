<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

	public $action_message = array(
		'success_update' => "Record successfully updated",
		'failed_update' => "Unable to process your request"
	);
	
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
        $this->active_page['profile'] = "active"; 
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

	public function save()
	{
		if($this->check_inputs())
		{		
			$contestant = array();
		
			if($this->input->post('password') != "")
			{
				if($this->check_password_inputs())
				{
					$contestant['password'] = $this->input->post('password');
				}
			}
			
			$contestant['full_name'] = $this->input->post('full_name');
			$contestant['email'] = $this->input->post('email');
			$contestant['gender'] = $this->input->post('gender');
			$contestant['birthdate'] = $this->input->post('birthdate');
			$contestant['about'] = $this->input->post('about');
			
			
			if($this->contestant->update($this->session->userdata('id'),$contestant))
			{	
				$this->output_results['message'] = $this->action_message['success_update'];
			}
			else {
				$this->output_results['message'] = $this->action_message['failed_update'];
			}
		}

		$this->show_output_results();	
		
	}
	
	public function upload()
	{
		$path = "uploads/profilepic/";
		
		$allowedExts = array("jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["input-file"]["name"]);
		$extension = end($temp);
		
		if ((($_FILES["input-file"]["type"] == "image/jpeg")
		|| ($_FILES["input-file"]["type"] == "image/jpg")
		|| ($_FILES["input-file"]["type"] == "image/png"))
		&& ($_FILES["input-file"]["size"] < 200000)) 
		{
			
		  if ($_FILES["input-file"]["error"] > 0) 
		  {
		     $_FILES["input-file"]["error"];
		  } 
		  else 
		  {
		   /*
			if (file_exists($path . $_FILES["input-file"]["name"])) 
					   {
						 echo $_FILES["input-file"]["name"] . " already exists. ";
					   } 
					   else 
					   {*/
		   
		    	if(move_uploaded_file($_FILES["input-file"]["tmp_name"], $path . $_FILES["input-file"]["name"]) !== FALSE)
			    {
	  				//echo "success";
	  			}
	  			else
	  			{
	  				//echo "failed";
	  			}
		    }
		} 
		else 
		{
		  //file invalid
		}
		
		$this->output_results['url'] = $path . $_FILES["input-file"]["name"];
		
		$this->show_output_results();
	}
	
	public function check_inputs()
	{
		$this->load->model('contestant');
		
		$this->validation->field_name('Submit')
		->field_value($this->input->post('submit'))
		->is_equal('profiledit')
		->required();
				
		$this->validation->field_name('Message')
		->field_value($this->input->post('about'))
		->char_limit(255)
		->required();
		
		$this->validation->field_name('Full Name')
		->field_value($this->input->post('full_name'))
		->no_special_chars()
		->char_limit(50)
		->required();
		
		$this->validation->field_name('Email')
        ->field_value($this->input->post('email'))
        ->char_limit(50)
        ->is_email()
        ->is_used($this->contestant->getByEmailExcept($this->session->userdata('id'), @$this->input->post('email')));

        $this->validation->field_name('Password')
        ->field_value($this->input->post('password'))
        ->no_special_chars()
        ->char_min_max(6, 25)
        ->char_limit(25)
        ->is_equal($this->input->post('repassword'));
		
		$this->validation->field_name('Gender')
		->field_value($this->input->post('gender'))
		->required();
		
		$this->validation->field_name('Birthdate')
		->field_value($this->input->post('birthdate'))
		->required();
		
		if(!$this->validation->err)
		{
			return true;
		}
		else 
		{			
			$this->output_results['message'] = 	$this->validation->err;
			return false;	
		}
	}

	public function check_password_inputs()
	{
		$this->validation->field_name('Password')
        ->field_value($this->input->post('password'))
        ->no_special_chars()
        ->char_min_max(6, 25)
        ->char_limit(25)
        ->is_equal($this->input->post('repassword'))
        ->required();
		
		if(!$this->validation->err)
		{
			return true;
		}
		else 
		{			
			$this->output_results['message'] = 	$this->validation->err;
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