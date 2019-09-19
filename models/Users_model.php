<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users_model
 *
 * @author Veljko
 */
class Users_model extends CI_Model{
    
    public $id_user;
    public $name_user;
    public $password_user;
    public $id_role;
    public $where;
    public $order_by;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        if($this->id_user != null):
            $array = array(
                'id_user' => $this->id_user
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('role', 'users.id_role = role.id_role');
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
            'id_user' => $this->id_user,
            'name_user' => $this->name_user,
            'password_user' => $this->password_user,
            'id_role' => $this->id_role
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('users', $data);
        return true;
    }
    
    public function update(){
        if($this->id_user != null):
            $array = array(
                'id_user' => $this->id_user
            );
            $this->where = $array;
        endif;
        $data = array(
            'name_user' => $this->name_user,
            'password_user' => $this->password_user,
            'id_role' => $this->id_role
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('users', $data);
        return true;
    }
    
    public function delete(){
        if(isset($this->id_user)):
            $array = array(
                'id_user' => $this->id_user
            );
            $this->where = $array;
        endif;
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->delete('users');
    }    
}
