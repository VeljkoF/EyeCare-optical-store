<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu_models
 *
 * @author Veljko
 */
class Menu_model extends CI_Model {
    
    public $id_menu;
    public $name_menu;
    public $path_menu;
    public $visitor;
    public $admin;
    public $user;
    public $parent;
    public $where;
    public $order_by;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        if($this->id_menu != null):
            $array = array(
                'id_menu' => $this->id_menu
            );
            $this->where = $array;
        endif;
        if($this->admin != null):
            $array = array(
                'admin' => $this->admin
            );
            $this->where = $array;
        endif;
        if($this->user != null):
            $array = array(
                'user' => $this->user
            );
            $this->where = $array;
        endif;
//        if($this->parent != null):
//            $array = array(
//                'parent' => $this->parent
//            );
//            $this->where = $array;
//        endif;
        $this->db->select('*');
        $this->db->from('menu');
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        if($this->order_by != null):
            $this->db->order_by($this->order_by);
        endif;
        return $this->db->get()->result();
    }
    
    public function update(){
        if($this->id_menu != null):
            $array = array(
                'id_menu' => $this->id_menu
            );
            $this->where = $array;
        endif;
        $data = array(
            'name_menu' => $this->name_menu,
            'parent' =>  $this->parent
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('menu', $data);
        return true;
    }
}
