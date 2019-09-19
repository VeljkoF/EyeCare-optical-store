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
class MaterialLensSales extends MY_Controller {

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
        $this->load->model('material_lenses_model');
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

        $material_lens = $this->material_lenses_model->select();
        $data['material_lens'] = $material_lens;

        $data['title'] = "Spisak materijal sočiva";
        $view = "sales/MaterialLensHome";
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
                $name_material_lens = trim($this->input->post('tbNameMaterialLens'));

                $this->load->library('form_validation');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                $this->form_validation->set_rules('tbNameMaterialLens', 'materijal sočiva', 'xss_clean|callback_name');

//                $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');

                if ($this->form_validation->run()):

                    //unosenje podatak u model za upis u bazu
                    $this->material_lenses_model->name_material_lens = $name_material_lens;

                    $result_material_lens = $this->material_lenses_model->insert();

                    if ($result_material_lens != ""):
                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste dodali novi materijal sočiva!</div>");
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Dodavanje novog materijala sočiva nije uspelo!</div>");
                    endif;
                else:
                    $data_insert['name_material_lens'] = $name_material_lens;

                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                endif;
            endif;
        endif;

        $data['form_material_lens'] = array(
            'class' => 'form',
            'accept-charset' => 'utf-8',
            'method' => 'POST'
        );

        $data['form_name_material_lens'] = array(
            'name' => 'tbNameMaterialLens',
            'id' => 'tbNameMaterialLens',
            'value' => isset($data_insert['name_material_lens']) ? $data_insert['name_material_lens'] : '',
            'placeholder' => 'Naziv novog materijala sočiva',
            'required' => TRUE
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

        $data['title'] = "Dodavanje novog materijala sočiva";
        $view = "sales/add-edit/AddEditMaterialLens";
        $this->load_view_admin($view, $data);
    }

    public function edit($id_e = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;
        $where_material_lens = array(
            'id_material_lens' => $id_e
        );

        $this->material_lenses_model->where = $where_material_lens;
        $material_lens = $this->material_lenses_model->select();

        $data['material_lens'] = $material_lens;

        $data['form_material_lens'] = array(
            'class' => 'form',
            'accept-charset' => 'utf-8',
            'method' => 'POST'
        );

        $data['form_name_material_lens'] = array(
            'name' => 'tbNameMaterialLens',
            'id' => 'tbNameMaterialLens',
            'class' => 'tbNameMaterialLens',
            'value' => $material_lens[0]->name_material_lens,
            'placeholder' => 'Material sočiva',
            'size' => '30px'
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
                $name_material_lens = trim($this->input->post('tbNameMaterialLens'));

                $this->load->library('form_validation');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                $this->form_validation->set_rules('tbNameMaterialLens', 'material sočiva', 'xss_clean|callback_name');

                if ($this->form_validation->run()):

                    //ucitavanje podataka u model za upis u bazu
                    $this->material_lenses_model->id_material_lens = $id_e;
                    $this->material_lenses_model->name_material_lens = $name_material_lens;


                    $result_material_lens = $this->material_lenses_model->update();

                    if ($result_material_lens != ""):
                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili materijal sočiva!</div>");
                        $data_insert['name_material_lens'] = $name_material_lens;

                        $data['form_name_material_lens'] = array(
                            'name' => 'tbNameMaterialLens',
                            'id' => 'tbNameMaterialLens',
                            'class' => 'tbNameMaterialLens',
                            'value' => isset($data_insert['name_material_lens']) ? $data_insert['name_material_lens'] : '',
                            'placeholder' => 'Material sočiva',
                            'size' => '30px'
                        );
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Izmena nije uspela!</div>");
                        $data_insert['name_material_lens'] = $name_material_lens;
                    endif;
                else:
                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                    $data_insert['name_material_lens'] = $name_material_lens;
                endif;
            endif;
        endif;

        $id_role = $this->session->userdata('id_role');

        $data['true'] = 1;

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

        $data['title'] = "Izmena materijala sočiva: ";
        $view = "sales/add-edit/AddEditMaterialLens";
        $this->load_view_admin($view, $data);
    }

    public function delete($id_p = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        if ($id_p != null):
            $this->load->model('pricelist_lenses_model');
            $wherePriceListLens = array(
                'pricelist_lenses.id_material_lens' => $id_p
            );
            $this->pricelist_lenses_model->where = $wherePriceListLens;
            $result = $this->pricelist_lenses_model->select();
            if ($result != null):
                $this->session->set_flashdata('message', "<div class='alert alert-danger' style='width: 600px; text-align: center; margin:0px auto'>Materijal sočiva je unet u cenovnik! Izbrišite materija sočiva iz cenovnika pa onda obriščite materijala sočiva!</div>");
                redirect('administration/sales/MaterialLensSales');
            else:

                $this->material_lenses_model->id_material_lens = $id_p;
                $result = $this->material_lenses_model->delete();
                if ($result == true):
                    $this->session->set_flashdata('message', "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste obrisali materijala sočiva!</div>");
                    redirect('administration/sales/MaterialLensSales');
                else:
                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Niste obrisali materijala sočiva!</div>");
                    redirect('administration/sales/MaterialLensSales');
                endif;
            endif;
        else:
            redirect('administration/sales/MaterialLensSales');
        endif;
    }

    public function name($str) {
//        $regExp = "/^\d{1,}$/";
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('name', "<script>"
                        . "$(document).ready(function () { "
                        . "$('.tbNameMaterialLens').css('border', '1px solid red');"
                        . "$('.tbNameMaterialLensCss').css('display', 'block');"
                        . "$('.tbNameMaterialLensCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('name', "<script>"
                    . "$(document).ready(function () { "
                    . "$('.tbNameMaterialLens').css('border', '1px solid red');"
                    . "$('.tbNameMaterialLensCss').css('display', 'block');"
                    . "$('.tbNameMaterialLensCss').text('* Polje za {field} mora biti uneto!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        endif;
    }

}
