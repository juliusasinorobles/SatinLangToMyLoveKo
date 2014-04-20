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
class sample_model extends CI_Model
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'table name';
    }

    public function __destruct()
    {
        $this->db->close();
    }

}
?>
