<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeLensesAdmin
 *
 * @author Veljko
 */
class ProducerLensSales extends MY_Controller {

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
        $this->load->model('sellers_model');
        $this->load->model('producers_lenses_model');
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

        $producer_lens = $this->producers_lenses_model->select();
        $data['producer_lens'] = $producer_lens;

        $data['title'] = "Proizvođač sočiva";
        $view = "sales/ProducerLensHome";
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
                $name_producer_lens = trim($this->input->post('tbNameProducerLens'));
                $address_producer_lens = trim($this->input->post('tbAddressProducerLens'));
                $city_producer_lens = trim($this->input->post('tbCityProducerLens'));
                $state_producer_lens = trim($this->input->post('tbStateProducerLens'));
                $phone_producer_lens = trim($this->input->post('tbPhoneProducerLens'));
                $email_producer_lens = trim($this->input->post('tbEmailProducerLens'));

                $this->load->library('form_validation');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                $this->form_validation->set_rules('tbNameProducerLens', 'ime proizvođača', 'xss_clean|callback_name');
                $this->form_validation->set_rules('tbAddressProducerLens', 'addresa proizvođača', 'xss_clean|callback_address');
                $this->form_validation->set_rules('tbCityProducerLens', 'grad proizvođača', 'xss_clean|callback_city');
                $this->form_validation->set_rules('tbStateProducerLens', 'država proizvođača', 'xss_clean|callback_state');
                $this->form_validation->set_rules('tbPhoneProducerLens', 'brij telefon proizvođača', 'xss_clean|callback_phone');
                $this->form_validation->set_rules('tbEmailProducerLens', 'email proizvođača', 'xss_clean|callback_mail');

                if ($this->form_validation->run()):

                    //unosenje podatak u model za upis u bazu
                    $this->producers_lenses_model->name_producer_lens = $name_producer_lens;
                    $this->producers_lenses_model->address_producer_lens = $address_producer_lens;
                    $this->producers_lenses_model->city_producer_lens = $city_producer_lens;
                    $this->producers_lenses_model->state_producer_lens = $state_producer_lens;
                    $this->producers_lenses_model->phone_producer_lens = $phone_producer_lens;
                    $this->producers_lenses_model->email_producer_lens = $email_producer_lens;

                    $result_producer_lens = $this->producers_lenses_model->insert();

                    if ($result_producer_lens != ""):
                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste dodali novog proizvođača!</div>");
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Dodavanje novog proizvođača nije uspelo!</div>");
                    endif;
                else:
                    $data_insert['name_producer_lens'] = $name_producer_lens;
                    $data_insert['address_producer_lens'] = $address_producer_lens;
                    $data_insert['city_producer_lens'] = $city_producer_lens;
                    $data_insert['state_producer_lens'] = $state_producer_lens;
                    $data_insert['phone_producer_lens'] = $phone_producer_lens;
                    $data_insert['email_producer_lens'] = $email_producer_lens;

                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                endif;
            endif;
        endif;

        $data['form_producer_lens'] = array(
            'class' => 'form',
            'accept-charset' => 'utf-8',
            'method' => 'POST'
        );

        $data['form_name_producer_lens'] = array(
            'name' => 'tbNameProducerLens',
            'id' => 'tbNameProducerLens',
            'value' => isset($data_insert['name_producer_lens']) ? $data_insert['name_producer_lens'] : '',
            'placeholder' => 'Ime proizvođača'
        );

        $data['form_address_producer_lens'] = array(
            'name' => 'tbAddressProducerLens',
            'id' => 'tbAddressProducerLens',
            'value' => isset($data_insert['address_producer_lens']) ? $data_insert['address_producer_lens'] : '',
            'placeholder' => 'Adresa proizvođača'
        );

        $data['form_city_producer_lens'] = array(
            'name' => 'tbCityProducerLens',
            'id' => 'tbCityProducerLens',
            'value' => isset($data_insert['city_producer_lens']) ? $data_insert['city_producer_lens'] : '',
            'placeholder' => 'Grad proizvođača'
        );

        $data['form_state_producer_lens'] = array(
            'name' => 'tbStateProducerLens',
            'id' => 'tbStateProducerLens',
            'value' => isset($data_insert['state_producer_lens']) ? $data_insert['state_producer_lens'] : '',
            'placeholder' => 'Država proizvođača'
        );

