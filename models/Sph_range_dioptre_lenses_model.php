<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of customers_model
 *
 * @author Veljko
 */
class Sph_range_dioptre_lenses_model extends CI_Model{
    
    public $id_sph_range_dioptre_lens;
    public $value_sph_range_dioptre_lens;
    public $where;
    public $order_by;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        if($this->id_sph_range_dioptre_lens != null):
            $array = array(
                'id_sph_range_dioptre_lens' => $this->id_sph_range_dioptre_lens
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('sph_range_dioptre_lenses');
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
            'id_sph_range_dioptre_lens' => $this->id_sph_range_dioptre_lens,
            'value_sph_range_dioptre_lens' => $this->value_sph_range_dioptre_lens
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('sph_range_dioptre_lenses', $data);
        return true;
    }
    
    public function update(){
        if($this->id_sph_range_dioptre_lens != null):
            $array = array(
                'id_sph_range_dioptre_lens' => $this->id_sph_range_dioptre_lens
            );
            $this->where = $array;
        endif;
        $data = array(
            'value_sph_range_dioptre_lens' => $this->value_sph_range_dioptre_lens
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->update('sph_range_dioptre_lenses', $data);
        //return true;
    }
    
    public function delete(){
        if(isset($this->id_sph_range_dioptre_lens)):
            $array = array(
                'id_sph_range_dioptre_lens' => $this->id_sph_range_dioptre_lens
            );
            $this->where = $array;
        endif;
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->delete('sph_range_dioptre_lenses');
    }    
}
