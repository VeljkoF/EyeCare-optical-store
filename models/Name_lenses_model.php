<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index_lenses
 *
 * @author Veljko
 */
class Name_lenses_model extends CI_Model{
    public $id_name_lens;
    public $name_name_lens;
    public $where;
    public $order_by;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        if($this->id_name_lens != null):
            $array = array(
                'id_name_lens' => $this->id_name_lens
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('name_lenses');
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
            'id_name_lens' => $this->id_name_lens,
            'name_name_lens' => $this->name_name_lens
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('name_lenses', $data);
        return true;
    }
    
    public function update(){
        if($this->id_name_lens != null):
            $array = array(
                'id_name_lens' => $this->id_name_lens
            );
            $this->where = $array;
        endif;
        $data = array(
            'name_name_lens' => $this->name_name_lens
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('name_lenses', $data);
        return true;
    }
    
    public function delete(){
        if(isset($this->id_name_lens)):
            $array = array(
                'id_name_lens' => $this->id_name_lens
            );
            $this->where = $array;
        endif;
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->delete('name_lenses');
    }    
}
