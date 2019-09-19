<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of slider_model
 *
 * @author Veljko
 */
class Slider_model extends CI_Model {

    public $id_slider;
    public $title_slider;
    public $text_slider;
    public $name_pic_slider;
    public $pic_slider;
    public $where;
    public $order_by;

    public function __construct() {
        parent::__construct();
    }

    public function select() {
        if ($this->id_slider != null):
            $array = array(
                'id_slider' => $this->id_slider
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('slider');
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
            'id_slider' => $this->id_slider,
            'title_slider' => $this->title_slider,
            'text_slider' => $this->text_slider,
            'name_pic_slider' => $this->name_pic_slider,
            'pic_slider' => $this->pic_slider
        );
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('slider', $data);
        return true;
    }

    public function update() {
        if ($this->id_slider != null):
            $array = array(
                'id_slider' => $this->id_slider
            );
            $this->where = $array;
        endif;
        if($this->pic_slider != null):
        $data = array(
            'title_slider' => $this->title_slider,
            'text_slider' => $this->text_slider,
            'name_pic_slider' => $this->name_pic_slider,
            'pic_slider' => $this->pic_slider
        );
        else:
            $data = array(
            'title_slider' => $this->title_slider,
            'text_slider' => $this->text_slider,
            'name_pic_slider' => $this->name_pic_slider
        );
        endif;
        if ($this->where != null):
            $this->db->where($this->where);
        endif;

        $this->db->update('slider', $data);
        return true;
    }
//    public function updatewithout() {
//        if ($this->id_slider != null):
//            $array = array(
//                'id_slider' => $this->id_slider
//            );
//            $this->where = $array;
//        endif;
//        $data = array(
//            'title_slider' => $this->title_slider,
//            'text_slider' => $this->text_slider,
//            'name_pic_slider' => $this->name_pic_slider
//        );
//        if ($this->where != null):
//            $this->db->where($this->where);
//        endif;
//
//        $this->db->update('slider', $data);
//        return true;
//    }

    public function delete() {
        if (isset($this->id_slider)):
            $array = array(
                'id_slider' => $this->id_slider
            );
            $this->where = $array;
        endif;
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->delete('slider');
    }

}
