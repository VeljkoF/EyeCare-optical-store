<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pocetna
 *
 * @author Veljko
 */
class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model', 'menu');
        $this->load->model('equipment_model', 'equipment');
        $this->load->model('blog_model', 'blog');
        $this->load->model('company_information_model', 'company');
        $this->load->model('slider_model', 'slider');
        $this->load->model('text_site_model', 'text');
        $this->load->model('list_site_model', 'list');
        $this->load->model('order_lists_model');
        $this->load->model('customers_model');
    }

    public function index($id = null, $code = null) {
        $company_information = $this->company->select();
        $data['company'] = $company_information;
        if ($this->input->post('btnSend')):
            $name = $this->input->post('tbName');
            $email = $this->input->post('tbMail');
            if ($this->input->post('tbPhone')):
                $phone = $this->input->post('tbPhone');
            endif;
            $message = $this->input->post('taMessage');

            $regName = "/^([A-ZŠĐŽĆČ][a-zđšžćč\s']{1,59}){1,}$/";
            $regEmail = "/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/";
            $regPhone = "/^[+]?\d{11,12}$/";

            $greske = array();
            if (isset($name) && $name != ""):
                if (!preg_match($regName, $name)):
                    $greske[] = "U polje za ime nisu uneti ispravno podaci! Ponovite unos.";
                endif;
            else:
                $greske[] = "Polje za ime mora biti uneto!";
            endif;
            if (isset($email) && $email != ""):
                if (!preg_match($regEmail, $email)):
                    $greske[] = "U polje za mail nisu uneti ispravno podaci! Ponovite unos.";
                endif;
            else:
                $greske[] = "Polje za mail mora biti uneto!";
            endif;
            if (isset($phone) && $phone != ""):
                if (!preg_match($regPhone, $phone)):
                    $greske[] = "U polje za broj telefona nisu uneti ispravno podaci! Ponovite unos.";
                endif;
            endif;
            if (isset($message) && $message == ""):
                $greske[] = "Polje za poruku mora biti uneto!";
            endif;
            if (count($greske) == 0):
                $this->load->library('email');
                $this->email->set_newline("\r\n");
                $this->email->from('office.eye.care@mms.in.rs', 'Poruku posalo: ' . $name);
                $this->email->to('office.eye.care@mms.in.rs');

                $this->email->subject('Poruku poslao: ' . $name);
                $this->email->message('<hmtl><body><h1 style="text-decoration: none;"><a class="navbar-brand1" href="' . base_url() . '">' . $company_information[0]->name_company_1 . '</a><a class="navbar-brand1" href=" ' . base_url() . '">' . $company_information[0]->name_company_2 . ' optika</a></h1><hr><p>Poštovani,</p><p>Poruku poslao: ' . $name . '</p><p>Mail: ' . $email . '</p><p>Telefon: ' . @$phone . '</p><p>Poruka: </p><p>' . $message . '</p><br><hr><footer>Optika ' . $company_information[0]->name_company_1 . " " . $company_information[0]->name_company_2 . '</p><p>Adresa: ' . $company_information[0]->address_company . ', ' . $company_information[0]->city_company . '</p><p>Telefon: ' . $company_information[0]->phone_company . '</p><p>Email: ' . $company_information[0]->mail_company . '</p><p>Radno vreme: ' . $company_information[0]->working_days_company . ', ' . $company_information[0]->working_time_company . '</p></footer></body></html>');
                if ($this->email->send()):
                    $data['alert'] = "<script>alert('Uspešno ste poslali poruku!')</script>";
                else:
                    $data['alert'] = "<script>alert('Greška pri slanju poruku! " . $this->email->print_debugger() . "')</script>";
                endif;
            else:
                $ispisGreske = "Greška:\\n";
                foreach ($greske as $g):
                    $ispisGreske .= $g . "\\n";
                endforeach;
                echo "<script>alert('" . $ispisGreske . "\\nPonovite ceo unos!');</script>";
            endif;


        endif;

        if ($id != null && $code != null):
            $where_id_order_list = array(
                'id_order_list' => $id
            );
            $this->order_lists_model->where = $where_id_order_list;
            $order_list = $this->order_lists_model->select();

            $code_check = $order_list[0]->date_order_list * $order_list[0]->id_form;

            if ($id == $order_list[0]->id_order_list && $code == $code_check):
                $data['order_list_check'] = $order_list;
            endif;
        endif;

        if (!empty($this->session->userdata('id_role'))):
            if ($this->session->userdata('id_role') == 1):
                redirect('administration/admin/SliderAdmin');
            elseif ($this->session->userdata('id_role') == 2):
                redirect('administration/sales/OrderList');
            elseif ($this->session->userdata('id_role') == 3):
                redirect('administration/sales/HomeSales');
            endif;
        endif;

        $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
        if ($is_post):
            $button_send = $this->input->post('btnSend');
            if ($button_send != ""):
                $name = $this->input->post('tbName');
                $mail = $this->input->post('tbMail');
                $phone = $this->input->post('tbPhone');
                $message = $this->input->post('taMessage');

                $this->load->library('form_validation');

                if ($this->input->post() == 'formContact'):
                    $this->form_validation->set_rules('tbName', 'ime', 'trim|required|xss_clean|prep_for_form');
                    $this->form_validation->set_rules('tbMail', 'mail adresa', 'trim|required|xss_clean|valid_email|prep_for_form');
                    $this->form_validation->set_rules('tbPhone', 'telefon', 'trim|required|xss_clean|prep_for_form');
                    $this->form_validation->set_rules('taMessage', 'poruka', 'trim|required|xss_clean|prep_for_form');
                endif;
                if ($this->form_validation->run() === true):
                    if ($this->sendemail($_POST)):
                        redirect('Pocetna');
                    endif;
                endif;
            endif;
        endif;

        $id_role = $this->session->userdata('id_role');
        $data['id_role'] = $id_role;
        $data['menu'] = $this->menu->select();
        $data['equipment'] = $this->equipment->select();
        $data['slider'] = $this->slider->select();
        $data['blog'] = $this->blog->select();

        $data['text'] = $this->text->select();
        $data['list'] = $this->list->select();

        $data['title'] = "Optika";
        $this->load_view_home('', $data);
    }

}
