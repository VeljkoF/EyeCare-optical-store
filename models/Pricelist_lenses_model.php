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
class Pricelist_lenses_model extends CI_Model {
    public $id_pricelist_lens;
    public $id_producer_lens;
    public $id_material_lens;
    public $id_type_lens;
    public $id_design_lens;
    public $id_index_lens;
    public $id_name_lens;
    public $id_finishing_lens;
    public $price_pricelist_lens;
    public $id_range_dioptre_lens;
    public $id_diameter_lens;
    public $where;
    public $order_by;
    public $group_by;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function short_select(){
        if($this->id_pricelist_lens != null):
            $array = array(
                'id_pricelist_lens' => $this->id_pricelist_lens
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('pricelist_lenses');
        
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        if($this->order_by != null):
            $this->db->order_by($this->order_by);
        endif;
        return $this->db->get()->result();
    }
    
    public function select(){
        if($this->id_pricelist_lens != null):
            $array = array(
                'id_pricelist_lens' => $this->id_pricelist_lens
            );
            $this->where = $array;
        endif;
        
        $this->db->select('*');
        $this->db->from('pricelist_lenses');
        $this->db->join('producers_lenses', 'pricelist_lenses.id_producer_lens = producers_lenses.id_producer_lens', 'left');
        $this->db->join('material_lenses', 'pricelist_lenses.id_material_lens = material_lenses.id_material_lens', 'left');
        $this->db->join('type_lenses', 'pricelist_lenses.id_type_lens = type_lenses.id_type_lens', 'left');
        $this->db->join('designs_lenses', 'pricelist_lenses.id_design_lens = designs_lenses.id_design_lens', 'left');
        $this->db->join('index_lenses', 'pricelist_lenses.id_index_lens = index_lenses.id_index_lens', 'left');
        $this->db->join('name_lenses', 'pricelist_lenses.id_name_lens = name_lenses.id_name_lens', 'left');
        $this->db->join('finishing_lenses', 'pricelist_lenses.id_finishing_lens = finishing_lenses.id_finishing_lens', 'left');
        $this->db->join('ranges_dioptre_lenses', 'pricelist_lenses.id_range_dioptre_lens = ranges_dioptre_lenses.id_range_dioptre_lens', 'left');
        $this->db->join('diameter_lenses', 'pricelist_lenses.id_diameter_lens = diameter_lenses.id_diameter_lens', 'left');
        $this->db->join('sph_range_dioptre_lenses as min', 'ranges_dioptre_lenses.id_min_sph_range_dioptre_lens = min.id_sph_range_dioptre_lens', 'left');
        $this->db->join('sph_range_dioptre_lenses as max', 'ranges_dioptre_lenses.id_max_sph_range_dioptre_lens = max.id_sph_range_dioptre_lens', 'left');
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        if ($this->group_by != null):
            $this->db->group_by($this->group_by);
        endif;
        if($this->order_by != null):
            $this->db->order_by($this->order_by);
        endif;
        return $this->db->get()->result();
    }
    
    public function insert(){
        $data = array(
            'id_pricelist_lens' => $this->id_pricelist_lens,
            'id_producer_lens' => $this->id_producer_lens,
            'id_material_lens' => $this->id_material_lens,
            'id_type_lens' => $this->id_type_lens,
            'id_design_lens' => $this->id_design_lens,
            'id_index_lens' => $this->id_index_lens,
            'id_name_lens' => $this->id_name_lens,
            'id_finishing_lens' => $this->id_finishing_lens,
            'price_pricelist_lens' => $this->price_pricelist_lens,
            'id_range_dioptre_lens' => $this->id_range_dioptre_lens,
            'id_diameter_lens' => $this->id_diameter_lens
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('pricelist_lenses', $data);
        return true;
    }
    
    public function update(){
        if($this->id_pricelist_lens != null):
            $array = array(
                'id_pricelist_lens' => $this->id_pricelist_lens
            );
            $this->where = $array;
        endif;
        $data = array(
            'id_producer_lens' => $this->id_producer_lens,
            'id_material_lens' => $this->id_material_lens,
            'id_type_lens' => $this->id_type_lens,
            'id_design_lens' => $this->id_design_lens,
            'id_index_lens' => $this->id_index_lens,
            'id_name_lens' => $this->id_name_lens,
            'id_finishing_lens' => $this->id_finishing_lens,
            'price_pricelist_lens' => $this->price_pricelist_lens,
            'id_range_dioptre_lens' => $this->id_range_dioptre_lens,
            'id_diameter_lens' => $this->id_diameter_lens
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('pricelist_lenses', $data);
        return true;
    }
    
    public function delete(){
        if(isset($this->id_pricelist_lens)):
            $array = array(
                'id_pricelist_lens' => $this->id_pricelist_lens
            );
            $this->where = $array;
        endif;
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->delete('pricelist_lenses');
    }    
}
