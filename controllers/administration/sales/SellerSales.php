<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SellerAdmin
 *
 * @author Veljko
 */
class SellerSales extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('company_information_model');
        $this->load->model('users_model');
        $this->load->model('sellers_model');
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

        $order_by_name_seller = "name_seller ASC";
        $this->sellers_model->order_by = $order_by_name_seller;
        $sellers = $this->sellers_model->select();
        $data['sellers'] = $sellers;

        $data['title'] = "Spisak poradavaca";
        $view = "sales/SellerHome";
        $this->load_view_admin($view, $data);
    }

    public function insert() {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $id_role = $this->session->userdata('id_role');

        $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
        if ($is_post):

            $button = $this->input->post('btnAdd');
            if ($button != ""):
                $name_seller = trim($this->input->post('tbNameSeller'));

                $this->load->library('form_validation');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                $this->form_validation->set_rules('tbNameSeller', 'ime prodavca', 'xss_clean|callback_name');

                if ($this->form_validation->run()):

                    //unosenje podatak u model za upis u bazu
                    $this->sellers_model->name_seller = $name_seller;

                    $result_seller = $this->sellers_model->insert();

                    if ($result_seller == true):
                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste dodali novog prodavca!</div>");
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Dodavanje nove prodavca nije uspelo!</div>");
                    endif;
                else:
                    $data_insert['name_seller'] = $name_seller;
                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                endif;
            endif;
        endif;

        $data['form_seller'] = array(
            'class' => 'form',
            'accept-charset' => 'utf-8',
            'method' => 'POST'
        );

        $data['form_name_seller'] = array(
            'name' => 'tbNameSeller',
            'id' => 'tbNameSeller',
            'value' => isset($data_insert['name_seller']) ? $data_insert['name_seller'] : '',
            'placeholder' => 'Ime prodavca'
        );
        $data['form_add_submit'] = array(
            'name' => 'btnAdd',
            'id' => 'btnAdd',
            'value' => 'Dodaj',
            'style' => 'width: 80px; font-weight: bold; padding: 7px; border-radius: 10px',
            'class' => 'btn-primary'
        );

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

        $data['title'] = "Dodavanje novog prodavca";
        $view = "sales/add-edit/AddEditSeller";
        $this->load_view_admin($view, $data);
    }

    public function edit($id = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $id_role = $this->session->userdata('id_role');

        if ($id != null):

            $where_seller = array(
                'id_seller' => $id
            );

            $this->sellers_model->where = $where_seller;
            $seller = $this->sellers_model->select();

            $data['seller'] = $seller;

            $data['form_seller'] = array(
                'class' => 'form',
                'accept-charset' => 'utf-8',
                'method' => 'POST'
            );

            $data['form_name_seller'] = array(
                'name' => 'tbNameSeller',
                'id' => 'tbNameSeller',
                'value' => $seller[0]->name_seller,
                'placeholder' => 'Ime prodavca'
            );

            $data['form_add_submit'] = array(
                'name' => 'btnEdit',
                'id' => 'btnEdit',
                'value' => 'Izmeni',
                'style' => 'width: 80px; font-weight: bold; padding: 7px; border-radius: 10px',
                'class' => 'btn-primary'
            );

            $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
            if ($is_post):

                $button = $this->input->post('btnEdit');
                if ($button != ""):
                    $name_seller = trim($this->input->post('tbNameSeller'));

                    $this->load->library('form_validation');
                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                    $this->form_validation->set_rules('tbNameSeller', 'ime prodavca', 'xss_clean|callback_name');

                    if ($this->form_validation->run()):

                        //izmena podatak u model za upis u bazu
                        $this->sellers_model->name_seller = $name_seller;

                        $result_seller = $this->sellers_model->update();

                        if ($result_seller == true):
                            $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili " . $name_seller . " prodavca!</div>");
                            redirect('administration/sales/SellerSales');
                        else:
                            $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Izmena prodavca " . $name_seller . " nije uspela!</div>");
                        endif;
                        $data_insert['name_seller'] = $name_seller;
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                        $data_insert['name_seller'] = $name_seller;
                    endif;
                    $data_insert['name_seller'] = $name_seller;

                    $data['form_seller'] = array(
                        'class' => 'form',
                        'accept-charset' => 'utf-8',
                        'method' => 'POST'
                    );

                    $data['form_name_seller'] = array(
                        'name' => 'tbNameSeller',
                        'id' => 'tbNameSeller',
                        'value' => isset($data_insert['name_seller']) ? $data_insert['name_seller'] : '',
                        'placeholder' => 'Ime radnje'
                    );
                    $data['form_add_submit'] = array(
                        'name' => 'btnEdit',
                        'id' => 'btnEdit',
                        'value' => 'Izmeni',
                        'style' => 'width: 80px; font-weight: bold; padding: 7px; border-radius: 10px',
                        'class' => 'btn-primary'
                    );
                endif;
            endif;
        endif;

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

        $data['title'] = "Izmena prodavca: " . $seller[0]->name_seller;
        $view = "sales/add-edit/AddEditSeller";
        $this->load_view_admin($view, $data);
    }

    public function delete($id_s = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        if ($id_s != null):

            $this->load->model('forms_model');
            $whereForm = array(
                'forms.id_seller' => $id_s
            );
            $this->forms_model->where = $whereForm;
            $result = $this->forms_model->select();
            if ($result != null):
                $this->session->set_flashdata('message', "<div class='alert alert-danger' style='width: 600px; text-align: center; margin:0px auto'>Prodavac je uneta u reverse! Obrišite ili izmenite prvo reverse da bi obrisali prodavca!</div>");
                redirect('administration/sales/SellerSales');
            else:
                $this->sellers_model->id_seller = $id_s;
                $this->sellers_model->delete();
                $this->session->set_flashdata('message', "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste obrisali prodavca!</div>");
                redirect('administration/sales/SellerSales');
            endif;
        endif;
    }

    public function name($str) {
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
//        $regExp = "/^\d{1,}\.\d{1,2}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('name', "<script>$(document).ready(function () { $('#tbNameSeller').css('border', '1px solid red'); $('.tbNameSellerCss').css('display', 'block'); $('.tbNameSellerCss').text('U polje za {field} nisu uneti ispravno podaci!'); });</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('name', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#tbNameSeller').css('border', '1px solid red');"
                    . "$('.tbNameSellerCss').css('display', 'block');"
                    . "$('.tbNameSellerCss').text('* Polje za {field} mora biti uneto!'); });</script>");
            return FALSE;
        endif;
    }

}
