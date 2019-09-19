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
class Customers_model extends CI_Model{
    
    public $id_customer;
    public $name_customer;
    public $year_customer;
    public $phone_customer;
    public $email_customer;
    public $note_customer;
    public $where;
    public $like;
    public $order_by;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        if($this->id_customer != null):
            $array = array(
                'id_customer' => $this->id_customer
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('customers');
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        if($this->like != null):
            $this->db->like($this->like);
        endif;
        if($this->order_by != null):
            $this->db->order_by($this->order_by);
        endif;
        return $this->db->get()->result();
    }
    
    public function insert(){
        $data = array(
            'id_customer' => $this->id_customer,
            'name_customer' => $this->name_customer,
            'year_customer' => $this->year_customer,
            'phone_customer' => $this->phone_customer,
            'email_customer' => $this->email_customer,
            'note_customer' => $this->note_customer
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('customers', $data);
        return true;
    }
    
    public function update(){
        if($this->id_customer != null):
            $array = array(
                'id_customer' => $this->id_customer
            );
            $this->where = $array;
        endif;
        $data = array(
            'name_customer' => $this->name_customer,
            'year_customer' => $this->year_customer,
            'phone_customer' => $this->phone_customer,
            'email_customer' => $this->email_customer,
            'note_customer' => $this->note_customer
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('customers', $data);
        return true;
    }
    
    public function delete(){
        if(isset($this->id_customer)):
            $array = array(
                'id_customer' => $this->id_customer
            );
            $this->where = $array;
        endif;
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->delete('customers');
    }    
    
    public function select_insert_id(){
        $this->db->select('MAX(id_customer) as lastId');
        $this->db->from('customers');
        return $this->db->get()->result();
    }
}
