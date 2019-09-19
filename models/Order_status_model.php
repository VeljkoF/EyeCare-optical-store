<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of order_lists_model
 *
 * @author Veljko
 */
class Order_status_model extends CI_Model{
    public $id_order_status;
    public $name_order_status;
    public $where;
    public $order_by;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        if($this->id_order_status != null):
            $array = array(
                'id_order_status' => $this->id_order_status
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('order_status');        
        
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        if($this->order_by != null):
            $this->db->order_by($this->order_by);
        endif;
        return $this->db->get()->result();
    }
}
