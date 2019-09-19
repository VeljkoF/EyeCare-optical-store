<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormCustomer
 *
 * @author Veljko
 */
class FormCustomer extends MY_Controller{
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
    }
    
    public function index($id = null){
        
        if(empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;
        
        if($id != null):
            $where_customer = array(
                'id_customer' => $id
            );
            $where_forms = array(
                'id_customer' => $id
            );
            
            $order_by_date = "date_form DESC";
            
            $this->customers_model->where = $where_customer;
            $customer = $this->customers_model->select();
            
            $this->forms_model->order_by = $order_by_date;
            $this->forms_model->where = $where_forms;
            $forms = $this->forms_model->select();
            
            $data['customer'] = $customer;
            $data['forms'] = $forms;

            $data['form_customer'] = array(
            'class' => 'form',
            'accept-charset' => 'utf-8',
            'method' => 'POST',
            ); 

            $data['form_name_customer'] = array(
                'name' => 'tbNameCustomer',
                'id' => 'tbNameCustomer',
                'value' => $customer[0]->name_customer,
                'placeholder' => 'Ime i prezime',
                'required' => TRUE,
                'readonly' => TRUE
            );

            $data['form_year_customer'] = array(
                'name' => 'tbYearCustomer',
                'id' => 'tbYearCustomer',
                'value' => $customer[0]->year_customer, 
                'placeholder' => 'Godina rođenja',
                'readonly' => TRUE
            );

            $data['form_phone_customer'] = array(
                'name' => 'tbPhoneCustomer',
                'id' => 'tbPhoneCustomer',
                'value' => $customer[0]->phone_customer,
                'placeholder' => 'Broj telefona',
                'readonly' => TRUE
            );

            $data['form_email_customer'] = array(
                'name' => 'tbEmailCustomer',
                'id' => 'tbEmailCustomer',
                'value'=> $customer[0]->email_customer,
                'placeholder' => 'Email',
                'readonly' => TRUE
            );

            $data['form_note_customer'] = array(
                'name' => 'taNoteCustomer',
                'id' => 'taNoteCustomer',
                'rows' => '4',
                'cols' => '22',
                'value' => $customer[0]->note_customer,
                'placeholder' => 'Napomena',
                'readonly' => TRUE
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

        //$data['equipment'] = $this->equipment_model->select();
        //$data['slider'] = $this->slider_model->select();
        //$data['text'] = $this->text_site_model->select();
        //$data['blog'] = $this->blog_model->select();
        //$data['list'] = $this->list_site_model->select();

        $data['user'] = $this->users_model->select();

        $data['company'] = $this->company_information_model->select();
        
        $data['title'] = "Karton: ".$customer[0]->name_customer;
        $view = "sales/FormCustomer";
        $this->load_view_admin($view, $data);
        else:
            redirect('administration/sales/ArchiveSales');
        endif;
        
    }
    
    public function edit($id = null){
        
        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;
        
        if($id != null):
            
            $where_customer = array(
                'id_customer' => $id
            );
            
            $this->customers_model->where = $where_customer;
            $customer = $this->customers_model->select();
            
            $data['customer'] = $customer;
            
            $data['form_customer'] = array(
            'class' => 'form',
            'accept-charset' => 'utf-8',
            'method' => 'POST'
            ); 

            $data['form_name_customer'] = array(
                'name' => 'tbNameCustomer',
                'id' => 'tbNameCustomer',
                'value' => $customer[0]->name_customer,
                'placeholder' => 'Ime i prezime',
                'required' => TRUE
            );

            $data['form_year_customer'] = array(
                'name' => 'tbYearCustomer',
                'id' => 'tbYearCustomer',
                'value' => $customer[0]->year_customer, 
                'placeholder' => 'Godina rođenja'
            );

            $data['form_phone_customer'] = array(
                'name' => 'tbPhoneCustomer',
                'id' => 'tbPhoneCustomer',
                'value' => $customer[0]->phone_customer,
                'placeholder' => 'Broj telefona'
            );

            $data['form_email_customer'] = array(
                'name' => 'tbEmailCustomer',
                'id' => 'tbEmailCustomer',
                'value'=> $customer[0]->email_customer,
                'placeholder' => 'Email'
            );

            $data['form_note_customer'] = array(
                'name' => 'taNoteCustomer',
                'id' => 'taNoteCustomer',
                'rows' => '4',
                'cols' => '25',
                'value' => $customer[0]->note_customer,
                'placeholder' => 'Napomena'
            );

            $data['form_add_submit'] = array(
                'name' => 'btnEdit',
                'id' => 'btnEdit',
                'value' => 'Izmeni',
                'style' => 'width: 80px; font-weight: bold; padding: 7px; border-radius: 10px',
                'class' => 'btn-primary'
            );
            
            $is_post=$this->input->server('REQUEST_METHOD') == 'POST'; 
            if($is_post):

                $button = $this->input->post('btnEdit');
                if($button != ""):
                    $name_customer = trim($this->input->post('tbNameCustomer'));
                    $year_customer = trim($this->input->post('tbYearCustomer'));
                    $phone_customer = trim($this->input->post('tbPhoneCustomer'));
                    $email_customer = trim($this->input->post('tbEmailCustomer'));
                    $note_customer = trim($this->input->post('taNoteCustomer'));

                    $this->load->library('form_validation');
                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                    $this->form_validation->set_rules('tbNameCustomer','ime i prezime', 'xss_clean|required');
                    $this->form_validation->set_rules('tbYearCustomer','godina rođenja', 'xss_clean');
                    $this->form_validation->set_rules('tbPhoneCustomer','broj telefona', 'xss_clean');
                    $this->form_validation->set_rules('tbEmailCustomer','email', 'xss_clean|valid_email');
                    $this->form_validation->set_rules('taNoteCustomer','napomena', 'xss_clean');

                    $this->form_validation->set_message('required','Polje za %s mora biti uneto!');
                    $this->form_validation->set_message('valid_email','Polje za %s nije u skladu sa opštim izrazom za email!');
                    if($this->form_validation->run()):

                        //izmena podatak u model za upis u bazu
                        $this->customers_model->id_customer = $id;
                        $this->customers_model->name_customer = $name_customer;
                        $this->customers_model->year_customer = $year_customer;
                        $this->customers_model->phone_customer = $phone_customer;
                        $this->customers_model->email_customer = $email_customer;
                        $this->customers_model->note_customer = $note_customer;

                        $id_customer = $this->customers_model->update();

                        if($id_customer == true):
                            $data['message'] = "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili ".$name_customer." !</div>";
                        $data_insert['name_customer'] = $name_customer;
                        $data_insert['year_customer'] = $year_customer;
                        $data_insert['phone_customer'] = $phone_customer;
                        $data_insert['email_customer'] = $email_customer;
                        $data_insert['note_customer'] = $note_customer;
                        
                        $data['form_customer'] = array(
                            'class' => 'form',
                            'accept-charset' => 'utf-8',
                            'method' => 'POST'
                        ); 

                        $data['form_name_customer'] = array(
                            'class' =>'size',
                            'name' => 'tbNameCustomer',
                            'id' => 'tbNameCustomer',
                            'value' => isset($data_insert['name_customer']) ? $data_insert['name_customer'] : '',
                            'placeholder' => 'Ime i prezime',
                            'required' => TRUE
                        );

                        $data['form_year_customer'] = array(
                            'class' =>'size',
                            'name' => 'tbYearCustomer',
                            'id' => 'tbYearCustomer',
                            'value' => isset($data_insert['year_customer']) ? $data_insert['year_customer'] : '', 
                            'placeholder' => 'Godina rođenja'
                        );

                        $data['form_phone_customer'] = array(
                            'class' =>'size',
                            'name' => 'tbPhoneCustomer',
                            'id' => 'tbPhoneCustomer',
                            'value' => isset($data_insert['phone_customer']) ? $data_insert['phone_customer'] : '',
                            'placeholder' => 'Broj telefona'
                        );

                        $data['form_email_customer'] = array(
                            'class' =>'size',
                            'name' => 'tbEmailCustomer',
                            'id' => 'tbEmailCustomer',
                            'value' => isset($data_insert['email_customer']) ? $data_insert['email_customer'] : '',
                            'placeholder' => 'Email'
                        );

                        $data['form_note_customer'] = array(
                            'class' =>'size',
                            'name' => 'taNoteCustomer',
                            'id' => 'taNoteCustomer',
                            'rows' => '4',
                            'cols' => '25',
                            'value' => isset($data_insert['note_customer']) ? $data_insert['note_customer'] : '',
                            'placeholder' => 'Napomena'
                        );

                        $data['form_add_submit'] = array(
                            'name' => 'btnEdit',
                            'id' => 'btnEdit',
                            'value' => 'Izmeni',
                            'style' => 'width: 80px; font-weight: bold; padding: 7px; border-radius: 10px',
                            'class' => 'btn-primary'
                        );
                        
                        else:
                            $data['message'] = "<div class='alert alert-danger' style='width: 400px'; text-align: center; margin:0px auto>Izmena ".$name_customer." nije uspelo!</div>";
                        $data_insert['name_customer'] = $name_customer;
                        $data_insert['year_customer'] = $year_customer;
                        $data_insert['phone_customer'] = $phone_customer;
                        $data_insert['email_customer'] = $email_customer;
                        $data_insert['note_customer'] = $note_customer;
                        
                        endif;
                    else:
                        $data_insert['name_customer'] = $name_customer;
                        $data_insert['year_customer'] = $year_customer;
                        $data_insert['phone_customer'] = $phone_customer;
                        $data_insert['email_customer'] = $email_customer;
                        $data_insert['note_customer'] = $note_customer;

                        $data['message'] = "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>";
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
        
        $data['company'] = $this->company_information_model->select();
        
        $data['title'] = "Izmena kupca: ".$customer[0]->name_customer;
        $view = "sales/add-edit/AddEditCustomer";
        $this->load_view_admin($view, $data);
        
    }
}
