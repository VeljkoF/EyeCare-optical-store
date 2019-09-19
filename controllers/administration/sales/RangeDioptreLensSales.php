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
class RangeDioptreLensSales extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('company_information_model');
        $this->load->model('users_model');
        $this->load->model('ranges_dioptre_lenses_model');
        $this->load->model('diameter_lenses_model');
        $this->load->model('sph_range_dioptre_lenses_model');
        $this->load->model('pricelist_lenses_model');
    }

    public function index() {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $order_by_range_dioptre = "min.value_sph_range_dioptre_lens, max.value_sph_range_dioptre_lens, cyl_range_dioptre_lens, add_range_dioptre_lens ASC";
        $this->ranges_dioptre_lenses_model->order_by = $order_by_range_dioptre;
        $range_dioptre_lens = $this->ranges_dioptre_lenses_model->select();
        $data['range_dioptre_lens'] = $range_dioptre_lens;

        $this->load->model('sph_range_dioptre_lenses_model', 'min');
        $order_by_value_min_sph_range_dioptre_lens = "value_sph_range_dioptre_lens ASC";
        $this->min->order_by = $order_by_value_min_sph_range_dioptre_lens;
        $minSphRangeDioptreLensOption = $this->min->select();
        $optionForMinSphRangeDioptre = array('' => "Sve");
        foreach ($minSphRangeDioptreLensOption as $s):
            $optionForMinSphRangeDioptre += array($s->id_sph_range_dioptre_lens => $s->value_sph_range_dioptre_lens);
        endforeach;
        $data['ddlMinSphRangeDioptreLens'] = form_dropdown('ddlMinSphRangeDioptreLens', $optionForMinSphRangeDioptre, @$selected, array('style' => 'width: 100px', 'class' => 'ddlMinSphRangeDioptreLens'));


        $this->load->model('sph_range_dioptre_lenses_model', 'max');
        $order_by_max_sph_range_dioptre_lens = "value_sph_range_dioptre_lens ASC";
        $this->max->order_by = $order_by_max_sph_range_dioptre_lens;
        $maxSphRangeDioptreLens = $this->max->select();
        $optionForMaxSphRangeDioptre = array('' => "Sve");
        foreach ($maxSphRangeDioptreLens as $s):
            $optionForMaxSphRangeDioptre += array($s->id_sph_range_dioptre_lens => $s->value_sph_range_dioptre_lens);
        endforeach;
        $data['ddlMaxSphRangeDioptreLens'] = form_dropdown('ddlMaxSphRangeDioptreLens', $optionForMaxSphRangeDioptre, @$selected, array('style' => 'width: 100px', 'class' => 'ddlMaxSphRangeDioptreLens'));

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

        $data['sph_range_dioptre_lenses'] = $this->sph_range_dioptre_lenses_model->select();

        $data['title'] = "Opseg dioptrija sočiva";
        $view = "sales/RangeDioptreLensHome";
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
                $id_min_sph_range_dioptre_lens = trim($this->input->post('ddlMinSphRangeDioptreLens'));
                $id_max_sph_range_dioptre_lens = trim($this->input->post('ddlMaxSphRangeDioptreLens'));
                $cyl_range_dioptre_lens = trim($this->input->post('tbCylRangeLens'));
                $add_range_dioptre_lens = trim($this->input->post('tbAddRangeLens'));
                $minMax = $id_min_sph_range_dioptre_lens . "||" . $id_max_sph_range_dioptre_lens;

                $this->load->library('form_validation');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                $this->form_validation->set_rules('ddlMinSphRangeDioptreLens', 'minimalni iznos sph opsega', 'callback_minsph|callback_checkSameSphRangeDioptreLens[' . $minMax . ']');
                $this->form_validation->set_rules('ddlMaxSphRangeDioptreLens', 'maximalni iznos sph opsega', 'callback_maxsph');
                $this->form_validation->set_rules('tbCylRangeLens', 'iznos cyl', 'xss_clean|callback_cyl');
                $this->form_validation->set_rules('tbAddRangeLens', 'iznos adicije', 'xss_clean|callback_add');

                if ($this->form_validation->run()):

                    //unosenje podatak u model za upis u bazu
                    $this->ranges_dioptre_lenses_model->id_min_sph_range_dioptre_lens = $id_min_sph_range_dioptre_lens;
                    $this->ranges_dioptre_lenses_model->id_max_sph_range_dioptre_lens = $id_max_sph_range_dioptre_lens;
                    $this->ranges_dioptre_lenses_model->cyl_range_dioptre_lens = $cyl_range_dioptre_lens;
                    if ($add_range_dioptre_lens != null):
                        $this->ranges_dioptre_lenses_model->add_range_dioptre_lens = $add_range_dioptre_lens;
                    endif;

                    $result_range_dioptre_lens = $this->ranges_dioptre_lenses_model->insert();

                    if ($result_range_dioptre_lens != ""):
                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste dodali novi opseg sočiva!</div>");
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Dodavanje novog opsega sočiva nije uspelo!</div>");
                    endif;
                else:
                    $data_insert['id_min_sph_range_dioptre_lens'] = $id_min_sph_range_dioptre_lens;
                    $data_insert['id_max_sph_range_dioptre_lens'] = $id_max_sph_range_dioptre_lens;
                    $data_insert['cyl_range_dioptre_lens'] = $cyl_range_dioptre_lens;
                    $data_insert['add_range_dioptre_lens'] = $add_range_dioptre_lens;

                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                endif;
            endif;
        endif;

        $data['form_range_dioptre_lens'] = array(
            'class' => 'form',
            'accept-charset' => 'utf-8',
            'method' => 'POST'
        );

        $this->load->model('sph_range_dioptre_lenses_model', 'min');
        $order_by_value_min_sph_range_dioptre_lens = "value_sph_range_dioptre_lens ASC";
        $this->min->order_by = $order_by_value_min_sph_range_dioptre_lens;
        $minSphRangeDioptreLensOption = $this->min->select();
        $optionForMinSphRangeDioptre = array('' => "Izaberi...");
        foreach ($minSphRangeDioptreLensOption as $s):
            $optionForMinSphRangeDioptre += array($s->id_sph_range_dioptre_lens => $s->value_sph_range_dioptre_lens);
        endforeach;
        @$selected = $data_insert['id_min_sph_range_dioptre_lens'];
        $data['ddlMinSphRangeDioptreLens'] = form_dropdown('ddlMinSphRangeDioptreLens', $optionForMinSphRangeDioptre, $selected, array('style' => 'width: 100px', 'id' => 'ddlMinSphRangeDioptreLens'));


        $this->load->model('sph_range_dioptre_lenses_model', 'max');
        $order_by_max_sph_range_dioptre_lens = "value_sph_range_dioptre_lens ASC";
        $this->max->order_by = $order_by_max_sph_range_dioptre_lens;
        $maxSphRangeDioptreLens = $this->max->select();
        $optionForMaxSphRangeDioptre = array('' => "Izaberi...");
        foreach ($maxSphRangeDioptreLens as $s):
            $optionForMaxSphRangeDioptre += array($s->id_sph_range_dioptre_lens => $s->value_sph_range_dioptre_lens);
        endforeach;
        @$selected = $data_insert['id_max_sph_range_dioptre_lens'];
        $data['ddlMaxSphRangeDioptreLens'] = form_dropdown('ddlMaxSphRangeDioptreLens', $optionForMaxSphRangeDioptre, $selected, array('style' => 'width: 100px', 'id' => 'ddlMaxSphRangeDioptreLens'));


        $data['form_cyl_range_dioptre_lens'] = array(
            'name' => 'tbCylRangeLens',
            'id' => 'tbCylRangeLens',
            'value' => isset($data_insert['cyl_range_dioptre_lens']) ? $data_insert['cyl_range_dioptre_lens'] : '',
            'placeholder' => 'Iznos cyl'
        );

        $data['form_add_range_dioptre_lens'] = array(
            'name' => 'tbAddRangeLens',
            'id' => 'tbAddRangeLens',
            'value' => isset($data_insert['add_range_dioptre_lens']) ? $data_insert['add_range_dioptre_lens'] : '',
            'placeholder' => 'Iznos adicije'
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

        $data['title'] = "Dodavanje novog opsega sočiva";
        $view = "sales/add-edit/AddEditRangeDioptreLens";
        $this->load_view_admin($view, $data);
    }

    public function edit($id = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        if ($id != null):

            $where_range_dioptr_lens = array(
                'id_range_dioptre_lens' => $id
            );

            $this->ranges_dioptre_lenses_model->where = $where_range_dioptr_lens;
            $range_dioptre_lens = $this->ranges_dioptre_lenses_model->select();

            $data['range_dioptre_lens'] = $range_dioptre_lens;

            $data['form_range_dioptre_lens'] = array(
                'class' => 'form',
                'accept-charset' => 'utf-8',
                'method' => 'POST'
            );

            $this->load->model('sph_range_dioptre_lenses_model', 'min');
            $order_by_value_min_sph_range_dioptre_lens = "value_sph_range_dioptre_lens ASC";
            $this->min->order_by = $order_by_value_min_sph_range_dioptre_lens;
            $minSphRangeDioptreLensOption = $this->min->select();
            $optionForMinSphRangeDioptre = array();
            foreach ($minSphRangeDioptreLensOption as $s):
                $optionForMinSphRangeDioptre += array($s->id_sph_range_dioptre_lens => $s->value_sph_range_dioptre_lens);
            endforeach;
            $selected = $range_dioptre_lens[0]->id_min_sph_range_dioptre_lens;
            $data['ddlMinSphRangeDioptreLens'] = form_dropdown('ddlMinSphRangeDioptreLens', $optionForMinSphRangeDioptre, @$selected, array('style' => 'width: 100px', 'id' => 'ddlMinSphRangeDioptreLens'));


            $this->load->model('sph_range_dioptre_lenses_model', 'max');
            $order_by_max_sph_range_dioptre_lens = "value_sph_range_dioptre_lens ASC";
            $this->max->order_by = $order_by_max_sph_range_dioptre_lens;
            $maxSphRangeDioptreLens = $this->max->select();
            $optionForMaxSphRangeDioptre = array();
            foreach ($maxSphRangeDioptreLens as $s):
                $optionForMaxSphRangeDioptre += array($s->id_sph_range_dioptre_lens => $s->value_sph_range_dioptre_lens);
            endforeach;
            $selected = $range_dioptre_lens[0]->id_max_sph_range_dioptre_lens;
            $data['ddlMaxSphRangeDioptreLens'] = form_dropdown('ddlMaxSphRangeDioptreLens', $optionForMaxSphRangeDioptre, @$selected, array('style' => 'width: 100px', 'id' => 'ddlMaxSphRangeDioptreLens'));

            $data['form_cyl_range_dioptre_lens'] = array(
                'name' => 'tbCylRangeLens',
                'id' => 'tbCylRangeLens',
                'value' => $range_dioptre_lens[0]->cyl_range_dioptre_lens,
                'placeholder' => 'Iznos cyl'
            );

            $data['form_add_range_dioptre_lens'] = array(
                'name' => 'tbAddRangeLens',
                'id' => 'tbAddRangeLens',
                'value' => $range_dioptre_lens[0]->add_range_dioptre_lens,
                'placeholder' => 'Iznos adicije'
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
                    $id_min_sph_range_dioptre_lens = trim($this->input->post('ddlMinSphRangeDioptreLens'));
                    $id_max_sph_range_dioptre_lens = trim($this->input->post('ddlMaxSphRangeDioptreLens'));
                    $cyl_range_dioptre_lens = trim($this->input->post('tbCylRangeLens'));
                    $add_range_dioptre_lens = trim($this->input->post('tbAddRangeLens'));
                    $minMax = $id_min_sph_range_dioptre_lens . "||" . $id_max_sph_range_dioptre_lens;

                    $this->load->library('form_validation');
                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                    $this->form_validation->set_rules('ddlMinSphRangeDioptreLens', 'minimalni iznos sph opsega', 'callback_minsph|callback_checkSameSphRangeDioptreLens[' . $minMax . ']');
                    $this->form_validation->set_rules('ddlMaxSphRangeDioptreLens', 'maximalni iznos sph opsega', 'callback_maxsph');
                    $this->form_validation->set_rules('tbCylRangeLens', 'iznos cyl', 'xss_clean|callback_cyl');
                    $this->form_validation->set_rules('tbAddRangeLens', 'iznos adicije', 'xss_clean|callback_add');

                    if ($this->form_validation->run()):

                        $where_pricelist_lenses = " pricelist_lenses.id_range_dioptre_lens = '" . $id . "'";
                        $this->pricelist_lenses_model->where = $where_pricelist_lenses;
                        $result = $this->pricelist_lenses_model->select();

                        if ($result == false):

                            //unosenje podatak u model za upis u bazu
                            $this->ranges_dioptre_lenses_model->id_min_sph_range_dioptre_lens = $id_min_sph_range_dioptre_lens;
                            $this->ranges_dioptre_lenses_model->id_max_sph_range_dioptre_lens = $id_max_sph_range_dioptre_lens;
                            $this->ranges_dioptre_lenses_model->cyl_range_dioptre_lens = $cyl_range_dioptre_lens;
                            if ($add_range_dioptre_lens != null):
                                $this->ranges_dioptre_lenses_model->add_range_dioptre_lens = $add_range_dioptre_lens;
                            endif;

                            $result_range_dioptre_lens = $this->ranges_dioptre_lenses_model->update();

                            if ($result_range_dioptre_lens == true):
                                $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili opseg dioptrije sočiva!</div>");
                                redirect('administration/sales/RangeDioptreLensSales');
                                $data['form_customer'] = array(
                                    'class' => 'form',
                                    'accept-charset' => 'utf-8',
                                    'method' => 'POST'
                                );

                                $this->load->model('sph_range_dioptre_lenses_model', 'min');
                                $order_by_value_min_sph_range_dioptre_lens = "value_sph_range_dioptre_lens ASC";
                                $this->min->order_by = $order_by_value_min_sph_range_dioptre_lens;
                                $minSphRangeDioptreLensOption = $this->min->select();
                                $optionForMinSphRangeDioptre = array();
                                foreach ($minSphRangeDioptreLensOption as $s):
                                    $optionForMinSphRangeDioptre += array($s->id_sph_range_dioptre_lens => $s->value_sph_range_dioptre_lens);
                                endforeach;
                                $selected = $data_insert['id_min_sph_range_dioptre_lens'];
                                $data['ddlMinSphRangeDioptreLens'] = form_dropdown('ddlMinSphRangeDioptreLens', $optionForMinSphRangeDioptre, $selected, array('style' => 'width: 100px'));


                                $this->load->model('sph_range_dioptre_lenses_model', 'max');
                                $order_by_max_sph_range_dioptre_lens = "value_sph_range_dioptre_lens ASC";
                                $this->max->order_by = $order_by_max_sph_range_dioptre_lens;
                                $maxSphRangeDioptreLens = $this->max->select();
                                $optionForMaxSphRangeDioptre = array();
                                foreach ($maxSphRangeDioptreLens as $s):
                                    $optionForMaxSphRangeDioptre += array($s->id_sph_range_dioptre_lens => $s->value_sph_range_dioptre_lens);
                                endforeach;
                                $selected = $data_insert['id_max_sph_range_dioptre_lens'];
                                $data['ddlMaxSphRangeDioptreLens'] = form_dropdown('ddlMaxSphRangeDioptreLens', $optionForMaxSphRangeDioptre, $selected, array('style' => 'width: 100px'));

                                $data['form_cyl_range_dioptre_lens'] = array(
                                    'name' => 'tbCylRangeLens',
                                    'id' => 'tbCylRangeLens',
                                    'value' => isset($data_insert['cyl_range_dioptre_lens']) ? $data_insert['cyl_range_dioptre_lens'] : '',
                                    'placeholder' => 'Iznos cyl',
                                    'required' => TRUE
                                );

                                $data['form_add_range_dioptre_lens'] = array(
                                    'name' => 'tbAddRangeLens',
                                    'id' => 'tbAddRangeLens',
                                    'value' => isset($data_insert['add_range_dioptre_lens']) ? $data_insert['add_range_dioptre_lens'] : '',
                                    'placeholder' => 'Iznos adicije'
                                );

                                $data['form_add_submit'] = array(
                                    'name' => 'btnEdit',
                                    'id' => 'btnEdit',
                                    'value' => 'Izmeni',
                                    'style' => 'width: 80px; font-weight: bold; padding: 7px; border-radius: 10px',
                                    'class' => 'btn-primary'
                                );

                            else:
                                $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px'; text-align: center; margin:0px auto>Izmena opsega dioptrije soćiva nije uspelo!</div>");
                                $data_insert['id_min_sph_range_dioptre_lens'] = $id_min_sph_range_dioptre_lens;
                                $data_insert['id_max_sph_range_dioptre_lens'] = $id_max_sph_range_dioptre_lens;
                                $data_insert['cyl_range_dioptre_lens'] = $cyl_range_dioptre_lens;
                                $data_insert['add_range_dioptre_lens'] = $add_range_dioptre_lens;

                            endif;
                        else:
                            $data_insert['id_min_sph_range_dioptre_lens'] = $id_min_sph_range_dioptre_lens;
                            $data_insert['id_max_sph_range_dioptre_lens'] = $id_max_sph_range_dioptre_lens;
                            $data_insert['cyl_range_dioptre_lens'] = $cyl_range_dioptre_lens;
                            $data_insert['add_range_dioptre_lens'] = $add_range_dioptre_lens;
                            $this->session->set_flashdata('message', "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Izabrani opsega dioptrija je već dodat u cenovnik!</div>");
                        endif;
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                        $data_insert['id_min_sph_range_dioptre_lens'] = $id_min_sph_range_dioptre_lens;
                        $data_insert['id_max_sph_range_dioptre_lens'] = $id_max_sph_range_dioptre_lens;
                        $data_insert['cyl_range_dioptre_lens'] = $cyl_range_dioptre_lens;
                        $data_insert['add_range_dioptre_lens'] = $add_range_dioptre_lens;
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

        $data['title'] = "Izmena opsega dioptrije sočiva";
        $view = "sales/add-edit/AddEditRangeDioptreLens";
        $this->load_view_admin($view, $data);
    }

    public function delete() {
        if (isset($_POST['idRangeDioptre'])):
            $id = $_POST['idRangeDioptre'];

            $where_pricelist_lenses = " pricelist_lenses.id_range_dioptre_lens = '" . $id . "'";
            $this->pricelist_lenses_model->where = $where_pricelist_lenses;
            $result = $this->pricelist_lenses_model->select();

            if ($result == false):

                $where_id_range_dioptre_lens = "ranges_dioptre_lenses.id_range_dioptre_lens = " . $id;
                $this->ranges_dioptre_lenses_model->where = $where_id_range_dioptre_lens;
                $result_id_range_dioptre_lens = $this->ranges_dioptre_lenses_model->delete();
                if ($result_id_range_dioptre_lens == true):

                    $this->load->model('ranges_dioptre_lenses_model', 'ranges_dioptre_lenses');
                    $ranges_dioptre_lenses = $this->ranges_dioptre_lenses->select();

                    $data = '<table style="width: 98%; border: 1px solid; padding: 10px; margin: 10px 10px;">';
                    $data .= '<tr class="border3">';
                    $data .= '<th class="border text-alignC">Minimalni iznos sph</th>';
                    $data .= '<th class="border text-alignC">Maximalni iznos sph</th>';
                    $data .= '<th class="border text-alignC">Iznos cyl</th>';
                    $data .= '<th class="border text-alignC">Iznos Adicije</th>';
                    $data .= '<th class="border text-alignC">Akcija</th>';
                    $data .= '</tr>';
                    $sph_range_dioptre_lenses = $this->sph_range_dioptre_lenses_model->select();
                    foreach ($ranges_dioptre_lenses as $c):
                        $data .= '<tr class="border text-alignC">';
                        $data .= '<td class="border">';
                        foreach ($sph_range_dioptre_lenses as $s):
                            if ($c->id_min_sph_range_dioptre_lens == $s->id_sph_range_dioptre_lens):
                                $data .= $s->value_sph_range_dioptre_lens;
                            endif;
                        endforeach;
                        $data .= '</td>';
                        $data .= '<td class="border">';
                        foreach ($sph_range_dioptre_lenses as $s):
                            if ($c->id_max_sph_range_dioptre_lens == $s->id_sph_range_dioptre_lens):
                                $data .= $s->value_sph_range_dioptre_lens;
                            endif;
                        endforeach;
                        $data .= '</td>';
                        $data .= '<td class="border">' . $c->cyl_range_dioptre_lens . '</td>';
                        $data .= '<td class="border">' . $c->add_range_dioptre_lens . '</td>';
                        $data .= '<td>';
                        $data .= '<a href="' . base_url() . 'administration/sales/RangeDioptreLensSales/edit/' . $c->id_range_dioptre_lens . '">Izmeni</a>';
                        $data .= '&nbsp;|&nbsp;';
                        $data .= '<a href="#" class="deleteRangeDioptreLens" data-id="' . $c->id_range_dioptre_lens . '">Obriši</a>';
                        $data .= '</td>';
                        $data .= '</tr>';
                    endforeach;
                    $data .= '</table>';
                    echo json_encode($data);
                else:
                    $message = $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Niste obrisali opseg dioptrije!</div>");
                endif;
            else:
                $message = $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Odabrana opseg dioptrija je dodata u cenovnik!</div>");
            endif;
        else:
            redirect('administration/sales/RangeDioptreLensSales', 'refresh');
        endif;
    }

    public function viewDioptre($action = null, $id = null) {

        if ($action != null):
            if ($action == 'insert'):

                $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
                if ($is_post):

                    $button = $this->input->post('btnAdd');
                    if ($button != ""):

                        $plus_minus = $this->input->post('ddlPlusMinus');
                        $value_sph_range_dioptre_lens = trim($this->input->post('tbValueSphRagneDioptre'));

                        if ($plus_minus == '-'):
                            $plus_minus = "-";
                        else:
                            $plus_minus = '';
                        endif;

                        $this->load->library('form_validation');
                        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                        $this->form_validation->set_rules('tbValueSphRagneDioptre', 'iznos sph dioptrije', 'xss_clean|callback_name');

                        if ($this->form_validation->run()):

                            $where_value_sph_range_dioptre_lens = array(
                                'value_sph_range_dioptre_lens' => $plus_minus . $value_sph_range_dioptre_lens
                            );
                            $this->sph_range_dioptre_lenses_model->where = $where_value_sph_range_dioptre_lens;
                            $result_value_sph_range_dioptre_lens = $this->sph_range_dioptre_lenses_model->select();

                            if ($result_value_sph_range_dioptre_lens == null):

                                //unosenje podatak u model za upis u bazu
                                $this->sph_range_dioptre_lenses_model->value_sph_range_dioptre_lens = $plus_minus . $value_sph_range_dioptre_lens;

                                $result_add_value_sph_range_dioptre_lens = $this->sph_range_dioptre_lenses_model->insert();

                                if ($result_add_value_sph_range_dioptre_lens != false):
                                    $this->session->set_flashdata('message', "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste dodali novu sph dioptriju!</div>");
                                else:
                                    $this->session->set_flashdata('message', "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Dodavanje nove sph dioptrije nije uspelo!</div>");
                                endif;
                            else:
                                if ($plus_minus == '-'):
                                    $plus_minus = "-";
                                elseif ($plus_minus == ''):
                                    $plus_minus = '+';
                                endif;
                                $data_insert['value_sph_range_dioptre_lens'] = $value_sph_range_dioptre_lens;
                                $data_insert['plus_minus'] = $plus_minus;
                                $this->session->set_flashdata('message', "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Uneta dioptrija vec postoji! Izmenite dioptriju!</div>");

                            endif;
                        else:
                            if ($plus_minus == '-'):
                                $plus_minus = "-";
                            elseif ($plus_minus == ''):
                                $plus_minus = '+';
                            endif;
                            $data_insert['value_sph_range_dioptre_lens'] = $value_sph_range_dioptre_lens;
                            $data_insert['plus_minus'] = $plus_minus;
                            $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                        endif;
                    endif;
                endif;

                if (empty($this->session->userdata('id_role'))):
                    redirect('Home');
                endif;

                $data['form_sph_range_dioptre_lens'] = array(
                    'class' => 'form',
                    'style' => 'height: 300px',
                    'accept-charset' => 'utf-8',
                    'method' => 'POST'
                );

                $optionForPlusMinus = array(
                    '+' => '+',
                    '-' => '-'
                );
                @$selected = $data_insert['plus_minus'];
                $data['ddlPlusMinus'] = form_dropdown('ddlPlusMinus', $optionForPlusMinus, @$selected, array('style' => 'width: 50px; float: right', 'required' => TRUE));

                $data['form_value_sph_range_dioptre_lens'] = array(
                    'name' => 'tbValueSphRagneDioptre',
                    'id' => 'tbValueSphRagneDioptre',
                    'value' => isset($data_insert['value_sph_range_dioptre_lens']) ? $data_insert['value_sph_range_dioptre_lens'] : '',
                    'placeholder' => 'Iznos sph diptrije'
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

                $order_by_value_min_sph_range_dioptre_lens = "value_sph_range_dioptre_lens ASC";
                $this->sph_range_dioptre_lenses_model->order_by = $order_by_value_min_sph_range_dioptre_lens;
                $data['sph_range_dioptre_lenses'] = $this->sph_range_dioptre_lenses_model->select();

                $this->load->model('menu_model', 'submenu');
                $this->submenu->where = 'parent != 0';
                $data['submenu'] = $this->submenu->select();

                $this->load->model('menu_model', 'title_page');
                $data['title_page'] = $this->title_page->select();


                $data['user'] = $this->users_model->select();

                $data['company'] = $this->company_information_model->select();

                $data['sph_range_dioptre_lenses'] = $this->sph_range_dioptre_lenses_model->select();

                $data['title'] = "Opseg dioptrija sočiva";
                $view = "sales/add-edit/AddEditViewDioptreLens";
                $this->load_view_admin($view, $data);
            elseif ($action == "edit"):

                if (empty($this->session->userdata('id_role'))):
                    redirect('Home');
                endif;

                if ($id != null):

                    $where_sph_range_dioptre_lenses = array(
                        'id_sph_range_dioptre_lens' => $id
                    );

                    $this->sph_range_dioptre_lenses_model->where = $where_sph_range_dioptre_lenses;
                    $sph_range_dioptre_lenses = $this->sph_range_dioptre_lenses_model->select();

                    $data['sph_range_dioptre_lenses'] = $sph_range_dioptre_lenses;


                    $data['form_sph_range_dioptre_lens'] = array(
                        'class' => 'form',
                        'style' => 'height: 300px',
                        'accept-charset' => 'utf-8',
                        'method' => 'POST'
                    );


                    $optionForPlusMinus = array(
                        '+' => '+',
                        '-' => '-'
                    );
                    if ($sph_range_dioptre_lenses[0]->value_sph_range_dioptre_lens < 0):
                        @$selected = '-';
                    else:
                        @$selected = '+';
                    endif;

                    $data['ddlPlusMinus'] = form_dropdown('ddlPlusMinus', $optionForPlusMinus, @$selected, array('style' => 'width: 50px; float: right', 'required' => TRUE));

                    $data['form_value_sph_range_dioptre_lens'] = array(
                        'name' => 'tbValueSphRagneDioptre',
                        'id' => 'tbValueSphRagneDioptre',
                        'value' => $sph_range_dioptre_lenses[0]->value_sph_range_dioptre_lens,
                        'placeholder' => 'Iznos sph diptrije'
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

                            $plus_minus = $this->input->post('ddlPlusMinus');
                            $value_sph_range_dioptre_lens = trim($this->input->post('tbValueSphRagneDioptre'));

                            if ($plus_minus == '-'):
                                $plus_minus = "-";
                            else:
                                $plus_minus = '';
                            endif;

                            $this->load->library('form_validation');
                            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                            $this->form_validation->set_rules('tbValueSphRagneDioptre', 'iznos sph dioptrije', 'xss_clean|callback_name');

                            if ($this->form_validation->run()):

                                $where_value_sph_range_dioptre_lens = array(
                                    'value_sph_range_dioptre_lens' => $plus_minus . $value_sph_range_dioptre_lens
                                );
                                $this->sph_range_dioptre_lenses_model->where = $where_value_sph_range_dioptre_lens;
                                $result_value_sph_range_dioptre_lens = $this->sph_range_dioptre_lenses_model->select();

                                if ($result_value_sph_range_dioptre_lens == null):

                                    $where_id_min_max_sph_range_dioptre_lens = " min.value_sph_range_dioptre_lens = '" . $sph_range_dioptre_lenses[0]->value_sph_range_dioptre_lens . "' OR max.value_sph_range_dioptre_lens = '" . $sph_range_dioptre_lenses[0]->value_sph_range_dioptre_lens . "'";
                                    $this->ranges_dioptre_lenses_model->where = $where_id_min_max_sph_range_dioptre_lens;
                                    $result = $this->ranges_dioptre_lenses_model->select();

                                    if ($result == null):

                                        //unosenje podatak u model za upis u bazu
                                        $this->sph_range_dioptre_lenses_model->id_sph_range_dioptre_lens = $id;
                                        $this->sph_range_dioptre_lenses_model->value_sph_range_dioptre_lens = $plus_minus . $value_sph_range_dioptre_lens;

                                        $result_add_value_sph_range_dioptre_lens = $this->sph_range_dioptre_lenses_model->update();

                                        if ($result_add_value_sph_range_dioptre_lens != false):
                                            $this->session->set_flashdata('message', "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili sph dioptriju!</div>");
                                            if ($plus_minus == '-'):
                                                $plus_minus = "-";
                                            elseif ($plus_minus == ''):
                                                $plus_minus = '+';
                                            endif;
                                            $data_insert['value_sph_range_dioptre_lens'] = $value_sph_range_dioptre_lens;
                                            $data_insert['plus_minus'] = $plus_minus;
                                            if ($data_insert['plus_minus'] < 0):
                                                @$selected = '-';
                                            else:
                                                @$selected = '+';
                                            endif;

                                            $data['ddlPlusMinus'] = form_dropdown('ddlPlusMinus', $optionForPlusMinus, @$selected, array('style' => 'width: 50px; float: right', 'required' => TRUE));

                                            $data['form_value_sph_range_dioptre_lens'] = array(
                                                'name' => 'tbValueSphRagneDioptre',
                                                'id' => 'tbValueSphRagneDioptre',
                                                'value' => isset($data_insert['value_sph_range_dioptre_lens']) ? $data_insert['value_sph_range_dioptre_lens'] : '',
                                                'placeholder' => 'Iznos sph diptrije'
                                            );

                                            $data['form_add_submit'] = array(
                                                'name' => 'btnEdit',
                                                'id' => 'btnEdit',
                                                'value' => 'Izmeni',
                                                'style' => 'width: 80px; font-weight: bold; padding: 7px; border-radius: 10px',
                                                'class' => 'btn-primary'
                                            );
                                        else:
                                            $this->session->set_flashdata('message', "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Izmena sph dioptrije nije uspelo!</div>");
                                        endif;
                                    else:
                                        $this->session->set_flashdata('message', "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Izmena sph dioptrije nije uspelo! Izabranad vrednost je uneta u cenovnik!</div>");
                                    endif;
                                else:
                                    if ($plus_minus == '-'):
                                        $plus_minus = "-";
                                    elseif ($plus_minus == ''):
                                        $plus_minus = '+';
                                    endif;
                                    $data_insert['value_sph_range_dioptre_lens'] = $value_sph_range_dioptre_lens;
                                    $data_insert['plus_minus'] = $plus_minus;
                                    $this->session->set_flashdata('message', "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Uneta dioptrija vec postoji! Izmenite vrednost sph dioptrije!</div>");

                                endif;
                            else:
                                if ($plus_minus == '-'):
                                    $plus_minus = "-";
                                elseif ($plus_minus == ''):
                                    $plus_minus = '+';
                                endif;
                                $data_insert['value_sph_range_dioptre_lens'] = $value_sph_range_dioptre_lens;
                                $data_insert['plus_minus'] = $plus_minus;
                                $this->session->set_flashdata('message', "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
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

                $order_by_value_min_sph_range_dioptre_lens = "value_sph_range_dioptre_lens ASC";
                $this->sph_range_dioptre_lenses_model->order_by = $order_by_value_min_sph_range_dioptre_lens;
                $data['sph_range_dioptre_lenses'] = $this->sph_range_dioptre_lenses_model->select();

                $this->load->model('menu_model', 'submenu');
                $this->submenu->where = 'parent != 0';
                $data['submenu'] = $this->submenu->select();

                $this->load->model('menu_model', 'title_page');
                $data['title_page'] = $this->title_page->select();


                $data['user'] = $this->users_model->select();

                $data['company'] = $this->company_information_model->select();

                $data['sph_range_dioptre_lenses'] = $this->sph_range_dioptre_lenses_model->select();

                $data['title'] = "Opseg dioptrija sočiva";
                $view = "sales/add-edit/AddEditViewDioptreLens";
                $this->load_view_admin($view, $data);
            elseif ($action == "delete"):

                if (isset($_POST['idShpDioptre'])):
                    $id_post = $_POST['idShpDioptre'];

                    $where_id_min_max_sph_range_dioptre_lens = " min.id_sph_range_dioptre_lens = '" . $id_post . "' OR max.id_sph_range_dioptre_lens = '" . $id_post . "'";
                    $this->ranges_dioptre_lenses_model->where = $where_id_min_max_sph_range_dioptre_lens;
                    $result = $this->ranges_dioptre_lenses_model->select();
                    
                    if ($result == NULL):

                        $where_id_sph_dioptre = "sph_range_dioptre_lenses.id_sph_range_dioptre_lens = " . $id_post;
                        $this->sph_range_dioptre_lenses_model->where = $where_id_sph_dioptre;
                        $result_id_sph_dioptre = $this->sph_range_dioptre_lenses_model->delete();
                        if ($result_id_sph_dioptre == true):

                            $this->load->model('sph_range_dioptre_lenses_model', 'sph_range_dioptre_lenses');
                            $order_by_value_min_sph_range_dioptre_lens = "value_sph_range_dioptre_lens ASC";
                            $this->sph_range_dioptre_lenses->order_by = $order_by_value_min_sph_range_dioptre_lens;
                            $sph_range_dioptre_lenses = $this->sph_range_dioptre_lenses->select();

                            $data = '<table style="width: 20%; border: 1px solid; padding: 10px; margin: 0px auto; ">';
                            $data .= '<tr class="border3">';
                            $data .= '<th class="border text-alignC">Sph</th>';
                            $data .= '<th class="border text-alignC">Akcija</th>';
                            $data .= '</tr>';
                            foreach ($sph_range_dioptre_lenses as $s):
                                $data .= '<tr class="border text-alignC">';
                                $data .= '<td class="border" style="width: 40%">' . $s->value_sph_range_dioptre_lens . '</td>';
                                $data .= '<td style="width: 60%">';
                                $data .= '<a href="' . base_url() . 'administration/sales/RangeDioptreLensSales/viewDioptre/edit/' . $s->id_sph_range_dioptre_lens . '">Izmeni</a>';
                                $data .= '&nbsp;|&nbsp;';
                                $data .= '<a href="#" class="deleteShpDioptre" data-id="' . $s->id_sph_range_dioptre_lens . '">Obriši</a>';
                                $data .= '</td>';
                                $data .= '</tr>';
                            endforeach;
                            $data .= '</table>';
                            echo json_encode($data);
                        else:
                            $message = $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Niste obrisali sph dioptriju!</div>");
                        endif;
                    else:
                        $message = $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Odabrana dioptrija je dodata u cenovnik!</div>");

                    endif;
                else:
                    redirect('administration/sales/RangeDioptreLensSales/viewDioptre', 'refresh');
                endif;
            else:
                redirect('administration/sales/RangeDioptreLensSales/viewDioptre');
            endif;
        else:
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

            $order_by_value_min_sph_range_dioptre_lens = "value_sph_range_dioptre_lens ASC";
            $this->sph_range_dioptre_lenses_model->order_by = $order_by_value_min_sph_range_dioptre_lens;
            $data['sph_range_dioptre_lenses'] = $this->sph_range_dioptre_lenses_model->select();

            $this->load->model('menu_model', 'submenu');
            $this->submenu->where = 'parent != 0';
            $data['submenu'] = $this->submenu->select();

            $this->load->model('menu_model', 'title_page');
            $data['title_page'] = $this->title_page->select();


            $data['user'] = $this->users_model->select();

            $data['company'] = $this->company_information_model->select();

            $data['sph_range_dioptre_lenses'] = $this->sph_range_dioptre_lenses_model->select();

            $data['title'] = "Opseg dioptrija sočiva";
            $view = "sales/ViewDioptreHome";
            $this->load_view_admin($view, $data);
        endif;
    }

    public function searchMinMax() {
        if (isset($_POST['idMinRangeDioptre']) && isset($_POST['idMaxRangeDioptre'])):
            $idMin = $_POST['idMinRangeDioptre'];
            $idMax = $_POST['idMaxRangeDioptre'];

            $where_id_min_max_range_dioptre_lens = " id_min_sph_range_dioptre_lens = " . $idMin . " AND id_max_sph_range_dioptre_lens = " . $idMax;
            $orderby_id_min_max_range_dioptre_lens = "min.value_sph_range_dioptre_lens ASC, max.value_sph_range_dioptre_lens ASC, ranges_dioptre_lenses.cyl_range_dioptre_lens ASC, ranges_dioptre_lenses.add_range_dioptre_lens ASC";
            $this->ranges_dioptre_lenses_model->where = $where_id_min_max_range_dioptre_lens;
            $this->ranges_dioptre_lenses_model->order_by = $orderby_id_min_max_range_dioptre_lens;
            $result_id_min_max_range_dioptre_lens = $this->ranges_dioptre_lenses_model->select();

            if ($result_id_min_max_range_dioptre_lens == true):
                $data = '<table style="width: 98%; border: 1px solid; padding: 10px; margin: 10px 10px;">';
                $data .= '<tr class="border3">';
                $data .= '<th class="border text-alignC">Minimalni iznos sph</th>';
                $data .= '<th class="border text-alignC">Maximalni iznos sph</th>';
                $data .= '<th class="border text-alignC">Iznos cyl</th>';
                $data .= '<th class="border text-alignC">Iznos Adicije</th>';
                $data .= '<th class="border text-alignC">Akcija</th>';
                $data .= '</tr>';
                $sph_range_dioptre_lenses = $this->sph_range_dioptre_lenses_model->select();
                foreach ($result_id_min_max_range_dioptre_lens as $c):
                    $data .= '<tr class="border text-alignC">';
                    $data .= '<td class="border">';
                    foreach ($sph_range_dioptre_lenses as $s):
                        if ($c->id_min_sph_range_dioptre_lens == $s->id_sph_range_dioptre_lens):
                            $data .= $s->value_sph_range_dioptre_lens;
                        endif;
                    endforeach;
                    $data .= '</td>';
                    $data .= '<td class="border">';
                    foreach ($sph_range_dioptre_lenses as $s):
                        if ($c->id_max_sph_range_dioptre_lens == $s->id_sph_range_dioptre_lens):
                            $data .= $s->value_sph_range_dioptre_lens;
                        endif;
                    endforeach;
                    $data .= '</td>';
                    $data .= '<td class="border">' . $c->cyl_range_dioptre_lens . '</td>';
                    $data .= '<td class="border">' . $c->add_range_dioptre_lens . '</td>';
                    $data .= '<td>';
                    $data .= '<a href="' . base_url() . 'administration/sales/RangeDioptreLensSales/edit/' . $c->id_range_dioptre_lens . '">Izmeni</a>';
                    $data .= '&nbsp;|&nbsp;';
                    $data .= '<a href="#" class="deleteRangeDioptreLens" data-id="' . $c->id_range_dioptre_lens . '">Obriši</a>';
                    $data .= '</td>';
                    $data .= '</tr>';
                endforeach;
                $data .= '</table>';
                echo json_encode($data);
            else:
                $message = $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Odabrania dioptrija ne postoji u opsegu!</div>");
            endif;
        elseif (isset($_POST['idMinRangeDioptre'])):
            $idMin = $_POST['idMinRangeDioptre'];

            $where_id_min_range_dioptre_lens = " id_min_sph_range_dioptre_lens = " . $idMin;
            $orderby_id_min_max_range_dioptre_lens = "min.value_sph_range_dioptre_lens ASC, max.value_sph_range_dioptre_lens ASC, ranges_dioptre_lenses.cyl_range_dioptre_lens ASC, ranges_dioptre_lenses.add_range_dioptre_lens ASC";
            $this->ranges_dioptre_lenses_model->where = $where_id_min_range_dioptre_lens;
            $this->ranges_dioptre_lenses_model->order_by = $orderby_id_min_max_range_dioptre_lens;
            $result_id_min_range_dioptre_lens = $this->ranges_dioptre_lenses_model->select();

            if ($result_id_min_range_dioptre_lens == true):

                $data = '<table style="width: 98%; border: 1px solid; padding: 10px; margin: 10px 10px;">';
                $data .= '<tr class="border3">';
                $data .= '<th class="border text-alignC">Minimalni iznos sph</th>';
                $data .= '<th class="border text-alignC">Maximalni iznos sph</th>';
                $data .= '<th class="border text-alignC">Iznos cyl</th>';
                $data .= '<th class="border text-alignC">Iznos Adicije</th>';
                $data .= '<th class="border text-alignC">Akcija</th>';
                $data .= '</tr>';
                $sph_range_dioptre_lenses = $this->sph_range_dioptre_lenses_model->select();
                foreach ($result_id_min_range_dioptre_lens as $c):
                    $data .= '<tr class="border text-alignC">';
                    $data .= '<td class="border">';
                    foreach ($sph_range_dioptre_lenses as $s):
                        if ($c->id_min_sph_range_dioptre_lens == $s->id_sph_range_dioptre_lens):
                            $data .= $s->value_sph_range_dioptre_lens;
                        endif;
                    endforeach;
                    $data .= '</td>';
                    $data .= '<td class="border">';
                    foreach ($sph_range_dioptre_lenses as $s):
                        if ($c->id_max_sph_range_dioptre_lens == $s->id_sph_range_dioptre_lens):
                            $data .= $s->value_sph_range_dioptre_lens;
                        endif;
                    endforeach;
                    $data .= '</td>';
                    $data .= '<td class="border">' . $c->cyl_range_dioptre_lens . '</td>';
                    $data .= '<td class="border">' . $c->add_range_dioptre_lens . '</td>';
                    $data .= '<td>';
                    $data .= '<a href="' . base_url() . 'administration/sales/RangeDioptreLensSales/edit/' . $c->id_range_dioptre_lens . '">Izmeni</a>';
                    $data .= '&nbsp;|&nbsp;';
                    $data .= '<a href="#" class="deleteRangeDioptreLens" data-id="' . $c->id_range_dioptre_lens . '">Obriši</a>';
                    $data .= '</td>';
                    $data .= '</tr>';
                endforeach;
                $data .= '</table>';
                echo json_encode($data);
            else:
                $message = $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Odabrania dioptrija ne postoji u opsegu!</div>");
            endif;
        elseif (isset($_POST['idMaxRangeDioptre'])):
            $idMax = $_POST['idMaxRangeDioptre'];

            $where_id_max_range_dioptre_lens = " id_max_sph_range_dioptre_lens = " . $idMax;
            $orderby_id_min_max_range_dioptre_lens = " min.value_sph_range_dioptre_lens ASC, max.value_sph_range_dioptre_lens ASC, ranges_dioptre_lenses.cyl_range_dioptre_lens ASC, ranges_dioptre_lenses.add_range_dioptre_lens ASC";
            $this->ranges_dioptre_lenses_model->where = $where_id_max_range_dioptre_lens;
            $this->ranges_dioptre_lenses_model->order_by = $orderby_id_min_max_range_dioptre_lens;
            $result_id_max_range_dioptre_lens = $this->ranges_dioptre_lenses_model->select();

            if ($result_id_max_range_dioptre_lens == true):

                $data = '<table style="width: 98%; border: 1px solid; padding: 10px; margin: 10px 10px;">';
                $data .= '<tr class="border3">';
                $data .= '<th class="border text-alignC">Minimalni iznos sph</th>';
                $data .= '<th class="border text-alignC">Maximalni iznos sph</th>';
                $data .= '<th class="border text-alignC">Iznos cyl</th>';
                $data .= '<th class="border text-alignC">Iznos Adicije</th>';
                $data .= '<th class="border text-alignC">Akcija</th>';
                $data .= '</tr>';
                $sph_range_dioptre_lenses = $this->sph_range_dioptre_lenses_model->select();
                foreach ($result_id_max_range_dioptre_lens as $c):
                    $data .= '<tr class="border text-alignC">';
                    $data .= '<td class="border">';
                    foreach ($sph_range_dioptre_lenses as $s):
                        if ($c->id_min_sph_range_dioptre_lens == $s->id_sph_range_dioptre_lens):
                            $data .= $s->value_sph_range_dioptre_lens;
                        endif;
                    endforeach;
                    $data .= '</td>';
                    $data .= '<td class="border">';
                    foreach ($sph_range_dioptre_lenses as $s):
                        if ($c->id_max_sph_range_dioptre_lens == $s->id_sph_range_dioptre_lens):
                            $data .= $s->value_sph_range_dioptre_lens;
                        endif;
                    endforeach;
                    $data .= '</td>';
                    $data .= '<td class="border">' . $c->cyl_range_dioptre_lens . '</td>';
                    $data .= '<td class="border">' . $c->add_range_dioptre_lens . '</td>';
                    $data .= '<td>';
                    $data .= '<a href="' . base_url() . 'administration/sales/RangeDioptreLensSales/edit/' . $c->id_range_dioptre_lens . '">Izmeni</a>';
                    $data .= '&nbsp;|&nbsp;';
                    $data .= '<a href="#" class="deleteRangeDioptreLens" data-id="' . $c->id_range_dioptre_lens . '">Obriši</a>';
                    $data .= '</td>';
                    $data .= '</tr>';
                endforeach;
                $data .= '</table>';
                echo json_encode($data);
            else:
                $message = $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Odabrania dioptrija ne postoji u opsegu!</div>");
            endif;
        else:
            redirect('administration/sales/RangeDioptreLensSales', 'refresh');
        endif;
    }

    function minsph($str) {
        if ($str == ''):
            $this->form_validation->set_message('minsph', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#ddlMinSphRangeDioptreLens').css('border', '1px solid red');"
                    . "$('.ddlMinSphRangeDioptreLensCss').css('display', 'block');"
                    . "$('.ddlMinSphRangeDioptreLensCss').text('* Polje za {field} mora biti uzabrano!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        else:
            return TRUE;
        endif;
    }

    function maxsph($str) {
        if ($str == ''):
            $this->form_validation->set_message('maxsph', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#ddlMaxSphRangeDioptreLens').css('border', '1px solid red');"
                    . "$('.ddlMaxSphRangeDioptreLensCss').css('display', 'block');"
                    . "$('.ddlMaxSphRangeDioptreLensCss').text('* Polje za {field} mora biti uzabrano!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        else:
            return TRUE;
        endif;
    }

    public function cyl($str) {
//        $regExp = "/^\d{1,}$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        $regExp = "/^\d{1,}\.\d{1,2}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('cyl', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbCylRangeLens').css('border', '1px solid red');"
                        . "$('.tbCylRangeLensCss').css('display', 'block');"
                        . "$('.tbCylRangeLensCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('cyl', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#tbCylRangeLens').css('border', '1px solid red');"
                    . "$('.tbCylRangeLensCss').css('display', 'block');"
                    . "$('.tbCylRangeLensCss').text('* Polje za {field} mora biti uneto!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        endif;
    }

    public function add($str) {
//        $regExp = "/^\d{1,}$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        $regExp = "/^\d{1,}\.\d{1,2}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('add', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbAddRangeLens').css('border', '1px solid red');"
                        . "$('.tbAddRangeLensCss').css('display', 'block');"
                        . "$('.tbAddRangeLensCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }

    function checkSameSphRangeDioptreLens($input, $fieldlist) {
        list($inputMin, $inputMax) = explode("||", $fieldlist, 2);
        if ($inputMin == $inputMax) {
            $this->form_validation->set_message('checkSameSphRangeDioptreLens', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#ddlMinSphRangeDioptreLens').css('border', '1px solid red');"
                    . "$('.ddlMinSphRangeDioptreLensCss').css('display', 'block');"
                    . "$('.ddlMinSphRangeDioptreLensCss').text('Polja za min i max iznos sph ne mogu biti isti!'); "
                    . "$('#ddlMaxSphRangeDioptreLens').css('border', '1px solid red');"
                    . "$('.ddlMaxSphRangeDioptreLensCss').css('display', 'block');"
                    . "});"
                    . "</script>");
            return false;
        } else {
            return true;
        }
    }

    public function name($str) {
//        $regExp = "/^\d{1,}$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        $regExp = "/^\d{1,}\.\d{1,2}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('name', "<script>"
                        . "$(document).ready(function () { "
                        . "$('.tbValueSphRagneDioptre').css('border', '1px solid red');"
                        . "$('.tbValueSphRagneDioptreCss').css('display', 'block');"
                        . "$('.tbValueSphRagneDioptreCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('name', "<script>"
                    . "$(document).ready(function () { "
                    . "$('.tbValueSphRagneDioptre').css('border', '1px solid red');"
                    . "$('.tbValueSphRagneDioptreCss').css('display', 'block');"
                    . "$('.tbValueSphRagneDioptreCss').text('* Polje za {field} mora biti uneto!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        endif;
    }

}
