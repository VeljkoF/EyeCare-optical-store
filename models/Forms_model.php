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
class Forms_model extends CI_Model{
    
    public $id_form;
    public $number_form;
    public $date_form;
    public $pd_form;
    public $distance_od_sph_form;
    public $distance_od_cyl_form;
    public $distance_od_ax_form;
    public $distance_os_sph_form;
    public $distance_os_cyl_form;
    public $distance_os_ax_form;
    public $frame_form;
    public $frame_price_form;
    public $frame_discount_form;
    public $lens_producer_form;
    public $lens_material_form;
    public $lens_type_form;
    public $lens_designe_form;
    public $lens_index_form;
    public $lens_name_form;
    public $lens_finishing_form;
    public $lens_diameter_lens;
    public $lens_price_form;
    public $lens_discount_form;
    public $add_form;
    public $advance_payment_form;
    public $id_seller;
    public $id_customer;
    public $id_exchange;
    public $id_distance_proximity;
    public $where;
    public $order_by;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        if($this->id_form != null):
            $array = array(
                'id_form' => $this->id_form
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('forms');
        $this->db->join('sellers', 'forms.id_seller = sellers.id_seller', 'left');
        $this->db->join('exchange', 'forms.id_exchange = exchange.id_exchange', 'left');
        $this->db->join('distance_proximity', 'forms.id_distance_proximity = distance_proximity.id_distance_proximity', 'left');
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
            'id_form' => $this->id_form,
            'number_form' => $this->number_form,
            'date_form' => $this->date_form,
            'pd_form' => $this->pd_form,
            'distance_od_sph_form' => $this->distance_od_sph_form,
            'distance_od_cyl_form' => $this->distance_od_cyl_form,
            'distance_od_ax_form' => $this->distance_od_ax_form,
            'distance_os_sph_form' => $this->distance_os_sph_form,
            'distance_os_cyl_form' => $this->distance_os_cyl_form,
            'distance_os_ax_form' => $this->distance_os_ax_form,
            'frame_form' => $this->frame_form,
            'frame_price_form' => $this->frame_price_form,
            'frame_discount_form' => $this->frame_discount_form,
            'lens_producer_form' => $this->lens_producer_form,
            'lens_material_form' => $this->lens_material_form,
            'lens_type_form' => $this->lens_type_form,
            'lens_designe_form' => $this->lens_designe_form,
            'lens_index_form' => $this->lens_index_form,
            'lens_name_form' => $this->lens_name_form,
            'lens_finishing_form' => $this->lens_finishing_form,
            'lens_diameter_lens' => $this->lens_diameter_lens,
            'lens_price_form' => $this->lens_price_form,
            'lens_discount_form' => $this->lens_discount_form,            
            'add_form' => $this->add_form,
            'advance_payment_form' => $this->advance_payment_form,
            'id_seller' => $this->id_seller,
            'id_customer' => $this->id_customer,
            'id_exchange' => $this->id_exchange,
            'id_distance_proximity' => $this->id_distance_proximity
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('forms', $data);
        return true;
    }
    
    public function update(){
        if($this->id_form != null):
            $array = array(
                'id_form' => $this->id_form
            );
            $this->where = $array;
        endif;
        $data = array(
            'number_form' => $this->number_form,
            'date_form' => $this->date_form,
            'pd_form' => $this->pd_form,
            'distance_od_sph_form' => $this->distance_od_sph_form,
            'distance_od_cyl_form' => $this->distance_od_cyl_form,
            'distance_od_ax_form' => $this->distance_od_ax_form,
            'distance_os_sph_form' => $this->distance_os_sph_form,
            'distance_os_cyl_form' => $this->distance_os_cyl_form,
            'distance_os_ax_form' => $this->distance_os_ax_form,
            'frame_form' => $this->frame_form,
            'frame_price_form' => $this->frame_price_form,
            'frame_discount_form' => $this->frame_discount_form,
            'lens_producer_form' => $this->lens_producer_form,
            'lens_material_form' => $this->lens_material_form,
            'lens_type_form' => $this->lens_type_form,
            'lens_designe_form' => $this->lens_designe_form,
            'lens_index_form' => $this->lens_index_form,
            'lens_name_form' => $this->lens_name_form,
            'lens_finishing_form' => $this->lens_finishing_form,
            'lens_diameter_lens' => $this->lens_diameter_lens,
            'lens_price_form' => $this->lens_price_form,
            'lens_discount_form' => $this->lens_discount_form,            
            'add_form' => $this->add_form,
            'advance_payment_form' => $this->advance_payment_form,
            'id_seller' => $this->id_seller,
            'id_customer' => $this->id_customer,
            'id_exchange' => $this->id_exchange,
            'id_distance_proximity' => $this->id_distance_proximity
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('forms', $data);
        return true;
    }
    
    public function delete(){
        if(isset($this->id_form)):
            $array = array(
                'id_form' => $this->id_form
            );
            $this->where = $array;
        endif;
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->delete('forms');
    }    
    
    public function select_insert_id(){
        $this->db->select('MAX(id_form) as lastId');
        $this->db->from('forms');
        return $this->db->get()->result();
    }
}
