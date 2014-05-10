<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of model_mygroup_account
 *
 * @author katherinedepadua
 */
class Faqs extends CI_Model
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'faq';
    }

    public function getAll()
    {
        //$this->db->select('columns', 'to', 'be', 'selected');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function getById($id)
    {
        //$this->db->select('columns', 'to', 'be', 'selected');
        $query = $this->db->get_where($this->table, array('id'=>$id));
        return $query->result();        
    }

    public function insert($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($data){
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
