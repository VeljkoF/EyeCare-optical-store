<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EndOrder
 *
 * @author Veljko
 */
class EndOrderList extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('company_information_model');
        $this->load->model('users_model');
        $this->load->model('customers_model');
        $this->load->model('order_lists_model');
    }

    public function index() {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $order_by_id_status = "order_lists.id_order_status ASC";
        $where_id_order_status = "order_lists.id_order_status = 4";

        $this->order_lists_model->order_by = $order_by_id_status;
        $this->order_lists_model->where = $where_id_order_status;
        $order_list = $this->order_lists_model->select();
        $data['order_list'] = $order_list;

        $order_by_name_customer = "name_customer ASC";
        $this->customers_model->order_by = $order_by_name_customer;
        $customer = $this->customers_model->select();

        $data['customers'] = $customer;

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

        $data['company'] = $this->company_information_model->select();

        $data['title'] = "Spisak zavrsenih porudžbina";

        $view = "sales/EndOrderListHome";
        $this->load_view_admin($view, $data);
    }

}
