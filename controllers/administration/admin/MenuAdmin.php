<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuAdmin
 *
 * @author Veljko
 */
class MenuAdmin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        //$this->load->model('equipment_model');
        //$this->load->model('blog_model');
        $this->load->model('company_information_model');
        //$this->load->model('slider_model');
        //$this->load->model('text_site_model');
        //$this->load->model('list_site_model');
        $this->load->model('users_model');
    }

    function index() {

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

        //$data['equipment'] = $this->equipment_model->select();
        //$data['slider'] = $this->slider_model->select();
        //$data['text'] = $this->text_site_model->select();
        //$data['blog'] = $this->blog_model->select();
        //$data['list'] = $this->list_site_model->select();

        $this->load->model('menu_model', 'allmenu');
        $where_menu = " id_menu <> 1 AND id_menu <> 2 AND id_menu <> 3 AND id_menu <> 4 AND id_menu <> 5 AND id_menu <> 6 AND id_menu <> 7";
        $this->allmenu->where = $where_menu;
        $data['allmenu'] = $this->allmenu->select();

        $data['company'] = $this->company_information_model->select();

        $data['title'] = "Korisnici - Administacija sajta";
        $view = "administration/MenuAdmin";
        $this->load_view_admin($view, $data);
    }

    function edit($id = null) {
        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $id_role = $this->session->userdata('id_role');

        if ($id != null):

            $where_menu = array(
                'id_menu' => $id
            );

            $this->load->model('menu_model', 'menu_form');
            $this->menu_form->where = $where_menu;
            $menu_form = $this->menu_form->select();

            $data['menu_form'] = $menu_form;

            $data['form_menu'] = array(
                'class' => 'form',
                'accept-charset' => 'utf-8',
                'method' => 'POST',
                'style' => 'margin: 60px 0px 60px 0px'
            );

            $data['form_name_menu'] = array(
                'name' => 'tbNameMenu',
                'id' => 'tbNameMenu',
                'value' => $menu_form[0]->name_menu,
                'placeholder' => 'Meni',
                'style' => 'width: 220px'
            );

            $this->load->model('menu_model', 'menu_dropdown');
            $order_by_menu_dropdown = "name_menu ASC";
            $where_admin = array(
                'admin' => 1
            );
            $this->menu_dropdown->where = $where_admin;
            $this->menu_dropdown->order_by = $order_by_menu_dropdown;
            $parentMenuOption = $this->menu_dropdown->select();
            $optionForParentMenu = array('' => 'Izaberi...');
            foreach ($parentMenuOption as $n):
                $optionForParentMenu += array($n->id_menu => $n->name_menu);
            endforeach;
            @$selected = $menu_form[0]->parent;
            $data['ddlParentMenu'] = form_dropdown('ddlParentMenu', $optionForParentMenu, @$selected, array('style' => 'width: 100px', 'required' => true, 'id' => 'ddlParentMenu'));

            $data['form_edit_submit'] = array(
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
                    $name_menu = trim($this->input->post('tbNameMenu'));
                    if ($this->input->post('ddlParentMenu') != ""):
                        $id_parent = $this->input->post('ddlParentMenu');
                    endif;
                    $this->load->library('form_validation');

                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                    $this->form_validation->set_rules('tbNameMenu', 'tekst menija', 'xss_clean|required|callback_name');
                    if (!empty($id_menu_form)):
                        $this->form_validation->set_rules('ddlNameMenu', 'podmeni', 'xss_clean|required|callback_checkFunction');
                    endif;
                    $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');
                    $this->form_validation->set_message('checkFunction', 'Polje za %s mora biti izabrano!');

                    if ($this->form_validation->run()):

                        //unos podataka u model
                        $this->menu_form->name_menu = $name_menu;
                        if (!empty($id_parent)):
                            $this->menu_form->parent = $id_parent;
                        endif;

                        $result_menu = $this->menu_form->update();

                        if ($result_menu != ""):
                            $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili stavku menija!</div>");
                        else:
                            $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Izmena menija nije uspelo!</div>");
                        endif;
                        $data_insert['name_menu'] = $name_menu;
                        if (!empty($id_parent)):
                            $data_insert['parent'] = $id_parent;
                        endif;
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                        $data_insert['name_menu'] = $name_menu;
                        if (!empty($id_parent)):
                            $data_insert['parent'] = $id_parent;
                        endif;
                    endif;
                endif;

                $data['form_menu'] = array(
                    'class' => 'form',
                    'accept-charset' => 'utf-8',
                    'method' => 'POST',
                    'style' => 'margin: 60px 0px 60px 0px'
                );

                $data['form_name_menu'] = array(
                    'name' => 'tbNameMenu',
                    'id' => 'tbNameMenu',
                    'value' => isset($data_insert['name_menu']) ? $data_insert['name_menu'] : '',
                    'placeholder' => 'Meni',
                    'style' => 'width: 220px'
                );

                $this->load->model('menu_model', 'menu_dropdown');
                $order_by_menu_dropdown = "name_menu ASC";
                $where_admin = array(
                    'admin' => 1
                );
                $this->menu_dropdown->where = $where_admin;
            $this->menu_dropdown->order_by = $order_by_menu_dropdown;
            $parentMenuOption = $this->menu_dropdown->select();
            $optionForParentMenu = array('' => "Izaberi...");
            foreach ($parentMenuOption as $n):
                $optionForParentMenu += array($n->id_menu => $n->name_menu);
            endforeach;
                @$selected = $data_insert['parent'];
                $data['ddlParentMenu'] = form_dropdown('ddlParentMenu', $optionForParentMenu, @$selected, array('style' => 'width: 100px', 'required' => true));
                $data['form_edit_submit'] = array(
                    'name' => 'btnEdit',
                    'id' => 'btnEdit',
                    'value' => 'Izmeni',
                    'style' => 'width: 80px; font-weight: bold; padding: 7px; border-radius: 10px',
                    'class' => 'btn-primary'
                );
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

        $data['company'] = $this->company_information_model->select();

        $data['title'] = "Optika administacija sajta";
        $view = "administration/add-edit/EditMenuAdmin";
        $this->load_view_admin($view, $data);
    }

    function checkFunction($input) {
        if ($input == '') {
            return 0;
        }
        return 1;
    }
    
    public function name($str) {
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
//        $regExp = "/^[+]?\d{11,12}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('name', 'U polje za {field} nisu uneti ispravno podaci!');
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('name', 'Polje za {field} mora biti uneto!');
            return FALSE;
        endif;
    }

}
