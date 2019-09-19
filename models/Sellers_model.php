<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sellers_model
 *
 * @author Veljko
 */
class Sellers_model extends CI_Model{
    
    public $id_seller;
    public $name_seller;
    public $where;
    public $order_by;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        if($this->id_seller != null):
            $array = array(
                'id_seller' => $this->id_seller
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('sellers');
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
            'id_seller' => $this->id_seller,
            'name_seller' => $this->name_seller
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('sellers', $data);
        return true;
    }
    
    public function update(){
        if($this->id_seller != null):
            $array = array(
                'id_seller' => $this->id_seller
            );
            $this->where = $array;
        endif;
        $data = array(
            'name_seller' => $this->name_seller
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('sellers', $data);
        return true;
    }
    
    public function delete(){
        if(isset($this->id_seller)):
            $array = array(
                'id_seller' => $this->id_seller
            );
            $this->where = $array;
        endif;
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->delete('sellers');
    }    
}
