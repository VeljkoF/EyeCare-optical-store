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
class PriceListLensSales extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('company_information_model');
        $this->load->model('users_model');
        $this->load->model('pricelist_lenses_model');
        $this->load->model('sph_range_dioptre_lenses_model');
        $this->load->model('producers_lenses_model');
        $this->load->model('material_lenses_model');
        $this->load->model('type_lenses_model');
        $this->load->model('designs_lenses_model');
        $this->load->model('index_lenses_model');
        $this->load->model('name_lenses_model');
        $this->load->model('finishing_lenses_model');
        $this->load->model('order_lists_model');
    }

    public function index() {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $this->pricelist_lenses_model->order_by = "name_producer_lens, name_material_lens, name_type_lens, name_design_lens, name_index_lens, name_name_lens, name_finishing_lens, price_pricelist_lens, min.value_sph_range_dioptre_lens, max.value_sph_range_dioptre_lens, cyl_range_dioptre_lens, add_range_dioptre_lens, name_diameter_lens ASC";
        $pricelist_lens = $this->pricelist_lenses_model->select();
        $data['pricelist_lens'] = $pricelist_lens;
        $data['sph_range_dioptre_lenses'] = $this->sph_range_dioptre_lenses_model->select();

        $order_by_name_producer_lens = "name_producer_lens ASC";
        $this->producers_lenses_model->order_by = $order_by_name_producer_lens;
        $nameProducerLens = $this->producers_lenses_model->select();
        $optionForNameProducerLens = array('' => "Sve");
        foreach ($nameProducerLens as $s):
            $optionForNameProducerLens += array($s->id_producer_lens => $s->name_producer_lens);
        endforeach;
        $data['ddlNameProducerLens'] = form_dropdown('ddlNameProducerLens', $optionForNameProducerLens, @$selected, array('style' => 'width: 100px', 'class' => 'ddlNameProducerLens'));

        $order_by_name_material_lens = "name_material_lens ASC";
        $this->material_lenses_model->order_by = $order_by_name_material_lens;
        $nameMaterialLens = $this->material_lenses_model->select();
        $optionForNameMaterialLens = array('' => "Sve");
        foreach ($nameMaterialLens as $s):
            $optionForNameMaterialLens += array($s->id_material_lens => $s->name_material_lens);
        endforeach;
        $data['ddlNameMaterialLens'] = form_dropdown('ddlNameMaterialLens', $optionForNameMaterialLens, @$selected, array('style' => 'width: 100px', 'class' => 'ddlNameMaterialLens'));

        $order_by_order_type_lens = "order_type_lens ASC";
        $this->type_lenses_model->order_by = $order_by_order_type_lens;
        $nameTypeLens = $this->type_lenses_model->select();
        $optionForNameTypeLens = array('' => "Sve");
        foreach ($nameTypeLens as $s):
            $optionForNameTypeLens += array($s->id_type_lens => $s->name_type_lens);
        endforeach;
        $data['ddlNameTypeLens'] = form_dropdown('ddlNameTypeLens', $optionForNameTypeLens, @$selected, array('style' => 'width: 100px', 'class' => 'ddlNameTypeLens'));

        $order_by_name_design_lens = "name_design_lens ASC";
        $this->designs_lenses_model->order_by = $order_by_name_design_lens;
        $nameDesignLens = $this->designs_lenses_model->select();
        $optionForNameDesignLens = array('' => "Sve");
        foreach ($nameDesignLens as $s):
            $optionForNameDesignLens += array($s->id_design_lens => $s->name_design_lens);
        endforeach;
        $data['ddlNameDesignLens'] = form_dropdown('ddlNameDesignLens', $optionForNameDesignLens, @$selected, array('style' => 'width: 100px', 'class' => 'ddlNameDesignLens'));

        $order_by_name_index_lens = "name_index_lens ASC";
        $this->index_lenses_model->order_by = $order_by_name_index_lens;
        $nameIndexLens = $this->index_lenses_model->select();
        $optionForNameIndexLens = array('' => "Sve");
        foreach ($nameIndexLens as $s):
            $optionForNameIndexLens += array($s->id_index_lens => $s->name_index_lens);
        endforeach;
        $data['ddlNameIndexLens'] = form_dropdown('ddlNameIndexLens', $optionForNameIndexLens, @$selected, array('style' => 'width: 100px', 'class' => 'ddlNameIndexLens'));

        $order_by_name_lenses_model = "name_name_lens ASC";
        $this->name_lenses_model->order_by = $order_by_name_lenses_model;
        $nameNameLens = $this->name_lenses_model->select();
        $optionForNameNameLens = array('' => "Sve");
        foreach ($nameNameLens as $s):
            $optionForNameNameLens += array($s->id_name_lens => $s->name_name_lens);
        endforeach;
        $data['ddlNameNameLens'] = form_dropdown('ddlNameNameLens', $optionForNameNameLens, @$selected, array('style' => 'width: 100px', 'class' => 'ddlNameNameLens'));

        $order_by_name_lenses_model = "name_finishing_lens ASC";
        $this->finishing_lenses_model->order_by = $order_by_name_lenses_model;
        $nameFinishingLens = $this->finishing_lenses_model->select();
        $optionForNameFinishingLens = array('' => "Sve");
        foreach ($nameFinishingLens as $s):
            $optionForNameFinishingLens += array($s->id_finishing_lens => $s->name_finishing_lens);
        endforeach;
        $data['ddlNameFinishingLens'] = form_dropdown('ddlNameFinishingLens', $optionForNameFinishingLens, @$selected, array('style' => 'width: 100px', 'class' => 'ddlNameFinishingLens'));



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

        $data['title'] = "Cenovnika sočiva";
        $view = "sales/PriceListSales";
        $this->load_view_admin($view, $data);
    }

    public function insert() {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $sph_range_dioptre_lenses = $this->sph_range_dioptre_lenses_model->select();
        $data['sph_range_dioptre_lenses'] = $sph_range_dioptre_lenses;

        $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
        if ($is_post):

            $button = $this->input->post('btnAdd');
            if ($button != ""):
                $ddlProducerLens = $this->input->post('ddlProducerLens');
                $ddlMaterialLens = $this->input->post('ddlMaterialLens');
                $ddlTypeLens = $this->input->post('ddlTypeLens');
                $ddlDesignLens = $this->input->post('ddlDesignLens');
                $ddlIndexLens = $this->input->post('ddlIndexLens');
                $ddlNameLens = $this->input->post('ddlNameLens');
                $ddlFinishingLens = $this->input->post('ddlFinishingLens');
                $tbPriceLensPricelist = trim($this->input->post('tbPriceLensPricelist'));
                $ddlRangeDioptreLens = $this->input->post('ddlRangeDioptreLens');
                $ddlDiameterLens = $this->input->post('ddlDiameterLens');

                $this->load->library('form_validation');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                $this->form_validation->set_rules('ddlProducerLens', 'proizvođač sočiva', 'xss_clean|required|callback_checkFunction');
                $this->form_validation->set_rules('ddlMaterialLens', 'materijal sočiva', 'xss_clean|required|callback_checkFunction');
                $this->form_validation->set_rules('ddlTypeLens', 'tip sočiva', 'xss_clean|required|callback_checkFunction');
                $this->form_validation->set_rules('ddlDesignLens', 'dizajn sočiva', 'xss_clean|required|callback_checkFunction');
                $this->form_validation->set_rules('ddlIndexLens', 'index sočiva', 'xss_clean|required|callback_checkFunction');
                $this->form_validation->set_rules('ddlNameLens', 'ime sočiva', 'xss_clean|required|callback_checkFunction');
                $this->form_validation->set_rules('ddlFinishingLens', 'dorada sočiva', 'xss_clean|required|callback_checkFunction');
                $this->form_validation->set_rules('tbPriceLensPricelist', 'cena sočiva', 'xss_clean|required|callback_pricelens');
                $this->form_validation->set_rules('ddlRangeDioptreLens', 'opseg dioptrije sočiva', 'xss_clean|required|callback_checkFunction');
                $this->form_validation->set_rules('ddlDiameterLens', 'prečnik sočiva', 'xss_clean|required|callback_checkFunction');

                $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');
                $this->form_validation->set_message('checkFunction', 'Polje za %s mora biti izabrano!');

                if ($this->form_validation->run()):

                    //unosenje podatak u model za upis u bazu
                    $this->pricelist_lenses_model->id_producer_lens = $ddlProducerLens;
                    $this->pricelist_lenses_model->id_material_lens = $ddlMaterialLens;
                    $this->pricelist_lenses_model->id_type_lens = $ddlTypeLens;
                    $this->pricelist_lenses_model->id_design_lens = $ddlDesignLens;
                    $this->pricelist_lenses_model->id_index_lens = $ddlIndexLens;
                    if ($ddlNameLens != ''):
                        $this->pricelist_lenses_model->id_name_lens = $ddlNameLens;
                    else:
                        $this->pricelist_lenses_model->id_name_lens = NULL;
                    endif;
                    $this->pricelist_lenses_model->id_finishing_lens = $ddlFinishingLens;
                    $this->pricelist_lenses_model->price_pricelist_lens = $tbPriceLensPricelist;
                    $this->pricelist_lenses_model->id_range_dioptre_lens = $ddlRangeDioptreLens;
                    $this->pricelist_lenses_model->id_diameter_lens = $ddlDiameterLens;


                    $result_pricelist_lens = $this->pricelist_lenses_model->insert();

                    if ($result_pricelist_lens != ""):
                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste dodali novu stavku u cenovniku!</div>");
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Dodavanje nove stave u cenovnik nije uspelo!</div>");
                    endif;
                else:
                    $data_insert['id_producer_lens'] = $ddlProducerLens;
                    $data_insert['id_material_lens'] = $ddlMaterialLens;
                    $data_insert['id_type_lens'] = $ddlTypeLens;
                    $data_insert['id_design_lens'] = $ddlDesignLens;
                    $data_insert['id_index_lens'] = $ddlIndexLens;
                    $data_insert['id_name_lens'] = $ddlNameLens;
                    $data_insert['id_finishing_lens'] = $ddlFinishingLens;
                    $data_insert['price_pricelist_lens'] = $tbPriceLensPricelist;
                    $data_insert['id_range_dioptre_lens'] = $ddlRangeDioptreLens;
                    $data_insert['id_diameter_lens'] = $ddlDiameterLens;

                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                endif;
            endif;
        endif;

        $data['form_pricelist_lens'] = array(
            'class' => 'form',
            'accept-charset' => 'utf-8',
            'method' => 'POST'
        );

        $this->load->model('producers_lenses_model');
        $order_by_name_producer_lens = "name_producer_lens ASC";
        $this->producers_lenses_model->order_by = $order_by_name_producer_lens;
        $producersLensOption = $this->producers_lenses_model->select();
        $optionForProducerLens = array('' => 'Izaberi...');
        foreach ($producersLensOption as $s):
            $optionForProducerLens += array($s->id_producer_lens => $s->name_producer_lens);
        endforeach;
        @$selected = $data_insert['id_producer_lens'];
        $data['ddlProducerLens'] = form_dropdown('ddlProducerLens', $optionForProducerLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlProducerLens'));


        $this->load->model('material_lenses_model');
        $order_by_name_material_lens = "name_material_lens ASC";
        $this->material_lenses_model->order_by = $order_by_name_material_lens;
        $materialLensOption = $this->material_lenses_model->select();
        $optionForMaterialLens = array('' => 'Izaberi...');
        foreach ($materialLensOption as $s):
            $optionForMaterialLens += array($s->id_material_lens => $s->name_material_lens);
        endforeach;
        @$selected = $data_insert['id_material_lens'];
        $data['ddlMaterialLens'] = form_dropdown('ddlMaterialLens', $optionForMaterialLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlMaterialLens'));


        $this->load->model('type_lenses_model');
        $order_by_name_type_lens = "order_type_lens ASC";
        $this->type_lenses_model->order_by = $order_by_name_type_lens;
        $typeLensOption = $this->type_lenses_model->select();
        $optionForTypeLens = array('' => 'Izaberi...');
        foreach ($typeLensOption as $s):
            $optionForTypeLens += array($s->id_type_lens => $s->name_type_lens);
        endforeach;
        @$selected = $data_insert['id_type_lens'];
        $data['ddlTypeLens'] = form_dropdown('ddlTypeLens', $optionForTypeLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlTypeLens'));


        $this->load->model('designs_lenses_model');
        $order_by_name_design_lens = "name_design_lens ASC";
        $this->designs_lenses_model->order_by = $order_by_name_design_lens;
        $designLensOption = $this->designs_lenses_model->select();
        $optionForDesignLens = array('' => 'Izaberi...');
        foreach ($designLensOption as $s):
            $optionForDesignLens += array($s->id_design_lens => $s->name_design_lens);
        endforeach;
        @$selected = $data_insert['id_design_lens'];
        $data['ddlDesignLens'] = form_dropdown('ddlDesignLens', $optionForDesignLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlDesignLens'));


        $this->load->model('index_lenses_model');
        $order_by_name_index_lens = "name_index_lens ASC";
        $this->index_lenses_model->order_by = $order_by_name_index_lens;
        $indexLensOption = $this->index_lenses_model->select();
        $optionForIndexLens = array('' => 'Izaberi...');
        foreach ($indexLensOption as $s):
            $optionForIndexLens += array($s->id_index_lens => $s->name_index_lens);
        endforeach;
        @$selected = $data_insert['id_index_lens'];
        $data['ddlIndexLens'] = form_dropdown('ddlIndexLens', $optionForIndexLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlIndexLens'));


        $this->load->model('name_lenses_model');
        $order_by_name_name_lens = "name_name_lens ASC";
        $this->name_lenses_model->order_by = $order_by_name_name_lens;
        $nameLensOption = $this->name_lenses_model->select();
        $optionForNameLens = array('' => 'Izaberi...');
        foreach ($nameLensOption as $s):
            $optionForNameLens += array($s->id_name_lens => $s->name_name_lens);
        endforeach;
        @$selected = $data_insert['id_name_lens'];
        $data['ddlNameLens'] = form_dropdown('ddlNameLens', $optionForNameLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlNameLens'));


        $this->load->model('finishing_lenses_model');
        $order_by_name_finishing_lens = "name_finishing_lens ASC";
        $this->finishing_lenses_model->order_by = $order_by_name_finishing_lens;
        $finishingLensOption = $this->finishing_lenses_model->select();
        $optionForFinishingLens = array('' => 'Izaberi...');
        foreach ($finishingLensOption as $s):
            $optionForFinishingLens += array($s->id_finishing_lens => $s->name_finishing_lens);
        endforeach;
        @$selected = $data_insert['id_finishing_lens'];
        $data['ddlFinishingLens'] = form_dropdown('ddlFinishingLens', $optionForFinishingLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlFinishingLens'));

        $data['form_price_pricelist_lens'] = array(
            'name' => 'tbPriceLensPricelist',
            'id' => 'tbPriceLensPricelist',
            'class' => 'tbPriceLensPricelist',
            'value' => isset($data_insert['price_pricelist_lens']) ? $data_insert['price_pricelist_lens'] : '',
            'placeholder' => 'Cena u evrima',
            'size' => '27px'
        );

        $this->load->model('ranges_dioptre_lenses_model');
        $order_by_id_range_dioptre_lens = "min.value_sph_range_dioptre_lens, max.value_sph_range_dioptre_lens, cyl_range_dioptre_lens, add_range_dioptre_lens ASC";
        $this->ranges_dioptre_lenses_model->order_by = $order_by_id_range_dioptre_lens;
        $rangeDioptreLensOption = $this->ranges_dioptre_lenses_model->select();
        $optionForRangeDioptreLens = array('' => 'Izaberi...');
        foreach ($rangeDioptreLensOption as $s):
            foreach ($sph_range_dioptre_lenses as $l):
                if ($s->id_max_sph_range_dioptre_lens == $l->id_sph_range_dioptre_lens):
                    $max = $l->value_sph_range_dioptre_lens;
                endif;
            endforeach;
            foreach ($sph_range_dioptre_lenses as $l):
                if ($s->id_min_sph_range_dioptre_lens == $l->id_sph_range_dioptre_lens):
                    $min = $l->value_sph_range_dioptre_lens;
                endif;
            endforeach;
            if ($s->add_range_dioptre_lens != null):
                $optionForRangeDioptreLens += array(
                    $s->id_range_dioptre_lens => $min . " / " . $max . " / " . $s->cyl_range_dioptre_lens . " / " . $s->add_range_dioptre_lens
                );
            else:
                $optionForRangeDioptreLens += array(
                    $s->id_range_dioptre_lens => $min . " / " . $max . " / " . $s->cyl_range_dioptre_lens
                );
            endif;
        endforeach;
        @$selected = $data_insert['id_range_dioptre_lens'];
        $data['ddlRangeDioptreLens'] = form_dropdown('ddlRangeDioptreLens', $optionForRangeDioptreLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlRangeDioptreLens'));

        $this->load->model('diameter_lenses_model');
        $order_by_name_diameter_lens = "name_diameter_lens ASC";
        $this->diameter_lenses_model->order_by = $order_by_name_diameter_lens;
        $diameterLensOption = $this->diameter_lenses_model->select();
        $optionForDiameterLens = array('' => "Izaberi...");
        foreach ($diameterLensOption as $s):
            $optionForDiameterLens += array($s->id_diameter_lens => $s->name_diameter_lens);
        endforeach;

        @$selected = $data_insert['id_diameter_lens'];
        $data['ddlDiameterLens'] = form_dropdown('ddlDiameterLens', $optionForDiameterLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlDiameterLens'));

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

        $data['company'] = $this->company_information_model->select();

        $data['title'] = "Dodaj novu stavku u cenovniku sočiva";
        $view = "sales/add-edit/AddEditPriceListLens";
        $this->load_view_admin($view, $data);
    }

    public function edit($id = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        if ($id != null):

            $where_pricelist_lens = array(
                'id_pricelist_lens' => $id
            );

            $this->pricelist_lenses_model->where = $where_pricelist_lens;
            $pricelist_lens = $this->pricelist_lenses_model->short_select();
            $sph_range_dioptre_lenses = $this->sph_range_dioptre_lenses_model->select();
            $data['sph_range_dioptre_lenses'] = $sph_range_dioptre_lenses;

            $data['pricelist_lens'] = $pricelist_lens;

            $data['form_pricelist_lens'] = array(
                'class' => 'form',
                'accept-charset' => 'utf-8',
                'method' => 'POST'
            );

            $this->load->model('producers_lenses_model');
            $order_by_name_producer_lens = "name_producer_lens ASC";
            $this->producers_lenses_model->order_by = $order_by_name_producer_lens;
            $producersLensOption = $this->producers_lenses_model->select();
            $optionForProducerLens = array();
            foreach ($producersLensOption as $s):
                $optionForProducerLens += array($s->id_producer_lens => $s->name_producer_lens);
            endforeach;
            @$selected = $pricelist_lens[0]->id_producer_lens;
            $data['ddlProducerLens'] = form_dropdown('ddlProducerLens', $optionForProducerLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlProducerLens'));


            $this->load->model('material_lenses_model');
            $order_by_name_material_lens = "name_material_lens ASC";
            $this->material_lenses_model->order_by = $order_by_name_material_lens;
            $materialLensOption = $this->material_lenses_model->select();
            $optionForMaterialLens = array();
            foreach ($materialLensOption as $s):
                $optionForMaterialLens += array($s->id_material_lens => $s->name_material_lens);
            endforeach;
            @$selected = $pricelist_lens[0]->id_material_lens;
            $data['ddlMaterialLens'] = form_dropdown('ddlMaterialLens', $optionForMaterialLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlMaterialLens'));


            $this->load->model('type_lenses_model');
            $order_by_name_type_lens = "order_type_lens ASC";
            $this->type_lenses_model->order_by = $order_by_name_type_lens;
            $typeLensOption = $this->type_lenses_model->select();
            $optionForTypeLens = array();
            foreach ($typeLensOption as $s):
                $optionForTypeLens += array($s->id_type_lens => $s->name_type_lens);
            endforeach;
            @$selected = $pricelist_lens[0]->id_type_lens;
            $data['ddlTypeLens'] = form_dropdown('ddlTypeLens', $optionForTypeLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlTypeLens'));


            $this->load->model('designs_lenses_model');
            $order_by_name_design_lens = "name_design_lens ASC";
            $this->designs_lenses_model->order_by = $order_by_name_design_lens;
            $designLensOption = $this->designs_lenses_model->select();
            $optionForDesignLens = array();
            foreach ($designLensOption as $s):
                $optionForDesignLens += array($s->id_design_lens => $s->name_design_lens);
            endforeach;
            @$selected = $pricelist_lens[0]->id_design_lens;
            $data['ddlDesignLens'] = form_dropdown('ddlDesignLens', $optionForDesignLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlDesignLens'));


            $this->load->model('index_lenses_model');
            $order_by_name_index_lens = "name_index_lens ASC";
            $this->index_lenses_model->order_by = $order_by_name_index_lens;
            $indexLensOption = $this->index_lenses_model->select();
            $optionForIndexLens = array();
            foreach ($indexLensOption as $s):
                $optionForIndexLens += array($s->id_index_lens => $s->name_index_lens);
            endforeach;
            @$selected = $pricelist_lens[0]->id_index_lens;
            $data['ddlIndexLens'] = form_dropdown('ddlIndexLens', $optionForIndexLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlIndexLens'));


            $this->load->model('name_lenses_model');
            $order_by_name_name_lens = "name_name_lens ASC";
            $this->name_lenses_model->order_by = $order_by_name_name_lens;
            $nameLensOption = $this->name_lenses_model->select();
            $optionForNameLens = array();
            foreach ($nameLensOption as $s):
                $optionForNameLens += array($s->id_name_lens => $s->name_name_lens);
            endforeach;
            @$selected = $pricelist_lens[0]->id_name_lens;
            $data['ddlNameLens'] = form_dropdown('ddlNameLens', $optionForNameLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlNameLens'));


            $this->load->model('finishing_lenses_model');
            $order_by_name_finishing_lens = "name_finishing_lens ASC";
            $this->finishing_lenses_model->order_by = $order_by_name_finishing_lens;
            $finishingLensOption = $this->finishing_lenses_model->select();
            $optionForFinishingLens = array();
            foreach ($finishingLensOption as $s):
                $optionForFinishingLens += array($s->id_finishing_lens => $s->name_finishing_lens);
            endforeach;
            @$selected = $pricelist_lens[0]->id_finishing_lens;
            $data['ddlFinishingLens'] = form_dropdown('ddlFinishingLens', $optionForFinishingLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlFinishingLens'));

            $data['form_price_pricelist_lens'] = array(
                'name' => 'tbPriceLensPricelist',
                'class' => 'tbPriceLensPricelist',
                'id' => 'tbPriceLensPricelist',
                'value' => isset($pricelist_lens[0]->price_pricelist_lens) ? $pricelist_lens[0]->price_pricelist_lens : '',
                'size' => '27px',
                'placeholder' => 'Cena u evrima'
            );

            $this->load->model('ranges_dioptre_lenses_model');
            $order_by_id_range_dioptre_lens = "min.value_sph_range_dioptre_lens, max.value_sph_range_dioptre_lens, cyl_range_dioptre_lens, add_range_dioptre_lens ASC";
            $this->ranges_dioptre_lenses_model->order_by = $order_by_id_range_dioptre_lens;
            $rangeDioptreLensOption = $this->ranges_dioptre_lenses_model->select();
            $optionForRangeDioptreLens = array();
            foreach ($rangeDioptreLensOption as $s):
                foreach ($sph_range_dioptre_lenses as $l):
                    if ($s->id_max_sph_range_dioptre_lens == $l->id_sph_range_dioptre_lens):
                        $max = $l->value_sph_range_dioptre_lens;
                    endif;
                endforeach;
                foreach ($sph_range_dioptre_lenses as $l):
                    if ($s->id_min_sph_range_dioptre_lens == $l->id_sph_range_dioptre_lens):
                        $min = $l->value_sph_range_dioptre_lens;
                    endif;
                endforeach;
                if ($s->add_range_dioptre_lens != null):
                    $optionForRangeDioptreLens += array(
                        $s->id_range_dioptre_lens => $min . " / " . $max . " / " . $s->cyl_range_dioptre_lens . " / " . $s->add_range_dioptre_lens
                    );
                else:
                    $optionForRangeDioptreLens += array(
                        $s->id_range_dioptre_lens => $min . " / " . $max . " / " . $s->cyl_range_dioptre_lens
                    );
                endif;
            endforeach;
            @$selected = $pricelist_lens[0]->id_range_dioptre_lens;
            $data['ddlRangeDioptreLens'] = form_dropdown('ddlRangeDioptreLens', $optionForRangeDioptreLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlRangeDioptreLens'));

            $this->load->model('diameter_lenses_model');
            $order_by_name_diameter_lens = "name_diameter_lens ASC";
            $this->diameter_lenses_model->order_by = $order_by_name_diameter_lens;
            $diameterLensOption = $this->diameter_lenses_model->select();
            $optionForDiameterLens = array('' => "Izaberi...");
            foreach ($diameterLensOption as $s):
                $optionForDiameterLens += array($s->id_diameter_lens => $s->name_diameter_lens);
            endforeach;

            @$selected = $pricelist_lens[0]->id_diameter_lens;
            $data['ddlDiameterLens'] = form_dropdown('ddlDiameterLens', $optionForDiameterLens, $selected, array('style' => 'width: 220px', 'class' => 'ddlDiameterLens'));

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
                    $ddlProducerLens = $this->input->post('ddlProducerLens');
                    $ddlMaterialLens = $this->input->post('ddlMaterialLens');
                    $ddlTypeLens = $this->input->post('ddlTypeLens');
                    $ddlDesignLens = $this->input->post('ddlDesignLens');
                    $ddlIndexLens = $this->input->post('ddlIndexLens');
                    $ddlNameLens = $this->input->post('ddlNameLens');
                    $ddlFinishingLens = $this->input->post('ddlFinishingLens');
                    $tbPriceLensPricelist = trim($this->input->post('tbPriceLensPricelist'));
                    $ddlRangeDioptreLens = $this->input->post('ddlRangeDioptreLens');
                    $ddlDiameterLens = $this->input->post('ddlDiameterLens');

                    $this->session->set_flashdata("message", var_dump($ddlNameLens));

                    $this->load->library('form_validation');
                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                    $this->form_validation->set_rules('ddlProducerLens', 'proizvođač sočiva', 'xss_clean|required|callback_checkFunction');
                    $this->form_validation->set_rules('ddlMaterialLens', 'materijal sočiva', 'xss_clean|required|callback_checkFunction');
                    $this->form_validation->set_rules('ddlTypeLens', 'tip sočiva', 'xss_clean|required|callback_checkFunction');
                    $this->form_validation->set_rules('ddlDesignLens', 'dizajn sočiva', 'xss_clean|required|callback_checkFunction');
                    $this->form_validation->set_rules('ddlIndexLens', 'index sočiva', 'xss_clean|required|callback_checkFunction');
                    $this->form_validation->set_rules('ddlNameLens', 'ime sočiva', 'xss_clean|required|callback_checkFunction');
                    $this->form_validation->set_rules('ddlFinishingLens', 'dorada sočiva', 'xss_clean|required|callback_checkFunction');
                    $this->form_validation->set_rules('tbPriceLensPricelist', 'cena sočiva', 'xss_clean|required|callback_pricelens');
                    $this->form_validation->set_rules('ddlRangeDioptreLens', 'opseg dioptrije sočiva', 'xss_clean|required|callback_checkFunction');
                    $this->form_validation->set_rules('ddlDiameterLens', 'opseg dioptrije sočiva', 'xss_clean|required|callback_checkFunction');

                    $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');
                    $this->form_validation->set_message('checkFunction', 'Polje za %s mora biti izabrano!');

                    if ($this->form_validation->run()):

                        //unosenje podatak u model za upis u bazu
                        $this->pricelist_lenses_model->id_producer_lens = $ddlProducerLens;
                        $this->pricelist_lenses_model->id_material_lens = $ddlMaterialLens;
                        $this->pricelist_lenses_model->id_type_lens = $ddlTypeLens;
                        $this->pricelist_lenses_model->id_design_lens = $ddlDesignLens;
                        $this->pricelist_lenses_model->id_index_lens = $ddlIndexLens;
                        if ($ddlNameLens != ''):
                            $this->pricelist_lenses_model->id_name_lens = $ddlNameLens;
                        else:
                            $this->pricelist_lenses_model->id_name_lens = NULL;
                        endif;
                        $this->pricelist_lenses_model->id_finishing_lens = $ddlFinishingLens;
                        $this->pricelist_lenses_model->price_pricelist_lens = $tbPriceLensPricelist;
                        $this->pricelist_lenses_model->id_range_dioptre_lens = $ddlRangeDioptreLens;
                        $this->pricelist_lenses_model->id_diameter_lens = $ddlDiameterLens;

                        $result_pricelist_lens = $this->pricelist_lenses_model->update();

                        if ($result_pricelist_lens == true):
                            $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili stavku u cenovniku!</div>");
                            redirect('administration/sales/PriceListLensSales');

                        else:
                            $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px'; text-align: center; margin:0px auto>Izmena stavke u cenovniku nije uspelo!</div>");
                            $data_insert['id_producer_lens'] = $ddlProducerLens;
                            $data_insert['id_material_lens'] = $ddlMaterialLens;
                            $data_insert['id_type_lens'] = $ddlTypeLens;
                            $data_insert['id_design_lens'] = $ddlDesignLens;
                            $data_insert['id_index_lens'] = $ddlIndexLens;
                            $data_insert['id_name_lens'] = $ddlNameLens;
                            $data_insert['id_finishing_lens'] = $ddlFinishingLens;
                            $data_insert['price_pricelist_lens'] = $tbPriceLensPricelist;
                            $data_insert['id_range_dioptre_lens'] = $ddlRangeDioptreLens;
                            $data_insert['id_diameter_lens'] = $ddlDiameterLens;

                        endif;
                    else:
                        $data_insert['id_producer_lens'] = $ddlProducerLens;
                        $data_insert['id_material_lens'] = $ddlMaterialLens;
                        $data_insert['id_type_lens'] = $ddlTypeLens;
                        $data_insert['id_design_lens'] = $ddlDesignLens;
                        $data_insert['id_index_lens'] = $ddlIndexLens;
                        $data_insert['id_name_lens'] = $ddlNameLens;
                        $data_insert['id_finishing_lens'] = $ddlFinishingLens;
                        $data_insert['price_pricelist_lens'] = $tbPriceLensPricelist;
                        $data_insert['id_range_dioptre_lens'] = $ddlRangeDioptreLens;
                        $data_insert['id_diameter_lens'] = $ddlDiameterLens;

                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                    endif;

                    $data['form_customer'] = array(
                        'class' => 'form',
                        'accept-charset' => 'utf-8',
                        'method' => 'POST'
                    );

                    $this->load->model('producers_lenses_model');
                    $order_by_name_producer_lens = "name_producer_lens ASC";
                    $this->producers_lenses_model->order_by = $order_by_name_producer_lens;
                    $producersLensOption = $this->producers_lenses_model->select();
                    $optionForProducerLens = array();
                    foreach ($producersLensOption as $s):
                        $optionForProducerLens += array($s->id_producer_lens => $s->name_producer_lens);
                    endforeach;
                    @$selected = $data_insert['id_producer_lens'];
                    $data['ddlProducerLens'] = form_dropdown('ddlProducerLens', $optionForProducerLens, $selected, array('style' => 'width: 220px'));


                    $this->load->model('material_lenses_model');
                    $order_by_name_material_lens = "name_material_lens ASC";
                    $this->material_lenses_model->order_by = $order_by_name_material_lens;
                    $materialLensOption = $this->material_lenses_model->select();
                    $optionForMaterialLens = array();
                    foreach ($materialLensOption as $s):
                        $optionForMaterialLens += array($s->id_material_lens => $s->name_material_lens);
                    endforeach;
                    @$selected = $data_insert['id_material_lens'];
                    $data['ddlMaterialLens'] = form_dropdown('ddlMaterialLens', $optionForMaterialLens, $selected, array('style' => 'width: 220px'));


                    $this->load->model('type_lenses_model');
                    $order_by_name_type_lens = "order_type_lens ASC";
                    $this->type_lenses_model->order_by = $order_by_name_type_lens;
                    $typeLensOption = $this->type_lenses_model->select();
                    $optionForTypeLens = array();
                    foreach ($typeLensOption as $s):
                        $optionForTypeLens += array($s->id_type_lens => $s->name_type_lens);
                    endforeach;
                    @$selected = $data_insert['id_type_lens'];
                    $data['ddlTypeLens'] = form_dropdown('ddlTypeLens', $optionForTypeLens, $selected, array('style' => 'width: 220px'));


                    $this->load->model('designs_lenses_model');
                    $order_by_name_design_lens = "name_design_lens ASC";
                    $this->designs_lenses_model->order_by = $order_by_name_design_lens;
                    $designLensOption = $this->designs_lenses_model->select();
                    $optionForDesignLens = array();
                    foreach ($designLensOption as $s):
                        $optionForDesignLens += array($s->id_design_lens => $s->name_design_lens);
                    endforeach;
                    @$selected = $data_insert['id_design_lens'];
                    $data['ddlDesignLens'] = form_dropdown('ddlDesignLens', $optionForDesignLens, $selected, array('style' => 'width: 220px'));


                    $this->load->model('index_lenses_model');
                    $order_by_name_index_lens = "name_index_lens ASC";
                    $this->index_lenses_model->order_by = $order_by_name_index_lens;
                    $indexLensOption = $this->index_lenses_model->select();
                    $optionForIndexLens = array();
                    foreach ($indexLensOption as $s):
                        $optionForIndexLens += array($s->id_index_lens => $s->name_index_lens);
                    endforeach;
                    @$selected = $data_insert['id_index_lens'];
                    $data['ddlIndexLens'] = form_dropdown('ddlIndexLens', $optionForIndexLens, $selected, array('style' => 'width: 220px'));


                    $this->load->model('name_lenses_model');
                    $order_by_name_name_lens = "name_name_lens ASC";
                    $this->name_lenses_model->order_by = $order_by_name_name_lens;
                    $nameLensOption = $this->name_lenses_model->select();
                    $optionForNameLens = array();
                    foreach ($nameLensOption as $s):
                        $optionForNameLens += array($s->id_name_lens => $s->name_name_lens);
                    endforeach;
                    @$selected = $data_insert['id_name_lens'];
                    $data['ddlNameLens'] = form_dropdown('ddlNameLens', $optionForNameLens, $selected, array('style' => 'width: 220px'));


                    $this->load->model('finishing_lenses_model');
                    $order_by_name_finishing_lens = "name_finishing_lens ASC";
                    $this->finishing_lenses_model->order_by = $order_by_name_finishing_lens;
                    $finishingLensOption = $this->finishing_lenses_model->select();
                    $optionForFinishingLens = array();
                    foreach ($finishingLensOption as $s):
                        $optionForFinishingLens += array($s->id_finishing_lens => $s->name_finishing_lens);
                    endforeach;
                    @$selected = $data_insert['id_finishing_lens'];
                    $data['ddlFinishingLens'] = form_dropdown('ddlFinishingLens', $optionForFinishingLens, $selected, array('style' => 'width: 220px'));

                    $data['form_price_pricelist_lens'] = array(
                        'name' => 'tbPriceLensPricelist',
                        'id' => 'tbPriceLensPricelist',
                        'value' => isset($data_insert['price_pricelist_lens']) ? $data_insert['price_pricelist_lens'] : '',
                        'placeholder' => 'Cena u evrima',
                        'size' => '27px'
                    );

                    $this->load->model('ranges_dioptre_lenses_model');
                    $order_by_id_range_dioptre_lens = "min.value_sph_range_dioptre_lens, max.value_sph_range_dioptre_lens, cyl_range_dioptre_lens, add_range_dioptre_lens ASC";
                    $this->ranges_dioptre_lenses_model->order_by = $order_by_id_range_dioptre_lens;
                    $rangeDioptreLensOption = $this->ranges_dioptre_lenses_model->select();
                    $optionForRangeDioptreLens = array();
                    foreach ($rangeDioptreLensOption as $s):
                        foreach ($sph_range_dioptre_lenses as $l):
                            if ($s->id_max_sph_range_dioptre_lens == $l->id_sph_range_dioptre_lens):
                                $max = $l->value_sph_range_dioptre_lens;
                            endif;
                        endforeach;
                        foreach ($sph_range_dioptre_lenses as $l):
                            if ($s->id_min_sph_range_dioptre_lens == $l->id_sph_range_dioptre_lens):
                                $min = $l->value_sph_range_dioptre_lens;
                            endif;
                        endforeach;
                        if ($s->add_range_dioptre_lens != null):
                            $optionForRangeDioptreLens += array(
                                $s->id_range_dioptre_lens => $min . " / " . $max . " / " . $s->cyl_range_dioptre_lens . " / " . $s->add_range_dioptre_lens
                            );
                        else:
                            $optionForRangeDioptreLens += array(
                                $s->id_range_dioptre_lens => $min . " / " . $max . " / " . $s->cyl_range_dioptre_lens
                            );
                        endif;
                    endforeach;
                    @$selected = $data_insert['id_range_dioptre_lens'];
                    $data['ddlRangeDioptreLens'] = form_dropdown('ddlRangeDioptreLens', $optionForRangeDioptreLens, $selected, array('style' => 'width: 220px'));

                    $this->load->model('diameter_lenses_model');
                    $order_by_name_diameter_lens = "name_diameter_lens ASC";
                    $this->diameter_lenses_model->order_by = $order_by_name_diameter_lens;
                    $diameterLensOption = $this->diameter_lenses_model->select();
                    $optionForDiameterLens = array('' => "Izaberi...");
                    foreach ($diameterLensOption as $s):
                        $optionForDiameterLens += array($s->id_diameter_lens => $s->name_diameter_lens);
                    endforeach;

                    @$selected = $data_insert['id_diameter_lens'];
                    $data['ddlDiameterLens'] = form_dropdown('ddlDiameterLens', $optionForDiameterLens, $selected, array('style' => 'width: 220px'));

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

        $data['title'] = "Izmena stavke u cenovniku";
        $view = "sales/add-edit/AddEditPriceListLens";
        $this->load_view_admin($view, $data);
    }

    public function delete() {
        if (isset($_POST['idPriceListSeles'])):
            $id = $_POST['idPriceListSeles'];

            $where_order_lists = " order_lists.id_pricelist_lens_right = '" . $id . "' OR order_lists.id_pricelist_lens_right = '" . $id . "'";
            $this->order_lists_model->where = $where_order_lists;
            $result = $this->order_lists_model->select();

            if ($result == false):

                $this->load->model('pricelist_lenses_model', 'pricelist_lenses');
                $where_id_pricelist_lens = "pricelist_lenses.id_pricelist_lens = " . $id;
                $this->pricelist_lenses->where = $where_id_pricelist_lens;
                $result_id_pricelist_lens = $this->pricelist_lenses->delete();
                if ($result_id_pricelist_lens == true):

                    $this->pricelist_lenses_model->order_by = "name_producer_lens, name_material_lens, name_type_lens, name_design_lens, name_index_lens, name_name_lens, name_finishing_lens, price_pricelist_lens, min.value_sph_range_dioptre_lens, max.value_sph_range_dioptre_lens, cyl_range_dioptre_lens, add_range_dioptre_lens, name_diameter_lens ASC";
                    $pricelist_lens = $this->pricelist_lenses_model->select();
                    $sph_range_dioptre_lenses = $this->sph_range_dioptre_lenses_model->select();

                    $data = '<table style="width: 98%; border: 1px solid; padding: 10px; margin: 10px 10px;">';
                    $data .= '<tr class="border3">';
                    $data .= '<th class="border text-alignC">Proizvođač</th>';
                    $data .= '<th class="border text-alignC">Materijal</th>';
                    $data .= '<th class="border text-alignC">Tip</th>';
                    $data .= '<th class="border text-alignC">Dizajn</th>';
                    $data .= '<th class="border text-alignC">Index</th>';
                    $data .= '<th class="border text-alignC">Naziv</th>';
                    $data .= '<th class="border text-alignC">Dorada</th>';
                    $data .= '<th class="border text-alignC">Cena u &euro;</th>';
                    $data .= '<th class="border text-alignC">Min Sph / Max Sph / Cyl / Add / &#8960;</th>';
                    $data .= '<th class="border text-alignC" colspan="1">Akcija</th>';
                    $data .= '</tr>';
                    foreach ($pricelist_lens as $p):
                        $data .= '<tr class="border text-alignC">';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">' . $p->name_producer_lens . '</a>';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">' . $p->name_material_lens . '</a>';
                        $data .= '</td>';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">' . $p->name_type_lens . '</a>';
                        $data .= '</td>';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">' . $p->name_design_lens . '</a>';
                        $data .= '</td>';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">' . $p->name_index_lens . '</a>';
                        $data .= '</td>';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">' . $p->name_name_lens . '</a>';
                        $data .= '</td>';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">' . $p->name_finishing_lens . '</a>';
                        $data .= '</td>';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">' . $p->price_pricelist_lens . '</a>';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">';
                        foreach ($sph_range_dioptre_lenses as $s):
                            if ($p->id_min_sph_range_dioptre_lens == $s->id_sph_range_dioptre_lens):
                                $data .= $s->value_sph_range_dioptre_lens;
                            endif;
                        endforeach;
                        $data .= " / ";
                        foreach ($sph_range_dioptre_lenses as $s):
                            if ($p->id_max_sph_range_dioptre_lens == $s->id_sph_range_dioptre_lens):
                                $data .= $s->value_sph_range_dioptre_lens;
                            endif;
                        endforeach;
                        $data .= " / " . $p->cyl_range_dioptre_lens;
                        if ($p->add_range_dioptre_lens != null):
                            $data .= " / " . $p->add_range_dioptre_lens;
                        endif;
                        $data .= " / &#8960; " . $p->name_diameter_lens;
                        $data .= '</a>';
                        $data .= '</td>';
                        $data .= '<td>';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">Izmeni</a>';
                        $data .= '&nbsp;|&nbsp;';
                        $data .= '<a href="#" class="deletePriceListSeles" data-id="' . $p->id_pricelist_lens . '">Obriši</a>';
                        $data .= '</td>';
                        $data .= '</tr>';
                    endforeach;
                    $data .= '</table>';
                    echo json_encode($data);
                else:
                    $message = $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Niste obrisali stavku u cenovniku!</div>");
                endif;
            else:
                $message = $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Odabrana stavka u cenovniku je dodata u listu porudžbina!</div>");
            endif;
        else:
            redirect('administration/sales/PriceListLensSales', 'refresh');
        endif;
    }

    public function searchLenses() {
        if (isset($_POST['idProducerLens']) && isset($_POST['idMaterialLens']) && isset($_POST['idTypeLens']) && isset($_POST['idDesignLens']) && isset($_POST['idIndexLens']) && isset($_POST['idNameLens']) && isset($_POST['idFinishingLens'])):
            $array_search_lens = array();
            $where_search_lens = "";
            if ($_POST['idProducerLens'] != 0):
                $idProducerLens = $_POST['idProducerLens'];
                $array_search_lens[] .= "pricelist_lenses.id_producer_lens = " . $idProducerLens;
            endif;
            
            if ($_POST['idMaterialLens'] != 0):
                $idMaterialLens = $_POST['idMaterialLens'];
                $array_search_lens[] .= "pricelist_lenses.id_material_lens = " . $idMaterialLens;
            endif;
            if ($_POST['idTypeLens'] != 0):
                $idTypeLens = $_POST['idTypeLens'];
                $array_search_lens[] .= "pricelist_lenses.id_type_lens = " . $idTypeLens;
            endif;
            if ($_POST['idDesignLens'] != 0):
                $idDesignLens = $_POST['idDesignLens'];
                $array_search_lens[] .= "pricelist_lenses.id_design_lens = " . $idDesignLens;
            endif;
            if ($_POST['idIndexLens'] != 0):
                $idIndexLens = $_POST['idIndexLens'];
                $array_search_lens[] .= "pricelist_lenses.id_index_lens = " . $idIndexLens;
            endif;
            if ($_POST['idNameLens'] != 0):
                $idNameLens = $_POST['idNameLens'];
                $array_search_lens[] .= "pricelist_lenses.id_name_lens = " . $idNameLens;
            endif;
            if ($_POST['idFinishingLens'] != 0):
                $idFinishingLens = $_POST['idFinishingLens'];
                $array_search_lens[] .= "pricelist_lenses.id_finishing_lens = " . $idFinishingLens;
            endif;
            
            $num_array_search_lens = count($array_search_lens);
            
            for ($i = 0; $i < $num_array_search_lens; $i++):
                if ($i < $num_array_search_lens - 1):
                    $where_search_lens .= $array_search_lens[$i];
                    $where_search_lens .= " AND ";
                else:
                    $where_search_lens .= $array_search_lens[$i];
                endif;
            endfor;

            
            $this->pricelist_lenses_model->where = $where_search_lens;
            $result_search_lens = $this->pricelist_lenses_model->select();
            $sph_range_dioptre_lenses = $this->sph_range_dioptre_lenses_model->select();
            //echo json_encode($result_search_lens);
            if ($result_search_lens != false):
                $data = '<table style="width: 98%; border: 1px solid; padding: 10px; margin: 10px 10px;">';
                    $data .= '<tr class="border3">';
                    $data .= '<th class="border text-alignC">Proizvođač</th>';
                    $data .= '<th class="border text-alignC">Materijal</th>';
                    $data .= '<th class="border text-alignC">Tip</th>';
                    $data .= '<th class="border text-alignC">Dizajn</th>';
                    $data .= '<th class="border text-alignC">Index</th>';
                    $data .= '<th class="border text-alignC">Naziv</th>';
                    $data .= '<th class="border text-alignC">Dorada</th>';
                    $data .= '<th class="border text-alignC">Cena u &euro;</th>';
                    $data .= '<th class="border text-alignC">Min Sph / Max Sph / Cyl / Add / &#8960;</th>';
                    $data .= '<th class="border text-alignC" colspan="1">Akcija</th>';
                    $data .= '</tr>';
                    foreach ($result_search_lens as $p):
                        $data .= '<tr class="border text-alignC">';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">' . $p->name_producer_lens . '</a>';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">' . $p->name_material_lens . '</a>';
                        $data .= '</td>';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">' . $p->name_type_lens . '</a>';
                        $data .= '</td>';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">' . $p->name_design_lens . '</a>';
                        $data .= '</td>';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">' . $p->name_index_lens . '</a>';
                        $data .= '</td>';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">' . $p->name_name_lens . '</a>';
                        $data .= '</td>';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">' . $p->name_finishing_lens . '</a>';
                        $data .= '</td>';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">' . $p->price_pricelist_lens . '</a>';
                        $data .= '<td class="border">';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">';
                        foreach ($sph_range_dioptre_lenses as $s):
                            if ($p->id_min_sph_range_dioptre_lens == $s->id_sph_range_dioptre_lens):
                                $data .= $s->value_sph_range_dioptre_lens;
                            endif;
                        endforeach;
                        $data .= " / ";
                        foreach ($sph_range_dioptre_lenses as $s):
                            if ($p->id_max_sph_range_dioptre_lens == $s->id_sph_range_dioptre_lens):
                                $data .= $s->value_sph_range_dioptre_lens;
                            endif;
                        endforeach;
                        $data .= " / " . $p->cyl_range_dioptre_lens;
                        if ($p->add_range_dioptre_lens != null):
                            $data .= " / " . $p->add_range_dioptre_lens;
                        endif;
                        $data .= " / &#8960; " . $p->name_diameter_lens;
                        $data .= '</a>';
                        $data .= '</td>';
                        $data .= '<td>';
                        $data .= '<a href="' . base_url() . 'administration/sales/PriceListLensSales/edit/' . $p->id_pricelist_lens . '">Izmeni</a>';
                        $data .= '&nbsp;|&nbsp;';
                        $data .= '<a href="#" class="deletePriceListSeles" data-id="' . $p->id_pricelist_lens . '">Obriši</a>';
                        $data .= '</td>';
                        $data .= '</tr>';
                    endforeach;
                    $data .= '</table>';
                echo json_encode($data);
            else:
                $message = $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Odabrani filter ne postoji u cenovniku!</div>");
            endif;
        else:
            redirect('administration/sales/PriceListLensSales', 'refresh');
        endif;
    }

    function checkFunction($input) {
        if ($input == '') {
            return false;
        }
        return true;
    }
    
    public function pricelens($str) {
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        $regExp = "/^\d{1,}\.\d{1,2}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('pricelens', 'U polje za {field} nisu uneti ispravno podaci!');
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('pricelens', 'Polje za {field} mora biti uneto!');
            return FALSE;
        endif;
    }
}
