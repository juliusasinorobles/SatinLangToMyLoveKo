<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signout extends MY_Controller {

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
        $this->session->sess_destroy();
        header("location:home");
	}

    public function __destruct()
    {
        parent::__destruct();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */