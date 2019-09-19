<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of type_lenses_model
 *
 * @author Veljko
 */
class Ranges_dioptre_lenses_model extends CI_Model {

    public $id_range_dioptre_lens;
    public $id_min_sph_range_dioptre_lens;
    public $id_max_sph_range_dioptre_lens;
    public $cyl_range_dioptre_lens;
    public $add_range_dioptre_lens;
    public $where;
    public $order_by;
    public $group_by;

    public function __construct() {
        parent::__construct();
    }

    public function select() {
        if ($this->id_range_dioptre_lens != null):
            $array = array(
                'id_range_dioptre_lens' => $this->id_range_dioptre_lens
            );
            $this->where = $array;
        endif;
        $this->db->select('*');
        $this->db->from('ranges_dioptre_lenses');
        $this->db->join('sph_range_dioptre_lenses as min', 'ranges_dioptre_lenses.id_min_sph_range_dioptre_lens = min.id_sph_range_dioptre_lens', 'left');
        $this->db->join('sph_range_dioptre_lenses as max', 'ranges_dioptre_lenses.id_max_sph_range_dioptre_lens = max.id_sph_range_dioptre_lens', 'left');
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        if ($this->order_by != null):
            $this->db->order_by($this->order_by);
        endif;
        return $this->db->get()->result();
    }

    public function select_distinct() {
        if ($this->group_by != null):
            $this->db->select('*');
            $this->db->from('ranges_dioptre_lenses');
            $this->db->group_by($this->group_by);
        endif;
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
            'id_range_dioptre_lens' => $this->id_range_dioptre_lens,
            'id_min_sph_range_dioptre_lens' => $this->id_min_sph_range_dioptre_lens,
            'id_max_sph_range_dioptre_lens' => $this->id_max_sph_range_dioptre_lens,
            'cyl_range_dioptre_lens' => $this->cyl_range_dioptre_lens,
            'add_range_dioptre_lens' => $this->add_range_dioptre_lens
        );
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        $this->db->insert('ranges_dioptre_lenses', $data);
        return true;
    }

    public function update() {
        if ($this->id_range_dioptre_lens != null):
            $array = array(
                'id_range_dioptre_lens' => $this->id_range_dioptre_lens
            );
            $this->where = $array;
        endif;
        $data = array(
            'id_min_sph_range_dioptre_lens' => $this->id_min_sph_range_dioptre_lens,
            'id_max_sph_range_dioptre_lens' => $this->id_max_sph_range_dioptre_lens,
            'cyl_range_dioptre_lens' => $this->cyl_range_dioptre_lens,
            'add_range_dioptre_lens' => $this->add_range_dioptre_lens
        );
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->update('ranges_dioptre_lenses', $data);
        //return true;
    }

    public function delete() {
        if (isset($this->id_range_dioptre_lens)):
            $array = array(
                'id_range_dioptre_lens' => $this->id_range_dioptre_lens
            );
            $this->where = $array;
        endif;
        if ($this->where != null):
            $this->db->where($this->where);
        endif;
        return $this->db->delete('ranges_dioptre_lenses');
    }

}
