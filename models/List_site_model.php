<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of list_site_model
 *
 * @author Veljko
 */
class List_site_model extends CI_Model{
    
    public $id_list_site;
    public $item_list_site;
    public $id_text_site;
    public $where;
    public $order_by;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        if($this->id_list_site != null):
            $array = array(
                'id_list_site' => $this->id_list_site
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('list_site');
        $this->db->join('text_site', 'list_site.id_text_site = text_site.id_text_site', 'left');
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
            'id_list_site' => $this->id_list_site,
            'item_list_site' => $this->item_list_site,
            'id_text_site' => $this->id_text_site
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('list_site', $data);
        return true;
    }
    
    public function update(){
        if($this->id_list_site != null):
            $array = array(
                'id_list_site' => $this->id_list_site
            );
            $this->where = $array;
        endif;
        $data = array(
            'item_list_site' => $this->item_list_site,
            'id_text_site' => $this->id_text_site
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('list_site', $data);
        return true;
    }
    
    public function delete(){
        if($this->id_list_site != null):
            $array = array(
                'id_list_site' => $this->id_list_site
            );
            $this->where = $array;
        endif;
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->delete('list_site');
    }    
}
