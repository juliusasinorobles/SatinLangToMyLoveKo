<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Termsandconditions extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['title'] = "Terms & Conditions | Underdog Idols";
        $this->active_page['termsandconditions'] = "active";
        $this->data['content_header'] = content_page_header($this->pages['termsandconditions']);
		$this->template('termsandconditions');
	}

    public function __destruct()
    {
        parent::__destruct();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */