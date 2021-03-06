<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Contestant extends CI_Model
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'contestant';
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

    public function getByEmail($email){
        $sql = "SELECT * FROM $this->table WHERE BINARY email = ?";
        $query = $this->db->query($sql, array($email));
        return $query->result();        
    }
	
	public function getByEmailExcept($id, $email){
		$sql = "SELECT * FROM $this->table WHERE id <> ? AND BINARY email = ?";
		$query = $this->db->query($sql, array($id, $email));
		return $query->result();
	}

    public function getByUsernamePassword($email, $password){
        $sql = "SELECT * FROM $this->table WHERE BINARY email = ? AND BINARY password = ?";
        $query = $this->db->query($sql, array($email, $password));
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
