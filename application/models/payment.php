<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Payment extends CI_Model
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'payment';
    }

    public function getAll()
    {
        //$this->db->select('columns', 'to', 'be', 'selected');
        $query = $this->db->get_where($this->table, array('active'=>1));
        return $query->result();
    }

    public function getById($id)
    {
        //$this->db->select('columns', 'to', 'be', 'selected');
        $query = $this->db->get_where($this->table, array('id'=>$id,'active'=>1));
        return $query->result();        
    }

    public function getByVideoId($id)
    {
        //$this->db->select('columns', 'to', 'be', 'selected');
        $query = $this->db->get_where($this->table, array('video_id'=>$id, 'active'=>1));
        return $query->result();        
    }

    public function getByTransId($id)
    {
        //$this->db->select('columns', 'to', 'be', 'selected');
        $query = $this->db->get_where($this->table, array('trans_id'=>$id, 'active'=>1));
        return $query->result();        
    }

    public function getByContestantId($id)
    {
        //$this->db->select('columns', 'to', 'be', 'selected');
        $query = $this->db->get_where($this->table, array('contestant_id'=>$id, 'active'=>1));
        return $query->result();        
    }

    public function insert($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data){
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    public function __destruct()
    {
        $this->db->close();
    }

}
?>
