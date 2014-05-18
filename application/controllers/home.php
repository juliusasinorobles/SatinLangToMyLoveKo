<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['title'] = "Home | Underdog Idols";
        $this->active_page['home'] = "active";
		$this->template('home');
	}

    public function __destruct()
    {
        parent::__destruct();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */