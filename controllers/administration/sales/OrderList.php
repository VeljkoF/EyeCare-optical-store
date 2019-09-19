<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArchiveAdmin
 *
 * @author Veljko
 */
class OrderList extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('company_information_model');
        $this->load->model('users_model');
        $this->load->model('customers_model');
        $this->load->model('order_lists_model');
        $this->load->model('order_status_model');
    }

    public function index() {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $order_by_id_order_list = "order_lists.id_order_status ASC";
        $where_id_order_list = "order_lists.id_order_status = 1 OR order_lists.id_order_status = 2 OR order_lists.id_order_status = 3";

        $this->order_lists_model->order_by = $order_by_id_order_list;
        $this->order_lists_model->where = $where_id_order_list;
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

        $data['title'] = "Spisak kartona";

        $view = "sales/OrderListHome";
        $this->load_view_admin($view, $data);
    }

    public function statusChange($id = null) {
        if ($id != null):
            if (empty($this->session->userdata('id_role'))):
                redirect('Home');
            endif;

            $order_by_id_status = "order_lists.id_order_status ASC";
            $where_id_order_list = "order_lists.id_order_list = " . $id;

            $this->order_lists_model->order_by = $order_by_id_status;
            $this->order_lists_model->where = $where_id_order_list;
            $order_list = $this->order_lists_model->select();
            $data['order_list'] = $order_list;

            $order_by_order_status = "name_order_status ASC";
            $this->order_status_model->order_by = $order_by_order_status;
            $data['order_status'] = $this->order_status_model->select();

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

            $data['title'] = "Spisak kartona";

            $view = "sales/OrderListHomeStatus";
            $this->load_view_admin($view, $data);
        else:
            echo "<script language='JavaScript'> window.location='" . base_url() . "administration/sales/OrderList'</script>";
        endif;
    }

    public function oneStatusChange() {
        $idStatus = $_POST['idStatus'];
        $idOrderList = $_POST['idOrderList'];
        $emailOrderList = $_POST['emailOrderList'];

        $where_id_order_list = "order_lists.id_order_list = " . $idOrderList;

        $this->order_lists_model->where = $where_id_order_list;
        $order_list = $this->order_lists_model->select();

        $this->load->model('order_lists_model', 'lists_order_model');
        $this->lists_order_model->date_order_list = $order_list[0]->date_order_list;
        $this->lists_order_model->id_form = $order_list[0]->id_form;
        $this->lists_order_model->note_order_list = $order_list[0]->note_order_list;
        $this->lists_order_model->id_pricelist_lens_right = $order_list[0]->id_pricelist_lens_right;
        $this->lists_order_model->id_pricelist_lens_left = $order_list[0]->id_pricelist_lens_left;
        $this->lists_order_model->id_order_status = $idStatus;
        $this->lists_order_model->id_right_left = $order_list[0]->id_right_left;
        $where_idOrderList = "order_lists.id_order_list = " . $idOrderList;
        $this->lists_order_model->where = $where_idOrderList;
        $order_list = $this->lists_order_model->update();


        //slanje maila kupcu
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->order_lists_model->id_order_list = $idOrderList;
        $new_order = $this->order_lists_model->select();
        $company_information = $this->company_information_model->select();
        $code = $new_order[0]->date_order_list * $new_order[0]->id_form;

        if ($new_order[0]->email_customer != NULL):
            $this->email->from('office.eye.care@mms.in.rs', 'EyeCare Optical');
            $this->email->to($new_order[0]->email_customer);

            $this->email->subject('Promena statusa vaša porudžbina ' . $new_order[0]->id_order_list . ' u optici ' . $company_information[0]->name_company_1 . $company_information[0]->name_company_2);
            $this->email->message('<hmtl><body><h1 style="text-decoration: none;"><a class="navbar-brand1" href="' . base_url() . '">' . $company_information[0]->name_company_1 . '</a><a class="navbar-brand1" href=" ' . base_url() . '">' . $company_information[0]->name_company_2 . ' optika</a></h1><hr><p>Poštovani, ' . $new_order[0]->name_customer . '</p><p>Ovim mail Vas obaveštavamo da je status vaša porudžbina promenjen u <b>' . $new_order[0]->name_order_status . '</b>. Za sve dodatne izmene bićete ovim putem obavešteni. Ukoliko imate neke nedoumice slobodno nas možete kontaktirati na naš broj telefona ili mail adresu.</p><p>Klikom na ovaj link: </p><p><a href="' . base_url() . 'home/index/' . $new_order[0]->id_order_list . '/' . $code . '">Proverite vaš status porudžbine</a></p><hr><footer><p>S poštovanjem,</p><p>Vaša optika EyeCare</p><footer><p>S poštovanjem,</p><p>Vaša optika ' . $company_information[0]->name_company_1 . " " . $company_information[0]->name_company_2 . '</p><p>Adresa: ' . $company_information[0]->address_company . ', ' . $company_information[0]->city_company . '</p><p>Telefon: ' . $company_information[0]->phone_company . '</p><p>Email: ' . $company_information[0]->mail_company . '</p><p>Radno vreme: ' . $company_information[0]->working_days_company . ', ' . $company_information[0]->working_time_company . '</p></footer></body></html>');

            $this->email->send();
        endif;

        echo json_encode($order_list);
    }

}
