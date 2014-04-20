<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['title'] = "Video | Underdog Idols";
        $this->data['content_header'] = content_page_header($this->pages['video']);
        $this->template('video');
	}

    public function __destruct()
    {
        parent::__destruct();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */