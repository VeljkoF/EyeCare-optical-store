<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of type_lenses_model
 *
 * @author Veljko
 */
class Type_lenses_model extends CI_Model {
    public $id_type_lens;
    public $name_type_lens;
    public $order_type_lens;
    public $where;
    public $order_by;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        if($this->id_type_lens != null):
            $array = array(
                'id_type_lens' => $this->id_type_lens
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('type_lenses');
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
            'id_type_lens' => $this->id_type_lens,
            'name_type_lens' => $this->name_type_lens,
            'order_type_lens' => $this->order_type_lens
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('type_lenses', $data);
        return true;
    }
    
    public function update(){
        if($this->id_type_lens != null):
            $array = array(
                'id_type_lens' => $this->id_type_lens
            );
            $this->where = $array;
        endif;
        $data = array(
            'name_type_lens' => $this->name_type_lens,
            'order_type_lens' => $this->order_type_lens
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('type_lenses', $data);
        return true;
    }
    
    public function delete(){
        if(isset($this->id_type_lens)):
            $array = array(
                'id_type_lens' => $this->id_type_lens
            );
            $this->where = $array;
        endif;
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->delete('type_lenses');
    }    
}
