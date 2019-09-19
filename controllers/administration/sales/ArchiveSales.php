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
class ArchiveSales extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('company_information_model');
        $this->load->model('users_model');
        $this->load->model('customers_model');
    }

    public function index() {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $order_by_name_customer = "name_customer ASC";
        $this->customers_model->order_by = $order_by_name_customer;
        $customer = $this->customers_model->select();

        $data['customers'] = $customer;

        $data['form_customer_search'] = array(
            'style' => 'width: 150px',
            'class' => 'searchArchive',
            'name' => 'tbSearch',
            'id' => 'tbSearch',
            'placeholder' => 'Karakteri za pretragu'
        );

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

        $view = "sales/ArchiveSales";
        $this->load_view_admin($view, $data);
    }

    public function searchArchive() {
        if (isset($_POST['searchArchive'])):
            $search = strtolower(trim($this->input->post('searchArchive')));

            if ($search == ""):
                $id_search = $this->customers_model->select();

                $data = '<table style="width: 98%; border: 1px solid; padding: 10px; margin: 10px 10px;">';
                $data .= '<tr class="border3">';
                $data .= '<th class="border text-alignC">Ime i prezime</th>';
                $data .= '<th class="border text-alignC">Broj Telefona</th>';
                $data .= '<th class="border text-alignC">Email</th>';
                $data .= '<th class="border text-alignC">Napomena</th>';
                $data .= '<th class="border text-alignC">Akcija</th>';
                $data .= '</tr>';
                foreach ($id_search as $c):
                    $data .= '<tr class="border text-alignC">';
                    $data .= '<td class="border">';
                    $data .= '<a href="' . base_url() . 'administration/sales/FormCustomer/index/' . $c->id_customer . '">' . $c->name_customer . '</a>';
                    $data .= '</td>';
                    $data .= '<td class="border">';
                    $data .= '<a href="' . base_url() . 'administration/sales/FormCustomer/index/' . $c->id_customer . '">' . $c->phone_customer . '</a>';
                    $data .= '</td>';
                    $data .= '<td class="border">';
                    $data .= '<a href="' . base_url() . 'administration/sales/FormCustomer/index/' . $c->id_customer . '">' . $c->email_customer . '</a>';
                    $data .= '</td>';
                    $data .= '<td class="border">';
                    $data .= '<a href="' . base_url() . 'administration/sales/FormCustomer/index/' . $c->id_customer . '">' . $c->note_customer . '</a>';
                    $data .= '</td>';
                    $data .= '<td>';
                    $data .= '<a href="' . base_url() . 'administration/sales/FormCustomer/edit/' . $c->id_customer . '">Izmeni</a>';
                    $data .= '&nbsp;|&nbsp;';
                    $data .= '<a href="' . base_url() . 'administration/sales/FormCustomer/delete/' . $c->id_customer . '">Obriši</a>';
                    $data .= '</td>';
                    $data .= '</tr>';
                endforeach;
                $data .= '</table>';
                echo json_encode($data);
            else:

                $this->load->library('form_validation');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                $this->form_validation->set_rules('searchArchive', 'pretragu', 'xss_clean|required');

                $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');

                if ($this->form_validation->run()):

                    $this->customers_model->where = "name_customer LIKE '%" . $search . "%'";
                    $order_by_date = "name_customer ASC";
                    $id_search = $this->customers_model->select();

                    if ($id_search == true):

                        $data = '<table style="width: 98%; border: 1px solid; padding: 10px; margin: 10px 10px;">';
                        $data .= '<tr class="border3">';
                        $data .= '<th class="border text-alignC">Ime i prezime</th>';
                        $data .= '<th class="border text-alignC">Broj Telefona</th>';
                        $data .= '<th class="border text-alignC">Email</th>';
                        $data .= '<th class="border text-alignC">Napomena</th>';
                        $data .= '<th class="border text-alignC">Akcija</th>';
                        $data .= '</tr>';
                        foreach ($id_search as $c):
                            if ($c->id_customer != 1):
                                $data .= '<tr class="border text-alignC">';
                                $data .= '<td class="border">';
                                $data .= '<a href="' . base_url() . 'administration/sales/FormCustomer/index/' . $c->id_customer . '">' . $c->name_customer . '</a>';
                                $data .= '</td>';
                                $data .= '<td class="border">';
                                $data .= '<a href="' . base_url() . 'administration/sales/FormCustomer/index/' . $c->id_customer . '">' . $c->phone_customer . '</a>';
                                $data .= '</td>';
                                $data .= '<td class="border">';
                                $data .= '<a href="' . base_url() . 'administration/sales/FormCustomer/index/' . $c->id_customer . '">' . $c->email_customer . '</a>';
                                $data .= '</td>';
                                $data .= '<td class="border">';
                                $data .= '<a href="' . base_url() . 'administration/sales/FormCustomer/index/' . $c->id_customer . '">' . $c->note_customer . '</a>';
                                $data .= '</td>';
                                $data .= '<td>';
                                $data .= '<a href="' . base_url() . 'administration/sales/FormCustomer/edit/' . $c->id_customer . '">Izmeni</a>';
                                $data .= '&nbsp;|&nbsp;';
                                $data .= '<a href="' . base_url() . 'administration/sales/FormCustomer/delete/' . $c->id_customer . '">Obriši</a>';
                                $data .= '</td>';
                                $data .= '</tr>';
                            endif;
                        endforeach;
                        $data .= '</table>';
                        echo json_encode($data);
                    else:
                        $data = '<table style="width: 98%; padding: 10px; margin: 10px 10px;">';
                        $data .= '<tr class="border3">';
                        $data .= '<th class="border text-alignC">Ime i prezime</th>';
                        $data .= '<th class="border text-alignC">Broj Telefona</th>';
                        $data .= '<th class="border text-alignC">Email</th>';
                        $data .= '<th class="border text-alignC">Napomena</th>';
                        $data .= '<th class="border text-alignC">Akcija</th>';
                        $data .= '</tr>';
                        $data .= '</table>';
                        $data .= "<div class='alert text-alignC alert-danger' style='width: 600px; text-align: center; margin: 0px auto'>Ne postoji kupac pod imenom " . $search . " koji ste pokušali da pretražite!</div>";
                        echo json_encode($data);
                    endif;
                else:
                endif;
            endif;
        endif;
    }

}
