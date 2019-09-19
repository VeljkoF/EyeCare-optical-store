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
class producers_lenses_model extends CI_Model {

    public $id_producer_lens;
    public $name_producer_lens;
    public $address_producer_lens;
    public $city_producer_lens;
    public $state_producer_lens;
    public $phone_producer_lens;
    public $email_producer_lens;
    public $where;
    public $like;
    public $order_by;

    public function __construct() {
        parent::__construct();
    }

    public function select() {
        if ($this->id_producer_lens != null):
            $array = array(
                'id_producer_lens' => $this->id_producer_lens
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('producers_lenses');
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        if ($this->like != null):
            $this->db->like($this->like);
        endif;
        if ($this->order_by != null):
            $this->db->order_by($this->order_by);
        endif;
        return $this->db->get()->result();
    }

    public function insert() {
        $data = array(
            'id_producer_lens' => $this->id_producer_lens,
            'name_producer_lens' => $this->name_producer_lens,
            'address_producer_lens' => $this->address_producer_lens,
            'city_producer_lens' => $this->city_producer_lens,
            'state_producer_lens' => $this->state_producer_lens,
            'phone_producer_lens' => $this->phone_producer_lens,
            'email_producer_lens' => $this->email_producer_lens
        );
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('producers_lenses', $data);
        return true;
    }

    public function update() {
        if ($this->id_producer_lens != null):
            $array = array(
                'id_producer_lens' => $this->id_producer_lens
            );
            $this->where = $array;
        endif;
        $data = array(
            'name_producer_lens' => $this->name_producer_lens,
            'address_producer_lens' => $this->address_producer_lens,
            'city_producer_lens' => $this->city_producer_lens,
            'state_producer_lens' => $this->state_producer_lens,
            'phone_producer_lens' => $this->phone_producer_lens,
            'email_producer_lens' => $this->email_producer_lens
        );
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('producers_lenses', $data);
        return true;
    }

    public function delete() {
        if (isset($this->id_producer_lens)):
            $array = array(
                'id_producer_lens' => $this->id_producer_lens
            );
            $this->where = $array;
        endif;
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->delete('producers_lenses');
    }

}
