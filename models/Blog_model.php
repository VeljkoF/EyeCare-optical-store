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
class Blog_model extends CI_Model {

    public $id_blog;
    public $title_blog;
    public $text_blog;
    public $date_blog;
    public $pic_blog;
    public $where;
    public $order_by;

    public function __construct() {
        parent::__construct();
    }

    public function select() {
        if ($this->id_blog != null):
            $array = array(
                'id_blog' => $this->id_blog
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('blog');
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
            'id_blog' => $this->id_blog,
            'title_blog' => $this->title_blog,
            'text_blog' => $this->text_blog,
            'date_blog' => $this->date_blog,
            'pic_blog' => $this->pic_blog
        );
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('blog', $data);
        return true;
    }

    public function update() {
        if ($this->id_blog != null):
            $array = array(
                'id_blog' => $this->id_blog
            );
            $this->where = $array;
        endif;
        if ($this->pic_blog != null):
            $data = array(
                'title_blog' => $this->title_blog,
                'text_blog' => $this->text_blog,
                'date_blog' => $this->date_blog,
                'pic_blog' => $this->pic_blog
            );
        else:
            $data = array(
                'title_blog' => $this->title_blog,
                'text_blog' => $this->text_blog,
                'date_blog' => $this->date_blog
            );
        endif;
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('blog', $data);
        return true;
    }

    public function delete() {
        if (isset($this->id_blog)):
            $array = array(
                'id_blog' => $this->id_blog
            );
            $this->where = $array;
        endif;
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->delete('blog');
    }

}
