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
class Finishing_lenses_model extends CI_Model{
    public $id_finishing_lens;
    public $name_finishing_lens;
    public $where;
    public $order_by;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        if($this->id_finishing_lens != null):
            $array = array(
                'id_finishing_lens' => $this->id_finishing_lens
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('finishing_lenses');
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
            'id_finishing_lens' => $this->id_finishing_lens,
            'name_finishing_lens' => $this->name_finishing_lens
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('finishing_lenses', $data);
        return true;
    }
    
    public function update(){
        if($this->id_finishing_lens != null):
            $array = array(
                'id_finishing_lens' => $this->id_finishing_lens
            );
            $this->where = $array;
        endif;
        $data = array(
            'name_finishing_lens' => $this->name_finishing_lens
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('finishing_lenses', $data);
        return true;
    }
    
    public function delete(){
        if(isset($this->id_finishing_lens)):
            $array = array(
                'id_finishing_lens' => $this->id_finishing_lens
            );
            $this->where = $array;
        endif;
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->delete('finishing_lenses');
    }    
}
