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
class Right_left_model extends CI_Model {

    public $id_right_left;
    public $name_right_left;
    public $where;
    public $order_by;

    public function __construct() {
        parent::__construct();
    }

    public function select() {
        if ($this->id_right_left != null):
            $array = array(
                'id_right_left' => $this->id_right_left
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('right_left');
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
            'id_right_left' => $this->id_right_left,
            'name_right_left' => $this->name_right_left
        );
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('right_left', $data);
        return true;
    }

    public function update() {
        if ($this->id_right_left != null):
            $array = array(
                'id_right_left' => $this->id_right_left
            );
            $this->where = $array;
        endif;
        $data = array(
            'name_right_left' => $this->name_right_left
        );
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('right_left', $data);
        return true;
    }

    public function delete() {
        if (isset($this->id_right_left)):
            $array = array(
                'id_right_left' => $this->id_right_left
            );
            $this->where = $array;
        endif;
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->delete('right_left');
    }

}
