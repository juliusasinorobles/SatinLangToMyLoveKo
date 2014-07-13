<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends MY_Controller {

    public $action_message = array(
        'success_insert'=>"Thank you! Your message has been sent",
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

    public function index()
    {
        // TO DO...
	}

    public function login()
    {
        $this->load->model("Contestant");
        $username = "jrobles@egg.ph";
        $password = "password";
        $result = $this->Contestant->getByUsernamePassword($username, $password);
        $result = json_decode(json_encode($result), true);
        var_dump($result);
    }

    public function get_video_title()
    {
        $url = 'https://www.youtube.com/watch?v=IcrbM1l_BoI';
        $tmp = explode('watch?v=', $url);
        $video_id = $tmp[1];
        $api = 'https://gdata.youtube.com/feeds/api/videos/'.$video_id.'?v=2';
        
        $this->curl->create($api);
        $this->curl->option("SSL_VERIFYPEER",0);
        $this->curl->option("SSL_VERIFYHOST",2);
        $result = $this->curl->execute();

        $result = simplexml_load_string($result);   
        $result = json_decode(json_encode($result));

        $title = $result->title;

        var_dump($result);
        echo "<hr>";
        var_dump($title);

        return $title;
    }

    public function __destruct()
    {
        parent::__destruct();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */