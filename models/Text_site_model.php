<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of text_site_model
 *
 * @author Veljko
 */
class Text_site_model extends CI_Model {

    public $id_text_site;
    public $title_text_site;
    public $text_text_site_1;
    public $text_text_site_2;
    public $pic_text_site;
    public $id_menu;
    public $where;
    public $order_by;

    public function __construct() {
        parent::__construct();
    }

    public function select() {
        if ($this->id_text_site != null):
            $array = array(
                'id_text_site' => $this->id_text_site
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('text_site');
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        if ($this->order_by != null):
            $this->db->order_by($this->order_by);
        endif;
        return $this->db->get()->result();
    }

    public function update() {
        if ($this->id_text_site != null):
            $array = array(
                'id_text_site' => $this->id_text_site
            );
            $this->where = $array;
        endif;
        if ($this->pic_text_site != null):
            $data = array(
                'title_text_site' => $this->title_text_site,
                'text_text_site_1' => $this->text_text_site_1,
                'text_text_site_2' => $this->text_text_site_2,
                'pic_text_site' => $this->pic_text_site
            );
        else:
            $data = array(
                'title_text_site' => $this->title_text_site,
                'text_text_site_1' => $this->text_text_site_1,
                'text_text_site_2' => $this->text_text_site_2
            );
        endif;
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('text_site', $data);
        return true;
    }

    public function delete() {
        if ($this->id_text_site != null):
            $array = array(
                'id_text_site' => $this->id_text_site
            );
            $this->where = $array;
        endif;
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->delete('text_site');
    }

}
