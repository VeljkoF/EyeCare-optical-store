<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of exchange_model
 *
 * @author Veljko
 */
class Exchange_model extends CI_Model {

    public $id_exchange;
    public $amount_exchange;
    public $default_amount_exchange;
    public $where;
    public $order_by;

    public function __construct() {
        parent::__construct();
    }

    public function select() {
        if ($this->id_exchange != null):
            $array = array(
                'id_exchange' => $this->id_exchange
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('exchange');
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
            'id_exchange' => $this->id_exchange,
            'amount_exchange' => $this->amount_exchange,
            'default_amount_exchange' => $this->default_amount_exchange
        );
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('exchange', $data);
        return true;
    }

    public function update() {
        if ($this->id_exchange != null):
            $array = array(
                'id_exchange' => $this->id_exchange
            );
            $this->where = $array;
        endif;
        if ($this->amount_exchange == null):
            $data = array(
                'default_amount_exchange' => $this->default_amount_exchange
            );
        else:

            $data = array(
                'amount_exchange' => $this->amount_exchange,
                'default_amount_exchange' => $this->default_amount_exchange
            );
        endif;
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('exchange', $data);
        return true;
    }

    public function delete() {
        if (isset($this->id_exchange)):
            $array = array(
                'id_exchange' => $this->id_exchange
            );
            $this->where = $array;
        endif;
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->delete('exchange');
    }

}