        $data['form_phone_producer_lens'] = array(
            'name' => 'tbPhoneProducerLens',
            'id' => 'tbPhoneProducerLens',
            'value' => isset($data_insert['phone_producer_lens']) ? $data_insert['phone_producer_lens'] : '',
            'placeholder' => 'Telefon proizvođača'
        );
        $data['form_email_producer_lens'] = array(
            'name' => 'tbEmailProducerLens',
            'id' => 'tbEmailProducerLens',
            'value' => isset($data_insert['email_producer_lens']) ? $data_insert['email_producer_lens'] : '',
            'placeholder' => 'Email proizvođača'
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

        $data['title'] = "Dodavanje novog proizvođača";
        $view = "sales/add-edit/AddEditProducerLens";
        $this->load_view_admin($view, $data);
    }

    public function edit($id = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        if ($id != null):

            $where_producer_lens = array(
                'id_producer_lens' => $id
            );

            $this->producers_lenses_model->where = $where_producer_lens;
            $producers_lenses = $this->producers_lenses_model->select();

            $data['producers_lenses'] = $producers_lenses;

            $data['form_producer_lens'] = array(
                'class' => 'form',
                'accept-charset' => 'utf-8',
                'method' => 'POST'
            );

            $data['form_name_producer_lens'] = array(
                'name' => 'tbNameProducerLens',
                'id' => 'tbNameProducerLens',
                'value' => $producers_lenses[0]->name_producer_lens,
                'placeholder' => 'Ime proizvođača'
            );

            $data['form_address_producer_lens'] = array(
                'name' => 'tbAddressProducerLens',
                'id' => 'tbAddressProducerLens',
                'value' => $producers_lenses[0]->address_producer_lens,
                'placeholder' => 'Adresa proizvođača'
            );

            $data['form_city_producer_lens'] = array(
                'name' => 'tbCityProducerLens',
                'id' => 'tbCityProducerLens',
                'value' => $producers_lenses[0]->city_producer_lens,
                'placeholder' => 'Grad proizvođača'
            );

            $data['form_state_producer_lens'] = array(
                'name' => 'tbStateProducerLens',
                'id' => 'tbStateProducerLens',
                'value' => $producers_lenses[0]->state_producer_lens,
                'placeholder' => 'Država proizvođača'
            );

            $data['form_phone_producer_lens'] = array(
                'name' => 'tbPhoneProducerLens',
                'id' => 'tbPhoneProducerLens',
                'value' => $producers_lenses[0]->phone_producer_lens,
                'placeholder' => 'Telefon proizvođača'
            );
            $data['form_email_producer_lens'] = array(
                'name' => 'tbEmailProducerLens',
                'id' => 'tbEmailProducerLens',
                'value' => $producers_lenses[0]->email_producer_lens,
                'placeholder' => 'Email proizvođača'
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
                    $name_producer_lens = trim($this->input->post('tbNameProducerLens'));
                    $address_producer_lens = trim($this->input->post('tbAddressProducerLens'));
                    $city_producer_lens = trim($this->input->post('tbCityProducerLens'));
                    $state_producer_lens = trim($this->input->post('tbStateProducerLens'));
                    $phone_producer_lens = trim($this->input->post('tbPhoneProducerLens'));
                    $email_producer_lens = trim($this->input->post('tbEmailProducerLens'));

                    $this->load->library('form_validation');
                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                    $this->form_validation->set_rules('tbNameProducerLens', 'ime proizvođača', 'xss_clean|callback_name');
                    $this->form_validation->set_rules('tbAddressProducerLens', 'adresa proizvođača', 'xss_clean|callback_address');
                    $this->form_validation->set_rules('tbCityProducerLens', 'grad proizvođača', 'xss_clean|callback_city');
                    $this->form_validation->set_rules('tbStateProducerLens', 'država proizvođača', 'xss_clean|callback_state');
                    $this->form_validation->set_rules('tbPhoneProducerLens', 'brij telefona proizvođača', 'xss_clean|callback_phone');
                    $this->form_validation->set_rules('tbEmailProducerLens', 'email proizvođača', 'xss_clean|callback_mail');

                    if ($this->form_validation->run()):

                        //unosenje podatak u model za upis u bazu
                        $this->producers_lenses_model->name_producer_lens = $name_producer_lens;
                        $this->producers_lenses_model->address_producer_lens = $address_producer_lens;
                        $this->producers_lenses_model->city_producer_lens = $city_producer_lens;
                        $this->producers_lenses_model->state_producer_lens = $state_producer_lens;
                        $this->producers_lenses_model->phone_producer_lens = $phone_producer_lens;
                        $this->producers_lenses_model->email_producer_lens = $email_producer_lens;

                        $result_producer_lens = $this->producers_lenses_model->update();

                        if ($result_producer_lens == true):
                            $data['message'] = "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili proizvođača: " . $name_producer_lens . " !</div>";
                            $data_insert['name_producer_lens'] = $name_producer_lens;
                            $data_insert['address_producer_lens'] = $address_producer_lens;
                            $data_insert['city_producer_lens'] = $city_producer_lens;
                            $data_insert['state_producer_lens'] = $state_producer_lens;
                            $data_insert['phone_producer_lens'] = $phone_producer_lens;
                            $data_insert['email_producer_lens'] = $email_producer_lens;

                            $data['form_producer_lens'] = array(
                                'class' => 'form',
                                'accept-charset' => 'utf-8',
                                'method' => 'POST'
                            );

                            $data['form_name_producer_lens'] = array(
                                'name' => 'tbNameProducerLens',
                                'id' => 'tbNameProducerLens',
                                'value' => isset($data_insert['name_producer_lens']) ? $data_insert['name_producer_lens'] : '',
                                'placeholder' => 'Ime proizvođača'
                            );

                            $data['form_address_producer_lens'] = array(
                                'name' => 'tbAddressProducerLens',
                                'id' => 'tbAddressProducerLens',
                                'value' => isset($data_insert['address_producer_lens']) ? $data_insert['address_producer_lens'] : '',
                                'placeholder' => 'Adresa proizvođača'
                            );

                            $data['form_city_producer_lens'] = array(
                                'name' => 'tbCityProducerLens',
                                'id' => 'tbCityProducerLens',
                                'value' => isset($data_insert['city_producer_lens']) ? $data_insert['city_producer_lens'] : '',
                                'placeholder' => 'Grad proizvođača'
                            );

                            $data['form_state_producer_lens'] = array(
                                'name' => 'tbStateProducerLens',
                                'id' => 'tbStateProducerLens',
                                'value' => isset($data_insert['state_producer_lens']) ? $data_insert['state_producer_lens'] : '',
                                'placeholder' => 'Država proizvođača'
                            );

                            $data['form_phone_producer_lens'] = array(
                                'name' => 'tbPhoneProducerLens',
                                'id' => 'tbPhoneProducerLens',
                                'value' => isset($data_insert['phone_producer_lens']) ? $data_insert['phone_producer_lens'] : '',
                                'placeholder' => 'Telefon proizvođača'
                            );
                            $data['form_email_producer_lens'] = array(
                                'name' => 'tbEmailProducerLens',
                                'id' => 'tbEmailProducerLens',
                                'value' => isset($data_insert['email_producer_lens']) ? $data_insert['email_producer_lens'] : '',
                                'placeholder' => 'Email proizvođača'
                            );

                            $data['form_add_submit'] = array(
                                'name' => 'btnEdit',
                                'id' => 'btnEdit',
                                'value' => 'Izmeni',
                                'style' => 'width: 80px; font-weight: bold; padding: 7px; border-radius: 10px',
                                'class' => 'btn-primary'
                            );

                        else:
                            $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px'; text-align: center; margin:0px auto>Izmena proizvođača " . $name_producer_lens . " nije uspelo!</div>");
                            $data_insert['name_producer_lens'] = $name_producer_lens;
                            $data_insert['address_producer_lens'] = $address_producer_lens;
                            $data_insert['city_producer_lens'] = $city_producer_lens;
                            $data_insert['state_producer_lens'] = $state_producer_lens;
                            $data_insert['phone_producer_lens'] = $phone_producer_lens;
                            $data_insert['email_producer_lens'] = $email_producer_lens;

                        endif;
                    else:
                        $data_insert['name_producer_lens'] = $name_producer_lens;
                        $data_insert['address_producer_lens'] = $address_producer_lens;
                        $data_insert['city_producer_lens'] = $city_producer_lens;
                        $data_insert['state_producer_lens'] = $state_producer_lens;
                        $data_insert['phone_producer_lens'] = $phone_producer_lens;
                        $data_insert['email_producer_lens'] = $email_producer_lens;

                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                    endif;
                endif;
            endif;
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

        $data['title'] = "Izmena proizvođača: " . $producers_lenses[0]->name_producer_lens;
        $view = "sales/add-edit/AddEditProducerLens";
        $this->load_view_admin($view, $data);
    }

    public function delete($id_p = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        if ($id_p != null):
            $this->load->model('pricelist_lenses_model');
            $wherePriceListLens = array(
                'pricelist_lenses.id_producer_lens' => $id_p
            );
            $this->pricelist_lenses_model->where = $wherePriceListLens;
            $result = $this->pricelist_lenses_model->select();
            if ($result != null):
                $this->session->set_flashdata('message', "<div class='alert alert-danger' style='width: 600px; text-align: center; margin:0px auto'>Proizvođač sočiva je unet u cenovnik! Izbrišite porizvođača sočiva iz cenovnika pa onda obrišite porizvođača sočiva!</div>");
                redirect('administration/sales/ProducerLensSales');
            else:

                $this->producers_lenses_model->id_producer_lens = $id_p;
                $result = $this->producers_lenses_model->delete();
                if ($result == true):
                    $this->session->set_flashdata('message', "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste obrisali proizvođača sočiva!</div>");
                    redirect('administration/sales/ProducerLensSales');
                else:
                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Niste obrisali proizvođača sočiva!</div>");
                    redirect('administration/sales/ProducerLensSales');
                endif;
            endif;
        else:
            redirect('administration/sales/ProducerLensSales');
        endif;
    }

    public function name($str) {
//        $regExp = "/^\d{1,}$/";
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('name', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbNameProducerLens').css('border', '1px solid red');"
                        . "$('.tbNameProducerLensCss').css('display', 'block');"
                        . "$('.tbNameProducerLensCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('name', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#tbNameProducerLens').css('border', '1px solid red');"
                    . "$('.tbNameProducerLensCss').css('display', 'block');"
                    . "$('.tbNameProducerLensCss').text('* Polje za {field} mora biti uneto!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        endif;
    }

    public function address($str) {
//        $regExp = "/^\d{1,}$/";
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('address', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbAddressProducerLens').css('border', '1px solid red');"
                        . "$('.tbAddressProducerLensCss').css('display', 'block');"
                        . "$('.tbAddressProducerLensCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('address', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#tbAddressProducerLens').css('border', '1px solid red');"
                    . "$('.tbAddressProducerLensCss').css('display', 'block');"
                    . "$('.tbAddressProducerLensCss').text('* Polje za {field} mora biti uneto!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        endif;
    }

    public function city($str) {
//        $regExp = "/^\d{1,}$/";
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('city', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbCityProducerLens').css('border', '1px solid red');"
                        . "$('.tbCityProducerLensCss').css('display', 'block');"
                        . "$('.tbCityProducerLensCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('city', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#tbCityProducerLens').css('border', '1px solid red');"
                    . "$('.tbCityProducerLensCss').css('display', 'block');"
                    . "$('.tbCityProducerLensCss').text('* Polje za {field} mora biti uneto!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        endif;
    }

    public function state($str) {
//        $regExp = "/^\d{1,}$/";
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('state', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbStateProducerLens').css('border', '1px solid red');"
                        . "$('.tbStateProducerLensCss').css('display', 'block');"
                        . "$('.tbStateProducerLensCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('state', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#tbStateProducerLens').css('border', '1px solid red');"
                    . "$('.tbStateProducerLensCss').css('display', 'block');"
                    . "$('.tbStateProducerLensCss').text('* Polje za {field} mora biti uneto!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        endif;
    }

    public function phone($str) {
        $regExp = "/^[+]?[\d]{11,12}$/";
//        $regExp = "/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('phone', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbPhoneProducerLens').css('border', '1px solid red');"
                        . "$('.tbPhoneProducerLensCss').css('display', 'block');"
                        . "$('.tbPhoneProducerLensCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('phone', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#tbPhoneProducerLens').css('border', '1px solid red');"
                    . "$('.tbPhoneProducerLensCss').css('display', 'block');"
                    . "$('.tbPhoneProducerLensCss').text('* Polje za {field} mora biti uneto!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        endif;
    }

    public function mail($str) {
//        $regExp = "/^\d{1,}$/";
        $regExp = "/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('mail', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbEmailProducerLens').css('border', '1px solid red');"
                        . "$('.tbEmailProducerLensCss').css('display', 'block');"
                        . "$('.tbEmailProducerLensCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('mail', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#tbEmailProducerLens').css('border', '1px solid red');"
                    . "$('.tbEmailProducerLensCss').css('display', 'block');"
                    . "$('.tbEmailProducerLensCss').text('* Polje za {field} mora biti uneto!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        endif;
    }

}
