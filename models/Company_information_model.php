<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of company_information_model
 *
 * @author Veljko
 */
class Company_information_model extends CI_Model{
    
    public $id_company;
    public $name_company_1;
    public $name_company_2;
    public $address_company;
    public $city_company;
    public $phone_company;
    public $mail_company;
    public $working_days_company;
    public $working_time_company;
    public $where;
    public $order_by;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        if($this->id_company != null):
            $array = array(
                'id_company' => $this->id_company
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('company_information');
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
            'id_company' => $this->id_company,
            'name_company_1' => $this->name_company_1,
            'name_company_2' => $this->name_company_2,
            'address_company' => $this->address_company,
            'city_company' => $this->city_company,
            'phone_company' => $this->phone_company,
            'mail_company' => $this->mail_company,
            'working_days_company' => $this->working_days_company,
            'working_time_company' => $this->working_time_company
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('company_information', $data);
        return true;
    }
    
    public function update(){
        if($this->id_company != null):
            $array = array(
                'id_company' => $this->id_company
            );
            $this->where = $array;
        endif;
        $data = array(
            'name_company_1' => $this->name_company_1,
            'name_company_2' => $this->name_company_2,
            'address_company' => $this->address_company,
            'city_company' => $this->city_company,
            'phone_company' => $this->phone_company,
            'mail_company' => $this->mail_company,
            'working_days_company' => $this->working_days_company,
            'working_time_company' => $this->working_time_company
        );
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->update('company_information', $data);
        return true;
    }
    
    public function delete(){
        if(isset($this->id_company)):
            $array = array(
                'id_company' => $this->id_company
            );
            $this->where = $array;
        endif;
        if($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->delete('company_information');
    }    
}
