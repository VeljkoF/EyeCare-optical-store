<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExchangeAdmin
 *
 * @author Veljko
 */
class ExchangeSales extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('company_information_model');
        $this->load->model('users_model');
        $this->load->model('exchange_model');
    }

    public function index() {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
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

        $order_by_amount_exchange = "amount_exchange ASC";
        $this->exchange_model->order_by = $order_by_amount_exchange;
        $exchange = $this->exchange_model->select();
        $data['exchange'] = $exchange;

        $data['title'] = "Spisak kursa evra";
        $view = "sales/ExchangeHome";
        $this->load_view_admin($view, $data);
    }

    public function insert() {
        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
        if ($is_post):

            $button = $this->input->post('btnAdd');
            if ($button != ""):
                $amount_exchange = trim($this->input->post('tbExchengeAmount'));

                $this->load->library('form_validation');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                $this->form_validation->set_rules('tbExchengeAmount', 'kurs \u20ac', 'xss_clean|callback_amount');

                if ($this->form_validation->run()):

                    //unosenje podatak u model za upis u bazu
                    $this->exchange_model->amount_exchange = $amount_exchange;
                    $this->exchange_model->default_amount_exchange = 0;

                    $id_amount = $this->exchange_model->insert();

                    if ($id_amount != ""):
                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste dodali nov kurs \u20ac!</div>");
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Dodavanje novog kursa \u20ac nije uspelo!</div>");
                    endif;
                else:
                    $data_insert['amount_exchange'] = $amount_exchange;
                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                endif;
            endif;
        endif;

        $data['form_exchange'] = array(
            'class' => 'form',
            'accept-charset' => 'utf-8',
            'method' => 'POST',
            'id' => 'form_exchange'
        );

        $data['form_amount_exchange'] = array(
            'name' => 'tbExchengeAmount',
            'id' => 'tbExchengeAmount',
            'placeholder' => 'Iznos kursa '
        );
        $data['form_add_submit'] = array(
            'name' => 'btnAdd',
            'id' => 'btnAdd',
            'value' => 'Dodaj',
            'style' => 'width: 80px; font-weight: bold; padding: 7px; border-radius: 10px',
            'class' => 'btn-primary'
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

        $data['user'] = $this->users_model->select();

        $data['company'] = $this->company_information_model->select();

        $data['title'] = "Dodavanje novog kursa";
        $view = "sales/add-edit/AddEditExchange";
        $this->load_view_admin($view, $data);
    }

    public function delete($id = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        if ($id != null):

            $this->load->model('forms_model');
            $whereForm = array(
                'forms.id_exchange' => $id
            );
            $this->forms_model->where = $whereForm;
            $result = $this->forms_model->select();
            if ($result != null):
                $this->session->set_flashdata('message', "<div class='alert alert-danger' style='width: 600px; text-align: center; margin:0px auto'>Kurs evra je uneta u reverse! Obrišite ili izmenite prvo reverse da bi obrisali kurs evra!</div>");
                redirect('administration/sales/ExchangeSales');
            else:
                $this->exchange_model->id_exchange = $id;
                $this->exchange_model->delete();
                $this->session->set_flashdata('message', "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste obrisali kurs evra!</div>");
                redirect('administration/sales/ExchangeSales');
            endif;
        endif;
    }

    public function changeDefualtAmountExchange() {

        $data['true'] = false;
        $defaultAmountExchange = $this->input->post('defaultAmountExchange');

        $this->exchange_model->default_amount_exchange = 0;
        $result_0 = $this->exchange_model->update();

        if ($result_0):
            $this->exchange_model->id_exchange = $defaultAmountExchange;
            $this->exchange_model->default_amount_exchange = 1;
            $result_1 = $this->exchange_model->update();
            if ($result_1):
                $data['true'] = true;
            endif;
        endif;

        echo json_encode($data);
    }

    public function amount($str) {
        $regExp = "/^\d{1,}$/";
//        $regExp = "/^\d{1,}\.\d{1,2}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('amount', "<script>$(document).ready(function () { $('#tbExchengeAmount').css('border', '1px solid red'); $('.tbExchengeAmountCss').css('display', 'block'); $('.tbExchengeAmountCss').text('U polje za {field} nisu uneti ispravno podaci!'); });</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('amount', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#tbExchengeAmount').css('border', '1px solid red');"
                    . "$('.tbExchengeAmountCss').css('display', 'block');"
                    . "$('.tbExchengeAmountCss').text('* Polje za {field} mora biti uneto!'); });</script>");
            return FALSE;
        endif;
    }

}
