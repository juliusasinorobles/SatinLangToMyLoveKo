<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payments extends MY_Controller {

    private $logDir = "application/logs/";
    private $logName = "video_payments";

	public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model("Video");
        $this->load->model("Payment");
        $post_vars = json_encode($_POST);

        if(isset($_POST['invoice']))
        {
            $invoice = $_POST['invoice'];
            $amount = $_POST['mc_gross'];
            $transid_id = $_POST['txn_id'];
            $tmp = substr($invoice, 20);
            $tmp = explode('v', $tmp);
            $contestant_id = substr($tmp[0], 1);
            $video_id = $tmp[1];

            $payment = array();
            $payment['video_id'] = $video_id;
            $payment['contestant_id'] = $contestant_id;
            $payment['invoice'] = $invoice;
            $payment['trans_id'] = $transid_id;
            $payment['amount'] = $amount;

            if($payment['id'] = $this->Payment->insert($payment))
            {
                if($this->Video->update($video_id, array("active"=>1)))
                {
                    $this->payment_logger("Payment successfull", $post_vars);
                    echo "OK";
                    exit;
                }
                else
                {
                    $this->payment_logger("Error on video update", $post_vars);
                }
            }
            else
            {
                $this->payment_logger("Error on payment insert", $post_vars);
            }
        }
        else
        {
            $this->payment_logger("No invoice found", $post_vars);
            header("Location:home");
            exit;
        }

        echo "FAILED":
    }

    private function payment_logger($title, $message)
    {
        $this->logName .= date("Ymd").".log";
        $log = date("Y-m-d H:i:s").' | '.$title.' | '.$message."\r\n";

        if($fh = fopen($this->logDir.$this->logName, "a"))
        {
            fwrite($fh, $log);
            fclose($fh);
        }
    }

    public function __destruct()
    {
        parent::__destruct();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */