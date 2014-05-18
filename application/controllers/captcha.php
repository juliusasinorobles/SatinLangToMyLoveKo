<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captcha extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //To do...
    }

    public function set_code(){    
        $this->validate_code();
    }

    public function get_code(){    
        $this->generate_code();
    }

    public function __destruct()
    {
        parent::__destruct();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */