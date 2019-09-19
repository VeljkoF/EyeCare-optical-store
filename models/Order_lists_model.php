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
class Order_lists_model extends CI_Model{
    public $id_order_list;
    public $date_order_list;
    public $id_form;
    public $note_order_list;
    public $id_pricelist_lens_right;
    public $id_pricelist_lens_left;
    public $id_order_status;
    public $id_right_left;
    public $where;
    public $order_by;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        if($this->id_order_list != null):
            $array = array(
                'id_order_list' => $this->id_order_list
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('order_lists');
        $this->db->join('forms', 'order_lists.id_form = forms.id_form');
        $this->db->join('order_status', 'order_lists.id_order_status = order_status.id_order_status', 'left');
        $this->db->join('customers', 'forms.id_customer = customers.id_customer', 'left');
        $this->db->join('right_left', 'order_lists.id_right_left = right_left.id_right_left', 'left');
        $this->db->join('pricelist_lenses', 'order_lists.id_pricelist_lens_right = pricelist_lenses.id_pricelist_lens', 'left');
        
        $this->db->join('producers_lenses', 'pricelist_lenses.id_producer_lens = producers_lenses.id_producer_lens', 'left');
        
        $this->db->join('material_lenses', 'pricelist_lenses.id_material_lens = material_lenses.id_material_lens', 'left');
        
        $this->db->join('type_lenses', 'pricelist_lenses.id_type_lens = type_lenses.id_type_lens', 'left');
        
        $this->db->join('designs_lenses', 'pricelist_lenses.id_design_lens = designs_lenses.id_design_lens', 'left');
        
        $this->db->join('index_lenses', 'pricelist_lenses.id_index_lens = index_lenses.id_index_lens', 'left');
        
        $this->db->join('name_lenses', 'pricelist_lenses.id_name_lens = name_lenses.id_name_lens', 'left');
        
        $this->db->join('finishing_lenses', 'pricelist_lenses.id_finishing_lens = finishing_lenses.id_finishing_lens', 'left');
        
        $this->db->join('ranges_dioptre_lenses', 'pricelist_lenses.id_range_dioptre_lens = ranges_dioptre_lenses.id_range_dioptre_lens', 'left');
        
        $this->db->join('diameter_lenses', 'pricelist_lenses.id_diameter_lens = diameter_lenses.id_diameter_lens', 'left');
        
        
        
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
            'id_order_list' => $this->id_order_list,
            'date_order_list' => $this->date_order_list,
            'id_form' => $this->id_form,
            'note_order_list' => $this->note_order_list,
            'id_pricelist_lens_right' => $this->id_pricelist_lens_right,
            'id_pricelist_lens_left' => $this->id_pricelist_lens_left,
            'id_order_status' => $this->id_order_status,
            'id_right_left' => $this->id_right_left
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('order_lists', $data);
        return true;
    }
    
    public function update(){
        if($this->id_order_list != null):
            $array = array(
                'id_order_list' => $this->id_order_list
            );
            $this->where = $array;
        endif;
        $data = array(
            'date_order_list' => $this->date_order_list,
            'id_form' => $this->id_form,
            'note_order_list' => $this->note_order_list,
            'id_pricelist_lens_right' => $this->id_pricelist_lens_right,
            'id_pricelist_lens_left' => $this->id_pricelist_lens_left,
            'id_order_status' => $this->id_order_status,
            'id_right_left' => $this->id_right_left
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('order_lists', $data);
        return true;
    }
    
     public function select_insert_id(){
        $this->db->select('MAX(id_order_list) as lastId');
        $this->db->from('order_lists');
        return $this->db->get()->result();
    }
    
}
