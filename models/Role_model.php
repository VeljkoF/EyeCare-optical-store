<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of role_model
 *
 * @author Veljko
 */
class Role_model extends CI_Model{
     
    public $id_role;
    public $name_role;
    public $where;
    public $order_by;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        if($this->id_role != null):
            $array = array(
                'id_role' => $this->id_role
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('role');
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        if($this->order_by != null):
            $this->db->order_by($this->order_by);
        endif;
        return $this->db->get()->result();
    }
    
    public function insert(){
        $data = array(
            'id_role' => $this->id_role,
            'name_role' => $this->name_role
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('role', $data);
        return true;
    }
    
    public function update(){
        if($this->id_role != null):
            $array = array(
                'id_role' => $this->id_role
            );
            $this->where = $array;
        endif;
        $data = array(
            'name_role' => $this->name_role
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('role', $data);
        return true;
    }
    
    public function delete(){
        if(isset($this->id_role)):
            $array = array(
                'id_role' => $this->id_role
            );
            $this->where = $array;
        endif;
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->delete('role');
    }  
}
