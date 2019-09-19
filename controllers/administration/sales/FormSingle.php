<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormSingle
 *
 * @author Veljko
 */
class FormSingle extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('equipment_model');
        $this->load->model('blog_model');
        $this->load->model('company_information_model');
        $this->load->model('slider_model');
        $this->load->model('text_site_model');
        $this->load->model('list_site_model');
        $this->load->model('users_model');
        $this->load->model('customers_model');
        $this->load->model('forms_model');
        $this->load->model('exchange_model');
        $this->load->model('distance_proximity_model');
    }

    public function index($id_c = null, $id_f = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        if ($id_c != null && $id_f != null):
            $where_forms = array(
                'id_form' => $id_f
            );
            $where_customer = array(
                'id_customer' => $id_c
            );

            $this->customers_model->where = $where_customer;
            $customer = $this->customers_model->select();

            $this->forms_model->where = $where_forms;
            $form = $this->forms_model->select();

            $distance_proximity = $this->distance_proximity_model->select();
            $data['distance_proximity'] = $distance_proximity;

            $data['customer'] = $customer;
            $data['form'] = $form;
        endif;

        $id_role = $this->session->userdata('id_role');

        $data['id_role'] = $id_role;
        if ($id_role == 1):
            $this->menu_model->admin = 1;
        elseif ($id_role == 2):
            $this->menu_model->user = 1;
        else:
            $this->menu_model->visitor = 1;
        endif;
        $data['menu'] = $this->menu_model->select();

        $this->load->model('menu_model', 'submenu');
        $this->submenu->where = 'parent != 0';
        $data['submenu'] = $this->submenu->select();

        $this->load->model('menu_model', 'title_page');
        $data['title_page'] = $this->title_page->select();

        $data['user'] = $this->users_model->select();

        $data['company'] = $this->company_information_model->select();

        $data['title'] = "Karton: " . $customer[0]->name_customer . ", broj reversa: " . $form[0]->number_form;
        $view = "sales/FormSingle";
        $this->load_view_admin($view, $data);
    }
}
