<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Vote extends CI_Model
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'vote';
    }

    public function getAll()
    {
        //$this->db->select('columns', 'to', 'be', 'selected');
        $query = $this->db->get_where($this->table, array('active'=>1));
        return $query->result();
    }

    public function getByIPVideoIdDateCreated($ip, $video_id, $date){
        $sql = "SELECT * FROM $this->table WHERE ip = ? AND video_id = ? AND DATE(date_created) = ?";
        $query = $this->db->query($sql, array($ip, $video_id, $date));
        return $query->result();        
    }

    public function insert($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function __destruct()
    {
        $this->db->close();
    }

}
?>
