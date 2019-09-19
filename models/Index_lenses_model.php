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
class Index_lenses_model extends CI_Model{
    public $id_index_lens;
    public $name_index_lens;
    public $where;
    public $order_by;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        if($this->id_index_lens != null):
            $array = array(
                'id_index_lens' => $this->id_index_lens
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('index_lenses');
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
            'id_index_lens' => $this->id_index_lens,
            'name_index_lens' => $this->name_index_lens
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('index_lenses', $data);
        return true;
    }
    
    public function update(){
        if($this->id_index_lens != null):
            $array = array(
                'id_index_lens' => $this->id_index_lens
            );
            $this->where = $array;
        endif;
        $data = array(
            'name_index_lens' => $this->name_index_lens
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('index_lenses', $data);
        return true;
    }
    
    public function delete(){
        if(isset($this->id_index_lens)):
            $array = array(
                'id_index_lens' => $this->id_index_lens
            );
            $this->where = $array;
        endif;
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->delete('index_lenses');
    }    
}
