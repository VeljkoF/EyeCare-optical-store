<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of equipment_model
 *
 * @author Veljko
 */
class Equipment_model extends CI_Model {

    public $id_equipment;
    public $submenu_equipment;
    public $title_equipment;
    public $text_equipment;
    public $link_equipment;
    public $pic_equipment;
    public $where;
    public $order_by;

    public function __construct() {
        parent::__construct();
    }

    public function select() {
        if ($this->id_equipment != null):
            $array = array(
                'id_equipment' => $this->id_equipment
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('equipment');
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        if ($this->order_by != null):
            $this->db->order_by($this->order_by);
        endif;
        return $this->db->get()->result();
    }

    public function insert() {
        $data = array(
            'id_equipment' => $this->id_equipment,
            'submenu_equipment' => $this->submenu_equipment,
            'title_equipment' => $this->title_equipment,
            'text_equipment' => $this->text_equipment,
            'link_equipment' => $this->link_equipment,
            'pic_equipment' => $this->pic_equipment
        );
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('equipment', $data);
        return true;
    }

    public function update() {
        if ($this->id_equipment != null):
            $array = array(
                'id_equipment' => $this->id_equipment
            );
            $this->where = $array;
        endif;
        if ($this->pic_equipment != null):
            $data = array(
                'submenu_equipment' => $this->submenu_equipment,
                'title_equipment' => $this->title_equipment,
                'text_equipment' => $this->text_equipment,
                'link_equipment' => $this->link_equipment,
                'pic_equipment' => $this->pic_equipment
            );
        else:
            $data = array(
                'submenu_equipment' => $this->submenu_equipment,
                'title_equipment' => $this->title_equipment,
                'text_equipment' => $this->text_equipment,
                'link_equipment' => $this->link_equipment
            );
        endif;
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('equipment', $data);
        return true;
    }

    public function delete() {
        if (isset($this->id_equipment)):
            $array = array(
                'id_equipment' => $this->id_equipment
            );
            $this->where = $array;
        endif;
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->delete('equipment');
    }
    
    public function count_all() {
        if (isset($this->id_equipment)):
            $array = array(
                'id_equipment' => $this->id_equipment
            );
            $this->where = $array;
        endif;
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->count_all_results('equipment');
    }

}
