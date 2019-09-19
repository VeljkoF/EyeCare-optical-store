<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompanyAdmin
 *
 * @author Veljko
 */
class CompanyAdmin extends MY_Controller {

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
    }

    function index() {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;
        
        $id_role = $this->session->userdata('id_role');

        $company = $this->company_information_model->select();
        $data['company'] = $this->company_information_model->select();

        $data['form_company_information'] = array(
            'class' => 'form-group'
        );
        $data['form_name_company_1'] = array(
            'class' => 'size tbNameCompany1',
            'name' => 'tbNameCompany1',
            'value' => $company[0]->name_company_1,
            'id' => 'tbNameCompany1',
            'placeholder' => 'Deo imena preduzeća'
        );
        $data['form_name_company_2'] = array(
            'class' => 'size tbNameCompany2',
            'name' => 'tbNameCompany2',
            'value' => $company[0]->name_company_2,
            'id' => 'tbNameCompany2',
            'placeholder' => 'Deo imena preduzeća'
        );
        $data['form_address_company'] = array(
            'class' => 'size tbAddressCompany',
            'name' => 'tbAddressCompany',
            'value' => $company[0]->address_company,
            'id' => 'tbAddressCompany',
            'placeholder' => 'Adresa preduzeća'
        );
        $data['form_city_company'] = array(
            'class' => 'size tbCityCompany',
            'name' => 'tbCityCompany',
            'value' => $company[0]->city_company,
            'id' => 'tbCityCompany',
            'placeholder' => 'Grad preduzeća'
        );
        $data['form_phone_company'] = array(
            'class' => 'size tbPhoneCompany',
            'name' => 'tbPhoneCompany',
            'value' => $company[0]->phone_company,
            'id' => 'tbPhoneCompany',
            'placeholder' => 'Telefon preduzeća'
        );
        $data['form_mail_company'] = array(
            'class' => 'size tbMailCompany',
            'name' => 'tbMailCompany',
            'value' => $company[0]->mail_company,
            'id' => 'tbMailCompany',
            'placeholder' => 'Mail preduzeća'
        );
        $data['form_working_days_company'] = array(
            'class' => 'size tbWorkingDaysCompany',
            'name' => 'tbWorkingDaysCompany',
            'value' => $company[0]->working_days_company,
            'id' => 'tbWorkingDaysCompany',
            'placeholder' => 'Radni dani preduzeća'
        );
        $data['form_working_time_company'] = array(
            'class' => 'size tbWorkingTimeCompany',
            'name' => 'tbWorkingTimeCompany',
            'value' => $company[0]->working_time_company,
            'id' => 'tbWorkingTimeCompany',
            'placeholder' => 'Radni vreme preduzeća'
        );
        $data['form_update_company_information'] = array(
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
                $name_company_1 = trim($this->input->post('tbNameCompany1'));
                $name_company_2 = trim($this->input->post('tbNameCompany2'));
                $address_company = trim($this->input->post('tbAddressCompany'));
                $city_company = trim($this->input->post('tbCityCompany'));
                $phone_company = trim($this->input->post('tbPhoneCompany'));
                $mail_company = trim($this->input->post('tbMailCompany'));
                $working_days_company = trim($this->input->post('tbWorkingDaysCompany'));
                $working_time_company = trim($this->input->post('tbWorkingTimeCompany'));

                $this->load->library('form_validation');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                $this->form_validation->set_rules('tbNameCompany1', 'ime preduzeća 1', 'xss_clean|required|callback_name1_name2_addresse_city_day_time');
                $this->form_validation->set_rules('tbNameCompany2', 'ime preduzeća 2', 'xss_clean|required|callback_name1_name2_addresse_city_day_time');
                $this->form_validation->set_rules('tbAddressCompany', 'adresa preduzeća', 'xss_clean|required|callback_name1_name2_addresse_city_day_time');
                $this->form_validation->set_rules('tbCityCompany', 'grad preduzeća', 'xss_clean|required|callback_name1_name2_addresse_city_day_time');
                $this->form_validation->set_rules('tbPhoneCompany', 'telefon preduzeća', 'xss_clean|required|callback_phone');
                $this->form_validation->set_rules('tbMailCompany', 'mail preduzeća', 'xss_clean|required');
                $this->form_validation->set_rules('tbWorkingDaysCompany', 'radni dani preduzeća', 'xss_clean|required|callback_name1_name2_addresse_city_day_time');
                $this->form_validation->set_rules('tbWorkingTimeCompany', 'radno vreme preduzeća', 'xss_clean|required|callback_name1_name2_addresse_city_day_time');

                $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');
                $this->form_validation->set_message('valid_email', 'U polje za %s nisu uneti ispravno podaci!');

                if ($this->form_validation->run()):

                    //unos podataka u model
                    $this->company_information_model->name_company_1 = $name_company_1;
                    $this->company_information_model->name_company_2 = $name_company_2;
                    $this->company_information_model->address_company = $address_company;
                    $this->company_information_model->city_company = $city_company;
                    $this->company_information_model->phone_company = $phone_company;
                    $this->company_information_model->mail_company = $mail_company;
                    $this->company_information_model->working_days_company = $working_days_company;
                    $this->company_information_model->working_time_company = $working_time_company;

                    $result_company_information = $this->company_information_model->update();

                    if ($result_company_information == true):
                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste podatke o preduzeću!</div>");
                        $data_insert['name_company_1'] = $name_company_1;
                        $data_insert['name_company_2'] = $name_company_2;
                        $data_insert['address_company'] = $address_company;
                        $data_insert['city_company'] = $city_company;
                        $data_insert['phone_company'] = $phone_company;
                        $data_insert['mail_company'] = $mail_company;
                        $data_insert['working_days_company'] = $working_days_company;
                        $data_insert['working_time_company'] = $working_time_company;

                        $data['form_company_information'] = array(
                            'class' => 'form-group'
                        );
                        $data['form_name_company_1'] = array(
                            'class' => 'size',
                            'name' => 'tbNameCompany1',
                            'value' => isset($data_insert['name_company_1']) ? $data_insert['name_company_1'] : '',
                            'id' => 'tbNameCompany1',
                            'placeholder' => 'Deo imena preduzeća'
                        );
                        $data['form_name_company_2'] = array(
                            'class' => 'size',
                            'name' => 'tbNameCompany2',
                            'value' => isset($data_insert['name_company_2']) ? $data_insert['name_company_2'] : '',
                            'id' => 'tbNameCompany2',
                            'placeholder' => 'Deo imena preduzeća'
                        );
                        $data['form_address_company'] = array(
                            'class' => 'size',
                            'name' => 'tbAddressCompany',
                            'value' => isset($data_insert['address_company']) ? $data_insert['address_company'] : '',
                            'id' => 'tbAddressCompany',
                            'placeholder' => 'Addresa preduzeća'
                        );
                        $data['form_city_company'] = array(
                            'class' => 'size',
                            'name' => 'tbCityCompany',
                            'value' => isset($data_insert['city_company']) ? $data_insert['city_company'] : '',
                            'id' => 'tbCityCompany',
                            'placeholder' => 'Grad preduzeća'
                        );
                        $data['form_phone_company'] = array(
                            'class' => 'size',
                            'name' => 'tbPhoneCompany',
                            'value' => isset($data_insert['phone_company']) ? $data_insert['phone_company'] : '',
                            'id' => 'tbPhoneCompany',
                            'placeholder' => 'Telefon preduzeća'
                        );
                        $data['form_mail_company'] = array(
                            'class' => 'size',
                            'name' => 'tbMailCompany',
                            'value' => isset($data_insert['mail_company']) ? $data_insert['mail_company'] : '',
                            'id' => 'tbMailCompany',
                            'placeholder' => 'Mail preduzeća'
                        );
                        $data['form_working_days_company'] = array(
                            'class' => 'size',
                            'name' => 'tbWorkingDaysCompany',
                            'value' => isset($data_insert['working_days_company']) ? $data_insert['working_days_company'] : '',
                            'id' => 'tbWorkingDaysCompany',
                            'placeholder' => 'Radni dani preduzeća'
                        );
                        $data['form_working_time_company'] = array(
                            'class' => 'size',
                            'name' => 'tbWorkingTimeCompany',
                            'value' => isset($data_insert['working_time_company']) ? $data_insert['working_time_company'] : '',
                            'id' => 'tbWorkingTimeCompany',
                            'placeholder' => 'Radni vreme preduzeća'
                        );
                        $data['form_update_company_information'] = array(
                            'name' => 'btnEdit',
                            'id' => 'btnEdit',
                            'value' => 'Izmeni',
                            'style' => 'width: 80px; font-weight: bold; padding: 7px; border-radius: 10px',
                            'class' => 'btn-primary'
                        );
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px'; text-align: center; margin:0px auto>Izmena podataka o preduzeću nije uspela!</div>");
                        $data_insert['name_company_1'] = $name_company_1;
                        $data_insert['name_company_2'] = $name_company_2;
                        $data_insert['address_company'] = $address_company;
                        $data_insert['city_company'] = $city_company;
                        $data_insert['phone_company'] = $phone_company;
                        $data_insert['mail_company'] = $mail_company;
                        $data_insert['working_days_company'] = $working_days_company;
                        $data_insert['working_time_company'] = $working_time_company;
                    endif;
                else:
                    $data_insert['name_company_1'] = $name_company_1;
                    $data_insert['name_company_2'] = $name_company_2;
                    $data_insert['address_company'] = $address_company;
                    $data_insert['city_company'] = $city_company;
                    $data_insert['phone_company'] = $phone_company;
                    $data_insert['mail_company'] = $mail_company;
                    $data_insert['working_days_company'] = $working_days_company;
                    $data_insert['working_time_company'] = $working_time_company;
                    
                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
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



        $data['title'] = "Oprema administacija sajta";
        $view = "administration/CompanyAdmin";
        $this->load_view_admin($view, $data);
    }
    
    public function name1_name2_addresse_city_day_time($str) {
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
//        $regExp = "/^[+]?\d{11,12}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('name1_name2_addresse_city_day_time', 'U polje za {field} nisu uneti ispravno podaci!');
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('name1_name2_addresse_city_day_time', 'Polje za {field} mora biti uneto!');
            return FALSE;
        endif;
    }
    
    public function phone($str) {
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        $regExp = "/^[+]?\d{11,12}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('phone', 'U polje za {field} nisu uneti ispravno podaci!');
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('phone', 'Polje za {field} mora biti uneto!');
            return FALSE;
        endif;
    }
}
