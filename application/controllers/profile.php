<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

	public $action_message = array(
		'success_video' => "Video link successfully saved",
		'success_update' => "Record successfully updated",
		'failed_update' => "Unable to process your request"
	);
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('contestant');  
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
        	if($this->input->post('submit') == "profiledit")
        	{	
            	$this->save();
        	}
        	else if($this->input->post('submit') == "upload-video")
        	{
	            $this->submit_video();
        	}
        }
        else if($this->uri->segment(2) == "edit")
        {
        	$this->edit();
        }
        else 
        { 
        
	        $this->data['title'] = "Profile | Underdog Idols";       
	        $this->active_page['profile'] = "active"; 

	        $contestant = $this->contestant->getById($this->session->userdata('id'));
	        $this->session->set_userdata($contestant[0]);

	        $this->data['content_header'] = content_profile_header($this->pages['profile'], $this->session->userdata('picture'), $this->session->userdata('full_name'), $this->session->userdata('about'));
	        $this->data['videos'] = $this->videos();
	        $this->template('profile/profile');
    
        }
	}

	private function videos(){
		
        $this->load->model('video');  
        $videos = $this->video->getByContestantId($this->session->userdata('id'));
		if(count($videos))
		{
			$temp_data['videos'] = $videos;
            return $this->parser->parse("profile/profile_videos", $temp_data, TRUE);
		}
		else
		{
			return "<p>No videos yet. Submit your videos now!</p>";
		}
	}

    public function edit()
    {     
        $this->active_page['profile'] = "active";         

        $contestant = $this->contestant->getById($this->session->userdata('id'));
        $this->session->set_userdata($contestant[0]);

        $this->data['title'] = "Profile Edit | Underdog Idols";        
        $this->data['content_header'] = content_page_header($this->pages['profile_edit']);
        $this->data['contestant'] = $contestant;
        $this->data['contestant'][0]->picture = ( empty($this->data['contestant'][0]->picture) ? 'resources/images/default-profile-pic.jpg' : $this->data['contestant'][0]->picture );

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
        $this->load->model('contestant');  
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
				$this->output_results['message'] = "System error, kindly check parameter.";
			} 
			else 
			{
				$info = new SplFileInfo($_FILES["input-file"]["name"]);
				$ui_filename = "profile".$this->session->userdata('id')."image.".$info->getExtension();
				$ui_fullfilepath = $path.$ui_filename;

				if(move_uploaded_file($_FILES["input-file"]["tmp_name"], $ui_fullfilepath) !== FALSE)
				{
					$contestant = array("picture"=>$ui_fullfilepath);
					if($this->contestant->update($this->session->userdata('id'), $contestant))
					{
						$contestant = $this->contestant->getById($this->session->userdata('id'));
						$this->output_results['url'] = $ui_fullfilepath;
						$this->session->set_userdata($contestant[0]);					
					
						$this->output_results['success'] = TRUE;
						$this->output_results['message'] = "Profile picture updated.";
					}
					else
					{
						$this->output_results['message'] = "Unable to process request right now. Please try again later.";
						
					}

				}
				else
				{
					$this->output_results['message'] = "Unable to upload image.";
				}
			}
		} 
		else 
		{	
			$this->output_results['message'] = "Invalid file.";	
		}
		
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

	private function submit_video()
	{
		if($this->check_link())
		{

	        $this->output_results['success'] = TRUE;
	        $this->output_results['message'] = $this->action_message['success_video'];
            $this->output_results['redirect'] = $this->payment($this->input->post('link'));

		}

        $this->show_output_results();
	}

	private function check_link()
	{

        $this->validation->field_name('Submit')
        ->field_value($this->input->post('submit'))
        ->is_equal('upload-video')
        ->required();

        $this->validation->field_name('Link')
        ->field_value($this->input->post('link'))
        ->is_url()
        ->is_youtube_url()
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