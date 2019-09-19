<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListAdmin
 *
 * @author Veljko
 */
class ListAdmin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('company_information_model');
        $this->load->model('text_site_model');
        $this->load->model('list_site_model');
        $this->load->model('users_model');
    }

    function index($id = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        if ($id != null):

            $id_role = $this->session->userdata('id_role');

            $data['id_text_site'] = $id;

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

            $data['text'] = $this->text_site_model->select();

            $where_list = array(
                'list_site.id_text_site' => $id
            );
            $this->list_site_model->where = $where_list;

            $data['list'] = $this->list_site_model->select();

            $data['company'] = $this->company_information_model->select();

            $data['title'] = "Oprema administacija sajta";
            $view = "administration/ListAdmin";
            $this->load_view_admin($view, $data);

        else:
            redirect('administration/admin/OpticsAdmin');
        endif;
    }

    function insert($id = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $data['id_text_site'] = $id;

        $id_role = $this->session->userdata('id_role');

        $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
        if ($is_post):

            $button = $this->input->post('btnAdd');
            if ($button != ""):
                $item_list_site = trim($this->input->post('tbItemListSite'));

                $this->load->library('form_validation');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                $this->form_validation->set_rules('tbItemListSite', 'stavka liste', 'xss_clean|required|callback_itemlist');

                $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');

                if ($this->form_validation->run()):

                    //unos podataka u model
                    $this->list_site_model->item_list_site = $item_list_site;
                    $this->list_site_model->id_text_site = $id;

                    $result_list_site = $this->list_site_model->insert();

                    if ($result_list_site != ""):
                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste dodali novu stavku u listu!</div>");
                    redirect('administration/admin/ListAdmin/index/'.$id, 'refresh');
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Dodavanje nove stavke liste nije uspelo!</div>");
                    endif;
                else:
                    $data_insert['item_list_site'] = $item_list_site;

                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                endif;
            endif;
        endif;

        $data['form_list_site'] = array(
            'class' => 'form',
            'accept-charset' => 'utf-8',
            'method' => 'POST',
            'style' => 'margin: 60px 0px 60px 0px'
        );

        $data['form_item_list_site'] = array(
            'class' => 'size_textarea',
            'name' => 'tbItemListSite',
            'id' => 'tbItemListSite',
            'value' => isset($data_insert['item_list_site']) ? $data_insert['item_list_site'] : '',
            'placeholder' => 'Stavka liste'
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

        $data['title'] = "Dodavanje stavke u listu - Administacija sajta";
        $view = "administration/add-edit/AddEditListAdmin";
        $this->load_view_admin($view, $data);
    }

    public function edit($id_t = null, $id = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $data['id_text_site'] = $id_t;

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

        if ($id != null):

            $where_list_site = array(
                'id_list_site' => $id
            );

            $this->list_site_model->where = $where_list_site;
            $list_site = $this->list_site_model->select();

            $data['list'] = $list_site;

            $data['form_list_site'] = array(
                'class' => 'form',
                'accept-charset' => 'utf-8',
                'method' => 'POST',
                'style' => 'margin: 60px 0px 60px 0px'
            );

            $data['form_item_list_site'] = array(
                'class' => 'size_textarea',
                'name' => 'tbItemListSite',
                'id' => 'tbItemListSite',
                'value' => $list_site[0]->item_list_site,
                'placeholder' => 'Stavka liste',
                'required' => TRUE
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
                    $item_list_site = trim($this->input->post('tbItemListSite'));

                    $this->load->library('form_validation');
                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                    $this->form_validation->set_rules('tbItemListSite', 'stavka liste', 'xss_clean|required');

                    $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');

                    if ($this->form_validation->run()):

                        //unos podataka u model
                        $this->list_site_model->item_list_site = $item_list_site;
                        $this->list_site_model->id_text_site = $id_t;

                        $result_list_site = $this->list_site_model->update();

                        if ($result_list_site == true):
                            $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili stavku liste!</div>");
                        redirect('administration/admin/ListAdmin/index/'.$id_t, 'refresh');
                        else:
                            $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px'; text-align: center; margin:0px auto>Izmena stavke liste nije uspela!</div>");
                            $data_insert['item_list_site'] = $item_list_site;
                        endif;
                    else:
                        $data_insert['item_list_site'] = $item_list_site;

                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                    endif;
                endif;
            endif;
        endif;

        $data['title'] = "Izmena stavke liste";
        $view = "administration/add-edit/AddEditListAdmin";
        $this->load_view_admin($view, $data);
    }
    
    public function delete($id_t = null, $id = null) {
        if ($id != null):
            $where_id_list_site = "list_site.id_list_site = " . $id;
            $this->list_site_model->where = $where_id_list_site;
            $result_id_list_site = $this->list_site_model->select();

            if ($result_id_list_site != null):
                    $this->list_site_model->id_list_site = $id;
                    $result = $this->list_site_model->delete();
                    if ($result == true):
                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste obrisali opremu!</div>");
                        redirect('administration/admin/ListAdmin/index/'.$id_t, 'refresh');
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Niste obrisali opremu!</div>");
                        redirect('administration/admin/ListAdmin/index/'.$id_t, 'refresh');
                    endif;
                
            endif;
        else:
            echo "<script language='JavaScript'> window.location='./'</script>";
        endif;
    }

    public function itemlist($str) {
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
//        $regExp = "/^[+]?\d{11,12}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('itemlist', 'U polje za {field} nisu uneti ispravno podaci!');
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('itemlist', 'Polje za {field} mora biti uneto!');
            return FALSE;
        endif;
    }
}
