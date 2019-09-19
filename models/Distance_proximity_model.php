<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of blog_model
 *
 * @author Veljko
 */
class Distance_proximity_model extends CI_Model {

    public $id_distance_proximity;
    public $name_distance_proximity;
    public $where;
    public $order_by;

    public function __construct() {
        parent::__construct();
    }

    public function select() {
        if ($this->id_distance_proximity != null):
            $array = array(
                'id_distance_proximity' => $this->id_distance_proximity
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('distance_proximity');
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
            'id_distance_proximity' => $this->id_distance_proximity,
            'name_distance_proximity' => $this->name_distance_proximity
        );
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('distance_proximity', $data);
        return true;
    }

    public function update() {
        if ($this->id_distance_proximity != null):
            $array = array(
                'id_distance_proximity' => $this->id_distance_proximity
            );
            $this->where = $array;
        endif;
        $data = array(
            'name_distance_proximity' => $this->name_distance_proximity
        );
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('distance_proximity', $data);
        return true;
    }

    public function delete() {
        if (isset($this->id_distance_proximity)):
            $array = array(
                'id_distance_proximity' => $this->id_distance_proximity
            );
            $this->where = $array;
        endif;
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->delete('distance_proximity');
    }

}
