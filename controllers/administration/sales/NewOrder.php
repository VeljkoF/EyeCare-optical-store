<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewOrder
 *
 * @author Veljko
 */
class NewOrder extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('company_information_model');
        $this->load->model('users_model');
        $this->load->model('customers_model');
        $this->load->model('forms_model');
        $this->load->model('right_left_model');
        $this->load->model('exchange_model');
        $this->load->model('producers_lenses_model');
        $this->load->model('material_lenses_model');
        $this->load->model('type_lenses_model');
        $this->load->model('designs_lenses_model');
        $this->load->model('index_lenses_model');
        $this->load->model('name_lenses_model');
        $this->load->model('finishing_lenses_model');
        $this->load->model('diameter_lenses_model');
        $this->load->model('pricelist_lenses_model');
        $this->load->model('order_lists_model');

    }

    public function index() {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $where_customer = array(
            'id_customer<>' => 1
        );
        $this->customers_model->where = $where_customer;
        $order_by_name_customer = "name_customer ASC";
        $this->customers_model->order_by = $order_by_name_customer;
        $customer = $this->customers_model->select();

        $data['customers'] = $customer;

        $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
        if ($is_post):

            $button = $this->input->post('btnSearch');
            if ($button != ""):
                $search = strtolower(trim($this->input->post('tbSearch')));

                $this->load->library('form_validation');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                $this->form_validation->set_rules('tbSearch', 'pretragu', 'xss_clean|required|min_length[3]');

                $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');
                $this->form_validation->set_message('min_length', 'Polje za %s mora te uneti minimum 3 karaktera!');

                if ($this->form_validation->run()):

                    $this->customers_model->where = "name_customer LIKE '%" . $search . "%'";
                    $order_by_date = "name_customer ASC";
                    $id_search = $this->customers_model->select();

                    if ($id_search == true):

                        $data['customers'] = $id_search;

                    else:
                        $data['message'] = "<div class='alert text-alignC alert-danger' style='width: 600px; text-align: center; margin: 0px auto'>Ne postoji kupac pod imenom " . $search . " koji ste pokusali da pretrazite!</div>";
                    endif;
                else:
                    $data['message'] = "<div class='alert text-alignC alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>";
                endif;
            endif;
        endif;

        $data['form_search'] = array(
            'class' => 'form-group'
        );
        $data['form_customer_search'] = array(
            'style' => 'width: 150px',
            'class' => 'searchNewOrder',
            'name' => 'tbSearch',
            'id' => 'tbSearch',
            'placeholder' => 'Karakteri za pretragu'
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

        $data['title'] = "Spisak kartona";

        $view = "sales/NewOrder";
        $this->load_view_admin($view, $data);
    }

    public function newOrder($id = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $this->session->unset_userdata('date_order_list');
        $this->session->unset_userdata('chbStockOrder');
        $this->session->unset_userdata('customer');
        $this->session->unset_userdata('number_form');
        $this->session->unset_userdata('name_customer');
        $this->session->unset_userdata('year_customer');
        $this->session->unset_userdata('phone_customer');
        $this->session->unset_userdata('email_customer');
        $this->session->unset_userdata('note_customer');
        $this->session->unset_userdata('pd_form');

        $this->session->unset_userdata('chbRightLeft');
        $this->session->unset_userdata('date_form');

        $this->session->unset_userdata('distance_od_sph_form');
        $this->session->unset_userdata('distance_od_cyl_form');
        $this->session->unset_userdata('distance_os_sph_form');
        $this->session->unset_userdata('distance_os_sph_form');
        $this->session->unset_userdata('distance_os_cyl_form');
        $this->session->unset_userdata('distance_os_ax_form');
        $this->session->unset_userdata('add_form');

        $this->session->unset_userdata('chbDistanceProximity');
        $this->session->unset_userdata('frame_form');
        $this->session->unset_userdata('frame_price_form');
        $this->session->unset_userdata('frame_discount_form');
        $this->session->unset_userdata('lens_producer_form');
        $this->session->unset_userdata('lens_material_form');
        $this->session->unset_userdata('lens_type_form');
        $this->session->unset_userdata('lens_designe_form');
        $this->session->unset_userdata('lens_index_form');
        $this->session->unset_userdata('lens_name_form');
        $this->session->unset_userdata('lens_finishing_form');
        $this->session->unset_userdata('lens_range_dioptre_form');
        $this->session->unset_userdata('lens_diampeter_form');
        $this->session->unset_userdata('lens_price_form');
        $this->session->unset_userdata('lens_discount_form');
        $this->session->unset_userdata('note_order_form');

        $this->session->unset_userdata('id_seller');
        $this->session->unset_userdata('advance_payment_form');

        if (isset($_POST['btnNext'])):
            if ($id != null):
                $this->session->set_userdata('customer', $id);
            endif;

            $this->session->set_userdata('date_order_list', time());

            if ($this->input->post('chbStockOrder') == 1):
                $this->session->set_userdata('chbStockOrder', $this->input->post('chbStockOrder'));
                $chbStockOrder = $this->input->post('chbStockOrder');
            endif;

            if ($this->input->post('chbStockOrder') != 1):
                $number_form = trim($this->input->post('tbNumberForm'));
                $name_customer = trim($this->input->post('tbNameCustomer'));
                $year_customer = trim($this->input->post('tbYearCustomer'));
                $phone_customer = trim($this->input->post('tbPhoneCustomer'));
                $email_customer = trim($this->input->post('tbEmailCustomer'));
                $note_customer = trim($this->input->post('taNoteCustomer'));
                $pd_form = trim($this->input->post('tbDistancePdForm'));
            endif;

            $chbRightLeft = $this->input->post('chbRightLeft');
            $date_form = time();

            $distance_od_sph_form = trim($this->input->post('tbDistanceOdSphForm'));
            $distance_od_cyl_form = trim($this->input->post('tbDistanceOdCylForm'));
            $distance_od_ax_form = trim($this->input->post('tbDistanceOdAxForm'));
            $distance_os_sph_form = trim($this->input->post('tbDistanceOsSphForm'));
            $distance_os_cyl_form = trim($this->input->post('tbDistanceOsCylForm'));
            $distance_os_ax_form = trim($this->input->post('tbDistanceOsAxForm'));
            $add_form = $this->input->post('tbAddForm');

            $chbDistanceProximity = $this->input->post('chbDistanceProximity');
            $frame_form = trim($this->input->post('tbFrameForm'));
            $frame_price_form = trim($this->input->post('tbFramePriceForm'));
            $frame_discount_form = trim($this->input->post('tbFrameDiscountForm'));
            $lens_producer_form = $this->input->post('ddlProducerLens');
            $lens_material_form = $this->input->post('ddlMaterialLens');
            $lens_type_form = $this->input->post('ddlTypeLens');
            $lens_designe_form = $this->input->post('ddlDesignLens');
            $lens_index_form = $this->input->post('ddlIndexLens');
            $lens_name_form = $this->input->post('ddlNameLens');
            $lens_finishing_form = $this->input->post('ddlFinishingLens');
            $lens_range_dioptre_form = $this->input->post('ddlRangeDioptreLens');
            $lens_diampeter_form = $this->input->post('ddlDiameterLens');
            $lens_price_form = $this->input->post('PricePricelistLens');
            $lens_discount_form = trim($this->input->post('tbLensDiscountForm'));
            $note_order_form = trim($this->input->post('taNoteProducer'));

            $id_seller = $this->input->post('ddlSeller');

            $advance_payment_form = trim($this->input->post('tbAdvancePaymentForm'));


            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if ($this->input->post('chbStockOrder') != 1):
                $this->form_validation->set_rules('tbNumberForm', 'broj reversa', 'xss_clean|callback_number');
                $this->form_validation->set_rules('tbNameCustomer', 'ime i prezime', 'xss_clean|callback_name');
                $this->form_validation->set_rules('tbYearCustomer', 'godište', 'xss_clean|callback_year');
                $this->form_validation->set_rules('tbPhoneCustomer', 'telefon', 'xss_clean|callback_phone');
                $this->form_validation->set_rules('tbEmailCustomer', 'mail', 'xss_clean|callback_email');
                $this->form_validation->set_rules('taNoteCustomer', 'napomenu', 'xss_clean|callback_note');
                $this->form_validation->set_rules('tbDistancePdForm', 'PD', 'xss_clean|callback_pd');
            endif;

            $this->form_validation->set_rules('tbDistanceOdSphForm', 'DESNO SPH:', 'xss_clean|callback_od_sph');
            $this->form_validation->set_rules('tbDistanceOdCylForm', 'DESNO CYL:', 'xss_clean|callback_od_cyl');
            $this->form_validation->set_rules('tbDistanceOdAxForm', 'DESNO AX:', 'xss_clean|callback_od_ax');
            $this->form_validation->set_rules('tbDistanceOsSphForm', 'LEVO SPH:', 'xss_clean|callback_os_sph');
            $this->form_validation->set_rules('tbDistanceOsCylForm', 'LEVO CYL:', 'xss_clean|callback_os_cyl');
            $this->form_validation->set_rules('tbDistanceOsAxForm', 'LEVO AX:', 'xss_clean|callback_os_ax');
            $this->form_validation->set_rules('tbAddForm', 'ADD:', 'xss_clean|callback_add');

            $this->form_validation->set_rules('chbDistanceProximity', '', 'xss_clean|callback_distance_proximity');
            $this->form_validation->set_rules('tbFrameForm', 'naziv okvira', 'xss_clean|callback_frame');
            $this->form_validation->set_rules('tbFramePriceForm', 'cenu okvira', 'xss_clean|callback_frame_price');
            $this->form_validation->set_rules('tbFrameDiscountForm', 'popust na okvira', 'xss_clean|callback_frame_discount');
            $this->form_validation->set_rules('ddlProducerLens', 'proizvođač sočiva', 'xss_clean|callback_producer');
            $this->form_validation->set_rules('ddlMaterialLens', 'materijal sočiva', 'xss_clean|callback_material');
            $this->form_validation->set_rules('ddlTypeLens', 'tip sočiva', 'xss_clean|callback_type');
            $this->form_validation->set_rules('ddlDesignLens', 'dizajn sočiva', 'xss_clean|callback_design');
            $this->form_validation->set_rules('ddlIndexLens', 'index sočiva', 'xss_clean|callback_indexLens');
            $this->form_validation->set_rules('ddlNameLens', 'ime sočiva', 'xss_clean|callback_namelens');
            $this->form_validation->set_rules('ddlFinishingLens', 'doradu sočiva', 'xss_clean|callback_finishing');
            $this->form_validation->set_rules('ddlRangeDioptreLens', 'opseg diotrije sočiva', 'xss_clean|callback_range');
            $this->form_validation->set_rules('ddlDiameterLens', 'prečnik sočiva', 'xss_clean|callback_diameter');
            $this->form_validation->set_rules('tbLensDiscountForm', 'popust sočiva', 'xss_clean|callback_lens_discount');
            $this->form_validation->set_rules('taNoteProducer', 'napomenu proizvođaču', 'xss_clean|callback_note_producer');

            $this->form_validation->set_rules('ddlSeller', 'prodavca', 'xss_clean|callback_seller');

            $this->form_validation->set_rules('tbAdvancePaymentForm', 'akontaciju', 'xss_clean|callback_advance');

            if ($this->form_validation->run()):

                if ($this->input->post('chbStockOrder') != 1):
                    $this->session->set_userdata('number_form', $number_form);
                    $this->session->set_userdata('name_customer', $name_customer);
                    $this->session->set_userdata('year_customer', $year_customer);
                    $this->session->set_userdata('phone_customer', $phone_customer);
                    $this->session->set_userdata('email_customer', $email_customer);
                    $this->session->set_userdata('note_customer', $note_customer);
                    $this->session->set_userdata('pd_form', $pd_form);
                endif;

                $this->session->set_userdata('chbRightLeft', $chbRightLeft);
                $this->session->set_userdata('date_form', $date_form);

                $this->session->set_userdata('distance_od_sph_form', $distance_od_sph_form);
                $this->session->set_userdata('distance_od_cyl_form', $distance_od_cyl_form);
                $this->session->set_userdata('distance_od_ax_form', $distance_od_ax_form);
                $this->session->set_userdata('distance_os_sph_form', $distance_os_sph_form);
                $this->session->set_userdata('distance_os_cyl_form', $distance_os_cyl_form);
                $this->session->set_userdata('distance_os_ax_form', $distance_os_ax_form);
                $this->session->set_userdata('add_form', $add_form);

                $this->session->set_userdata('chbDistanceProximity', $chbDistanceProximity);
                $this->session->set_userdata('frame_form', $frame_form);
                $this->session->set_userdata('frame_price_form', $frame_price_form);
                $this->session->set_userdata('frame_discount_form', $frame_discount_form);
                $this->session->set_userdata('lens_producer_form', $lens_producer_form);
                $this->session->set_userdata('lens_material_form', $lens_material_form);
                $this->session->set_userdata('lens_type_form', $lens_type_form);
                $this->session->set_userdata('lens_designe_form', $lens_designe_form);
                $this->session->set_userdata('lens_index_form', $lens_index_form);
                $this->session->set_userdata('lens_name_form', $lens_name_form);
                $this->session->set_userdata('lens_finishing_form', $lens_finishing_form);
                $this->session->set_userdata('lens_range_dioptre_form', $lens_range_dioptre_form);
                $this->session->set_userdata('lens_diampeter_form', $lens_diampeter_form);
                $this->session->set_userdata('lens_price_form', $lens_price_form);
                $this->session->set_userdata('lens_discount_form', $lens_discount_form);
                $this->session->set_userdata('note_order_form', $note_order_form);

                $this->session->set_userdata('id_seller', $id_seller);
                $this->session->set_userdata('advance_payment_form', $advance_payment_form);

                if ($id != null):
                    redirect('administration/sales/NewOrder/confirmNewOrder/' . $id, 'refresh');
                else:
                    redirect('administration/sales/NewOrder/confirmNewOrder', 'refresh');
                endif;
            else:
                //ako nije proslo validacuju
                $data_insert['chbStockOrder'] = @$chbStockOrder;
                $data_insert['number_form'] = @$number_form;
                $data_insert['name_customer'] = @$name_customer;
                $data_insert['year_customer'] = @$year_customer;
                $data_insert['phone_customer'] = @$phone_customer;
                $data_insert['email_customer'] = @$email_customer;
                $data_insert['note_customer'] = @$note_customer;

                $data_insert['pd_form'] = @$pd_form;
                $data_insert['distance_od_sph_form'] = @$distance_od_sph_form;
                $data_insert['distance_od_cyl_form'] = @$distance_od_cyl_form;
                $data_insert['distance_od_ax_form'] = @$distance_od_ax_form;
                $data_insert['distance_os_sph_form'] = @$distance_os_sph_form;
                $data_insert['distance_os_cyl_form'] = @$distance_os_cyl_form;
                $data_insert['distance_os_ax_form'] = @$distance_os_ax_form;
                $data_insert['add_form'] = @$add_form;

                $data_insert['chbDistanceProximity'] = @$chbDistanceProximity;

                $data_insert['frame_form'] = $frame_form;
                $data_insert['frame_price_form'] = $frame_price_form;
                $data_insert['frame_discount_form'] = $frame_discount_form;

                $data_insert['lens_producer_form'] = @$lens_producer_form;
                $data_insert['lens_material_form'] = @$lens_material_form;
                $data_insert['lens_type_form'] = @$lens_type_form;
                $data_insert['lens_designe_form'] = @$lens_designe_form;
                $data_insert['lens_index_form'] = @$lens_index_form;
                $data_insert['lens_name_form'] = @$lens_name_form;
                $data_insert['lens_finishing_form'] = @$lens_finishing_form;
                $data_insert['lens_range_dioptre_form'] = @$lens_range_dioptre_form;
                $data_insert['lens_diampeter_form'] = @$lens_diampeter_form;

                $data_insert['lens_price_form'] = @$lens_price_form;
                $data_insert['lens_discount_form'] = @$lens_discount_form;
                $data_insert['note_order_form'] = @$note_order_form;
                $data_insert['id_seller'] = @$id_seller;
                $data_insert['advance_payment_form'] = @$advance_payment_form;

                if (isset($data_insert['chbDistanceProximity']) && $data_insert['chbDistanceProximity'] == 1 || $data_insert['chbDistanceProximity'] == 2):
                    $data['chbDistanceProximity'] = "chbStockOrder()";
                    if ($data_insert['chbDistanceProximity'] == 1):
                        $data['chbDistanceProximity1'] = TRUE;
                    elseif ($data_insert['chbDistanceProximity'] == 2):
                        $data['chbDistanceProximity2'] = TRUE;
                    endif;
                else:
                    $data['chbDistanceProximity'] = "chbStockOrder()";
                    $data['chbDistanceProximity1'] = FALSE;
                    $data['chbDistanceProximity2'] = FALSE;
                endif;

                $data['form_order'] = array(
                    'class' => 'form',
                    'accept-charset' => 'utf-8',
                    'method' => 'POST'
                );

                if ($id != null):

                    $where_customer = array(
                        'id_customer' => $id
                    );

                    $this->customers_model->where = $where_customer;
                    $customer = $this->customers_model->select();

                    $data['customer'] = $customer;

                    $where_form = array(
                        'id_customer' => $id
                    );

                    $this->forms_model->where = $where_form;
                    $form = $this->forms_model->select();

                    $data['form'] = $form;

                endif;

                if (isset($data_insert['chbStockOrder']) && $data_insert['chbStockOrder'] == 1):
                    $check = TRUE;
                else:
                    $check = FALSE;
                endif;

                $data['form_stock'] = array(
                    'name' => 'chbStockOrder',
                    'id' => 'chbStockOrder',
                    'value' => '1',
                    'checked' => $check
                );

                $data['form_number_form'] = array(
                    'name' => 'tbNumberForm',
                    'id' => 'tbNumberForm',
                    'size' => '10',
                    'placeholder' => 'Broj reversa',
                    'value' => isset($data_insert['number_form']) ? $data_insert['number_form'] : ""
                );

                $data['form_name_customer'] = array(
                    'name' => 'tbNameCustomer',
                    'id' => 'tbNameCustomer',
                    'size' => '24',
                    'value' => isset($data_insert['name_customer']) ? $data_insert['name_customer'] : "",
                    'placeholder' => 'Ime i prezime'
                );
                $data['form_year_customer'] = array(
                    'name' => 'tbYearCustomer',
                    'id' => 'tbYearCustomer',
                    'size' => '24',
                    'value' => isset($data_insert['year_customer']) ? $data_insert['year_customer'] : "",
                    'placeholder' => 'Godina rođenja'
                );

                $data['form_phone_customer'] = array(
                    'name' => 'tbPhoneCustomer',
                    'id' => 'tbPhoneCustomer',
                    'size' => '24',
                    'value' => isset($data_insert['phone_customer']) ? $data_insert['phone_customer'] : "",
                    'placeholder' => 'Broj telefona'
                );

                $data['form_email_customer'] = array(
                    'name' => 'tbEmailCustomer',
                    'id' => 'tbEmailCustomer',
                    'size' => '24',
                    'value' => isset($data_insert['email_customer']) ? $data_insert['email_customer'] : "",
                    'placeholder' => 'Email'
                );

                $data['form_note_customer'] = array(
                    'name' => 'taNoteCustomer',
                    'id' => 'taNoteCustomer',
                    'rows' => '4',
                    'cols' => '26',
                    'value' => isset($data_insert['note_customer']) ? $data_insert['note_customer'] : "",
                    'placeholder' => 'Napomena'
                );

                $data['form_distance_pd_form'] = array(
                    'name' => 'tbDistancePdForm',
                    'id' => 'tbDistancePdForm',
                    'size' => '19',
                    'value' => isset($data_insert['pd_form']) ? $data_insert['pd_form'] : "",
                    'placeholder' => 'Daljina PD'
                );

                $data['form_distance_od_sph_form'] = array(
                    'name' => 'tbDistanceOdSphForm',
                    'id' => 'tbDistanceOdSphForm',
                    'class' => 'dioptreStart',
                    'size' => '3',
                    'value' => isset($data_insert['distance_od_sph_form']) ? $data_insert['distance_od_sph_form'] : "",
                    'placeholder' => '0.00'
                );

                $data['form_distance_od_cyl_form'] = array(
                    'name' => 'tbDistanceOdCylForm',
                    'id' => 'tbDistanceOdCylForm',
                    'class' => 'dioptreStart',
                    'size' => '3',
                    'value' => isset($data_insert['distance_od_cyl_form']) ? $data_insert['distance_od_cyl_form'] : "",
                    'placeholder' => '0.00'
                );

                $data['form_distance_od_ax_form'] = array(
                    'name' => 'tbDistanceOdAxForm',
                    'id' => 'tbDistanceOdAxForm',
                    'class' => 'dioptreStart',
                    'size' => '3',
                    'value' => isset($data_insert['distance_od_ax_form']) ? $data_insert['distance_od_ax_form'] : "",
                    'placeholder' => '0'
                );

                $data['form_distance_os_sph_form'] = array(
                    'name' => 'tbDistanceOsSphForm',
                    'id' => 'tbDistanceOsSphForm',
                    'class' => 'dioptreStart',
                    'size' => '3',
                    'value' => isset($data_insert['distance_os_sph_form']) ? $data_insert['distance_os_sph_form'] : "",
                    'placeholder' => '0.00'
                );

                $data['form_distance_os_cyl_form'] = array(
                    'name' => 'tbDistanceOsCylForm',
                    'id' => 'tbDistanceOsCylForm',
                    'class' => 'dioptreStart',
                    'size' => '3',
                    'value' => isset($data_insert['distance_os_cyl_form']) ? $data_insert['distance_os_cyl_form'] : "",
                    'placeholder' => '0.00'
                );

                $data['form_distance_os_ax_form'] = array(
                    'name' => 'tbDistanceOsAxForm',
                    'id' => 'tbDistanceOsAxForm',
                    'class' => 'dioptreStart',
                    'size' => '3',
                    'value' => isset($data_insert['distance_os_ax_form']) ? $data_insert['distance_os_ax_form'] : "",
                    'placeholder' => '0'
                );

                $data['form_add_form'] = array(
                    'name' => 'tbAddForm',
                    'id' => 'tbAddForm',
                    'class' => 'dioptreStart',
                    'size' => '3',
                    'value' => isset($data_insert['add_form']) ? $data_insert['add_form'] : "",
                    'placeholder' => '0'
                );

                $data['form_proximity_pd_form'] = array(
                    'name' => 'tbProximityPdForm',
                    'id' => 'tbProximityPdForm',
                    'size' => '19',
                    'placeholder' => 'Bliznina PD'
                );

                $data['form_proximity_od_sph_form'] = array(
                    'name' => 'tbProximityOdSphForm',
                    'id' => 'tbProximityOdSphForm',
                    'size' => '3',
                    'placeholder' => '0.00',
                    'disabled' => 'true'
                );

                $data['form_proximity_od_cyl_form'] = array(
                    'name' => 'tbProximityOdCylForm',
                    'id' => 'tbProximityOdCylForm',
                    'size' => '3',
                    'placeholder' => '0.00',
                    'disabled' => 'true'
                );

                $data['form_proximity_od_ax_form'] = array(
                    'name' => 'tbProximityOdAxForm',
                    'id' => 'tbProximityOdAxForm',
                    'size' => '3',
                    'placeholder' => '0',
                    'disabled' => 'true'
                );

                $data['form_proximity_os_sph_form'] = array(
                    'name' => 'tbProximityOsSphForm',
                    'id' => 'tbProximityOsSphForm',
                    'size' => '3',
                    'placeholder' => '0.00',
                    'disabled' => 'true'
                );

                $data['form_proximity_os_cyl_form'] = array(
                    'name' => 'tbProximityOsCylForm',
                    'id' => 'tbProximityOsCylForm',
                    'size' => '3',
                    'placeholder' => '0.00',
                    'disabled' => 'true'
                );

                $data['form_proximity_os_ax_form'] = array(
                    'name' => 'tbProximityOsAxForm',
                    'id' => 'tbProximityOsAxForm',
                    'size' => '3',
                    'placeholder' => '0',
                    'disabled' => 'true'
                );

                $data['frame_form'] = array(
                    'name' => 'tbFrameForm',
                    'id' => 'tbFrameForm',
                    'style' => 'width: 220px',
                    'value' => isset($data_insert['frame_form']) ? $data_insert['frame_form'] : ""
                );

                $data['frame_price_form'] = array(
                    'name' => 'tbFramePriceForm',
                    'id' => 'tbFramePriceForm',
                    'style' => 'width: 185px',
                    'value' => isset($data_insert['frame_price_form']) ? $data_insert['frame_price_form'] : ""
                );

                $data['frame_discount_form'] = array(
                    'name' => 'tbFrameDiscountForm',
                    'id' => 'tbFrameDiscountForm',
                    'style' => 'width: 190px',
                    'value' => isset($data_insert['frame_discount_form']) ? $data_insert['frame_discount_form'] : ""
                );

                $data['note_order_form'] = array(
                    'name' => 'taNoteProducer',
                    'id' => 'taNoteProducer',
                    'rows' => '4',
                    'cols' => '30',
                    'placeholder' => 'Napomena proizvođaču',
                    'value' => isset($data_insert['note_order_form']) ? $data_insert['note_order_form'] : ""
                );

                $this->load->model('producers_lenses_model');
                $order_by_name_producer_lens = "name_producer_lens ASC";
                $this->producers_lenses_model->order_by = $order_by_name_producer_lens;
                $producersLensOption = $this->producers_lenses_model->select();
                $optionForProducerLens = array('0' => 'Izaberi...');
                foreach ($producersLensOption as $s):
                    $optionForProducerLens += array($s->id_producer_lens => $s->name_producer_lens);
                endforeach;
                @$selected = isset($data_insert['lens_producer_form']) ? $data_insert['lens_producer_form'] : 0;
                $data['ddlProducerLens'] = form_dropdown('ddlProducerLens', $optionForProducerLens, $selected, array('style' => 'width: 220px', 'id' => 'ddlProducerLens'));

                if (isset($data_insert['lens_producer_form']) && $data_insert['lens_producer_form'] != 0):
                    $where_producer_lens = array(
                        'pricelist_lenses.id_producer_lens' => $data_insert['lens_producer_form']
                    );
                    $this->pricelist_lenses_model->where = $where_producer_lens;
                    $this->pricelist_lenses_model->group_by = "material_lenses.name_material_lens";
                    $order_by_name_material_lens = "name_material_lens ASC";
                    $this->pricelist_lenses_model->order_by = $order_by_name_material_lens;
                    $materialLensOption = $this->pricelist_lenses_model->select();
                    $optionForMaterialLens = array('0' => 'Izaberi...');
                    foreach ($materialLensOption as $s):
                        $optionForMaterialLens += array($s->id_material_lens => $s->name_material_lens);
                    endforeach;
                    @$selected = isset($data_insert['lens_material_form']) ? $data_insert['lens_material_form'] : 0;
                    $data['ddlMaterialLens'] = form_dropdown('ddlMaterialLens', $optionForMaterialLens, $selected, array('style' => 'width: 220px', 'id' => 'ddlMaterialLens'));
                else:
                    $optionFormMaterialLens = array('0' => 'Izaberi...');
                    $data['ddlMaterialLens'] = form_dropdown('ddlMaterialLens', $optionFormMaterialLens, @$selected, array('style' => 'width: 220px', 'id' => 'ddlMaterialLens', 'disabled' => "true"));
                endif;

                if (isset($data_insert['lens_producer_form']) && isset($data_insert['lens_material_form']) && $data_insert['lens_material_form'] != 0):
                    $where_material_lens = array(
                        'pricelist_lenses.id_producer_lens' => $data_insert['lens_producer_form'],
                        'pricelist_lenses.id_material_lens' => $data_insert['lens_material_form']
                    );
                    $this->pricelist_lenses_model->where = $where_material_lens;
                    $this->pricelist_lenses_model->group_by = "type_lenses.name_type_lens";
                    $order_by_name_type_lens = "order_type_lens ASC";
                    $this->pricelist_lenses_model->order_by = $order_by_name_type_lens;
                    $typeLensOption = $this->pricelist_lenses_model->select();
                    $optionForTypeLens = array('0' => 'Izaberi...');
                    foreach ($typeLensOption as $s):
                        $optionForTypeLens += array($s->id_type_lens => $s->name_type_lens);
                    endforeach;
                    @$selected = isset($data_insert['lens_type_form']) ? $data_insert['lens_type_form'] : 0;
                    $data['ddlTypeLens'] = form_dropdown('ddlTypeLens', $optionForTypeLens, $selected, array('style' => 'width: 220px', 'id' => 'ddlTypeLens'));
                else:
                    $optionForTypeLens = array('0' => 'Izaberi...');
                    $data['ddlTypeLens'] = form_dropdown('ddlTypeLens', $optionForTypeLens, @$selected, array('style' => 'width: 220px', 'disabled' => 'true', 'id' => 'ddlTypeLens'));
                endif;

                if (isset($data_insert['lens_producer_form']) && isset($data_insert['lens_material_form']) && isset($data_insert['lens_type_form']) && $data_insert['lens_type_form'] != 0):
                    $where_type_lens = array(
                        'pricelist_lenses.id_producer_lens' => $data_insert['lens_producer_form'],
                        'pricelist_lenses.id_material_lens' => $data_insert['lens_material_form'],
                        'pricelist_lenses.id_type_lens' => $data_insert['lens_type_form']
                    );
                    $this->pricelist_lenses_model->where = $where_type_lens;
                    $this->pricelist_lenses_model->group_by = "designs_lenses.name_design_lens";
                    $order_by_name_design_lens = "name_design_lens ASC";
                    $this->pricelist_lenses_model->order_by = $order_by_name_design_lens;
                    $designLensOption = $this->pricelist_lenses_model->select();
                    $optionForDesignLens = array('0' => 'Izaberi...');
                    foreach ($designLensOption as $s):
                        $optionForDesignLens += array($s->id_design_lens => $s->name_design_lens);
                    endforeach;
                    @$selected = isset($data_insert['lens_designe_form']) ? $data_insert['lens_designe_form'] : 0;
                    $data['ddlDesignLens'] = form_dropdown('ddlDesignLens', $optionForDesignLens, $selected, array('style' => 'width: 220px', 'id' => 'ddlDesignLens'));
                else:
                    $optionForDesignLens = array('0' => 'Izaberi...');
                    $data['ddlDesignLens'] = form_dropdown('ddlDesignLens', $optionForDesignLens, @$selected, array('style' => 'width: 220px', 'disabled' => 'true', 'id' => 'ddlDesignLens'));
                endif;

                if (isset($data_insert['lens_producer_form']) && isset($data_insert['lens_material_form']) && isset($data_insert['lens_type_form']) && isset($data_insert['lens_designe_form']) && $data_insert['lens_designe_form'] != 0):
                    $where_design_lens = array(
                        'pricelist_lenses.id_producer_lens' => $data_insert['lens_producer_form'],
                        'pricelist_lenses.id_material_lens' => $data_insert['lens_material_form'],
                        'pricelist_lenses.id_type_lens' => $data_insert['lens_type_form'],
                        'pricelist_lenses.id_design_lens' => $data_insert['lens_designe_form']
                    );
                    $this->pricelist_lenses_model->where = $where_design_lens;
                    $this->pricelist_lenses_model->group_by = "index_lenses.name_index_lens";
                    $order_by_name_index_lens = "name_index_lens ASC";
                    $this->pricelist_lenses_model->order_by = $order_by_name_index_lens;
                    $indexLensOption = $this->pricelist_lenses_model->select();
                    $optionForIndexLens = array('0' => 'Izaberi...');
                    foreach ($indexLensOption as $s):
                        $optionForIndexLens += array($s->id_index_lens => $s->name_index_lens);
                    endforeach;
                    @$selected = isset($data_insert['lens_index_form']) ? $data_insert['lens_index_form'] : 0;
                    $data['ddlIndexLens'] = form_dropdown('ddlIndexLens', $optionForIndexLens, $selected, array('style' => 'width: 220px', 'id' => 'ddlIndexLens'));
                else:
                    $optionForIndexLens = array('0' => 'Izaberi...');
                    $data['ddlIndexLens'] = form_dropdown('ddlIndexLens', $optionForIndexLens, @$selected, array('style' => 'width: 220px', 'disabled' => 'true', 'id' => 'ddlIndexLens'));
                endif;

                if (isset($data_insert['lens_producer_form']) && isset($data_insert['lens_material_form']) && isset($data_insert['lens_type_form']) && isset($data_insert['lens_designe_form']) && isset($data_insert['lens_index_form']) && $data_insert['lens_index_form'] != 0):
                    $where_name_lens = array(
                        'pricelist_lenses.id_producer_lens' => $data_insert['lens_producer_form'],
                        'pricelist_lenses.id_material_lens' => $data_insert['lens_material_form'],
                        'pricelist_lenses.id_type_lens' => $data_insert['lens_type_form'],
                        'pricelist_lenses.id_design_lens' => $data_insert['lens_designe_form'],
                        'pricelist_lenses.id_index_lens' => $data_insert['lens_index_form']
                    );
                    $this->pricelist_lenses_model->where = $where_name_lens;
                    $this->pricelist_lenses_model->group_by = "name_lenses.name_name_lens";
                    $order_by_name_name_lens = "name_name_lens ASC";
                    $this->pricelist_lenses_model->order_by = $order_by_name_name_lens;
                    $nameLensOption = $this->pricelist_lenses_model->select();
                    $optionForNameLens = array('0' => 'Izaberi...');
                    foreach ($nameLensOption as $s):
                        $optionForNameLens += array($s->id_name_lens => $s->name_name_lens);
                    endforeach;
                    @$selected = isset($data_insert['lens_name_form']) ? $data_insert['lens_name_form'] : 0;
                    $data['ddlNameLens'] = form_dropdown('ddlNameLens', $optionForNameLens, $selected, array('style' => 'width: 220px', 'id' => 'ddlNameLens'));
                else:
                    $optionForNameLens = array('0' => 'Izaberi...');
                    $data['ddlNameLens'] = form_dropdown('ddlNameLens', $optionForNameLens, @$selected, array('style' => 'width: 220px', 'disabled' => 'true', 'id' => 'ddlNameLens'));
                endif;

                if (isset($data_insert['lens_producer_form']) && isset($data_insert['lens_material_form']) && isset($data_insert['lens_type_form']) && isset($data_insert['lens_designe_form']) && isset($data_insert['lens_index_form']) && isset($data_insert['lens_name_form']) && $data_insert['lens_name_form'] != 0):
                    $where_design_lens = array(
                        'pricelist_lenses.id_producer_lens' => $data_insert['lens_producer_form'],
                        'pricelist_lenses.id_material_lens' => $data_insert['lens_material_form'],
                        'pricelist_lenses.id_type_lens' => $data_insert['lens_type_form'],
                        'pricelist_lenses.id_design_lens' => $data_insert['lens_designe_form'],
                        'pricelist_lenses.id_index_lens' => $data_insert['lens_index_form'],
                        'pricelist_lenses.id_name_lens' => $data_insert['lens_name_form']
                    );
                    $this->pricelist_lenses_model->where = $where_design_lens;
                    $this->pricelist_lenses_model->group_by = "finishing_lenses.name_finishing_lens";
                    $order_by_name_finishing_lens = "name_finishing_lens ASC";
                    $this->pricelist_lenses_model->order_by = $order_by_name_finishing_lens;
                    $finishingLensOption = $this->pricelist_lenses_model->select();
                    $optionForFinishingLens = array('0' => 'Izaberi...');
                    foreach ($finishingLensOption as $s):
                        $optionForFinishingLens += array($s->id_finishing_lens => $s->name_finishing_lens);
                    endforeach;
                    @$selected = isset($data_insert['lens_finishing_form']) ? $data_insert['lens_finishing_form'] : 0;
                    $data['ddlFinishingLens'] = form_dropdown('ddlFinishingLens', $optionForFinishingLens, $selected, array('style' => 'width: 220px', 'id' => 'ddlFinishingLens'));
                else:
                    $optionForFinishingLens = array('0' => 'Izaberi...');
                    $data['ddlFinishingLens'] = form_dropdown('ddlFinishingLens', $optionForFinishingLens, @$selected, array('style' => 'width: 220px', 'disabled' => 'true', 'id' => 'ddlFinishingLens'));
                endif;

                if (isset($data_insert['lens_producer_form']) && isset($data_insert['lens_material_form']) && isset($data_insert['lens_type_form']) && isset($data_insert['lens_designe_form']) && isset($data_insert['lens_index_form']) && isset($data_insert['lens_name_form']) && isset($data_insert['lens_finishing_form']) && $data_insert['lens_finishing_form'] != 0):
                    $where_range_dioptre_lens = array(
                        'pricelist_lenses.id_producer_lens' => $data_insert['lens_producer_form'],
                        'pricelist_lenses.id_material_lens' => $data_insert['lens_material_form'],
                        'pricelist_lenses.id_type_lens' => $data_insert['lens_type_form'],
                        'pricelist_lenses.id_design_lens' => $data_insert['lens_designe_form'],
                        'pricelist_lenses.id_index_lens' => $data_insert['lens_index_form'],
                        'pricelist_lenses.id_name_lens' => $data_insert['lens_name_form'],
                        'pricelist_lenses.id_finishing_lens' => $data_insert['lens_finishing_form']
                    );
                    $this->pricelist_lenses_model->where = $where_range_dioptre_lens;
                    $order_by_id_range_dioptre_lens = "min.value_sph_range_dioptre_lens, max.value_sph_range_dioptre_lens, cyl_range_dioptre_lens, add_range_dioptre_lens ASC";
                    $this->pricelist_lenses_model->order_by = $order_by_id_range_dioptre_lens;
                    $rangeDioptreLensOption = $this->pricelist_lenses_model->select();

                    $this->load->model('sph_range_dioptre_lenses_model');
                    $sph_range_dioptre_lenses = $this->sph_range_dioptre_lenses_model->select();

                    $optionForRangeDioptreLens = array('0' => 'Izaberi...');
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
                            @$optionForRangeDioptreLens += array(
                                $s->id_range_dioptre_lens => $min . " / " . $max . " / " . $s->cyl_range_dioptre_lens
                            );
                        endif;
                    endforeach;
                    @$selected = isset($data_insert['lens_range_dioptre_form']) ? $data_insert['lens_range_dioptre_form'] : 0;
                    $data['ddlRangeDioptreLens'] = form_dropdown('ddlRangeDioptreLens', $optionForRangeDioptreLens, $selected, array('style' => 'width: 220px', 'id' => 'ddlRangeDioptreLens'));
                else:
                    $optionForRangeDioptreLens = array('0' => 'Izaberi...');
                    $data['ddlRangeDioptreLens'] = form_dropdown('ddlRangeDioptreLens', $optionForRangeDioptreLens, @$selected, array('style' => 'width: 220px', 'disabled' => 'true', 'id' => 'ddlRangeDioptreLens'));
                endif;


                if (isset($data_insert['lens_producer_form']) && isset($data_insert['lens_material_form']) && isset($data_insert['lens_type_form']) && isset($data_insert['lens_designe_form']) && isset($data_insert['lens_index_form']) && isset($data_insert['lens_name_form']) && isset($data_insert['lens_finishing_form']) && isset($data_insert['lens_range_dioptre_form']) && $data_insert['lens_range_dioptre_form'] != 0):
                    $where_design_lens = array(
                        'pricelist_lenses.id_producer_lens' => $data_insert['lens_producer_form'],
                        'pricelist_lenses.id_material_lens' => $data_insert['lens_material_form'],
                        'pricelist_lenses.id_type_lens' => $data_insert['lens_type_form'],
                        'pricelist_lenses.id_design_lens' => $data_insert['lens_designe_form'],
                        'pricelist_lenses.id_index_lens' => $data_insert['lens_index_form'],
                        'pricelist_lenses.id_name_lens' => $data_insert['lens_name_form'],
                        'pricelist_lenses.id_finishing_lens' => $data_insert['lens_finishing_form'],
                        'pricelist_lenses.id_range_dioptre_lens' => $data_insert['lens_range_dioptre_form']
                    );
                    $this->pricelist_lenses_model->where = $where_design_lens;
                    $order_by_name_diameter_lens = "name_diameter_lens ASC";
                    $this->pricelist_lenses_model->order_by = $order_by_name_diameter_lens;
                    $diameterLensOption = $this->pricelist_lenses_model->select();
                    $optionForDiameterLens = array('0' => "Izaberi...");
                    foreach ($diameterLensOption as $s):
                        $optionForDiameterLens += array($s->id_diameter_lens => $s->name_diameter_lens);
                    endforeach;
                    @$selected = isset($data_insert['lens_diampeter_form']) ? $data_insert['lens_diampeter_form'] : 0;
                    $data['ddlDiameterLens'] = form_dropdown('ddlDiameterLens', $optionForDiameterLens, $selected, array('style' => 'width: 220px', 'id' => 'ddlDiameterLens'));
                else:
                    $optionForDiameterLens = array('0' => "Izaberi...");
                    $data['ddlDiameterLens'] = form_dropdown('ddlDiameterLens', $optionForDiameterLens, @$selected, array('style' => 'width: 220px', 'disabled' => 'true', 'id' => 'ddlDiameterLens'));
                endif;

                $data['lensPrice'] = array(
                    'id' => 'PricePricelistLens',
                    'name' => 'PricePricelistLens',
                    'style' => 'width: 100px',
                    'readonly' => 'true',
                    'value' => isset($data_insert['lens_price_form']) ? $data_insert['lens_price_form'] : ""
                );
                $data['lensDiscount'] = array(
                    'id' => 'tbLensDiscountForm',
                    'name' => 'tbLensDiscountForm',
                    'style' => 'width: 100px',
                    'value' => isset($data_insert['lens_discount_form']) ? $data_insert['lens_discount_form'] : ""
                );

                $data['taNoteProducer'] = array(
                    'id' => 'taNoteProducer',
                    'name' => 'taNoteProducer',
                    'rows' => '4',
                    'cols' => '30',
                    'disabled' => 'true',
                    'value' => isset($data_insert['note_order_form']) ? $data_insert['note_order_form'] : "",
                    'placeholder' => 'Napomena proizvođaču'
                );

                $this->load->model('sellers_model');
                $order_by_name_seller = "name_seller ASC";
                $this->sellers_model->order_by = $order_by_name_seller;
                $sellerOption = $this->sellers_model->select();
                $optionForSeller = array('0' => 'Izaberi...');
                foreach ($sellerOption as $s):
                    $optionForSeller += array($s->id_seller => $s->name_seller);
                endforeach;
                @$selected = isset($data_insert['id_seller']) ? $data_insert['id_seller'] : 0;
                $data['ddlSeller'] = form_dropdown('ddlSeller', $optionForSeller, $selected, array('style' => 'width: 220px', 'id' => 'ddlSeller'));

                $data['form_advance_payment_form'] = array(
                    'name' => 'tbAdvancePaymentForm',
                    'id' => 'tbAdvancePaymentForm',
                    'style' => 'width: 160px',
                    'value' => isset($data_insert['advance_payment_form']) ? $data_insert['advance_payment_form'] : "",
                    'placeholder' => 'Avans'
                );

                $data['form_order_submit'] = array(
                    'name' => 'btnNext',
                    'id' => 'btnNext',
                    'value' => 'Dalje',
                    'style' => 'width: 80px; font-weight: bold; float: right; padding: 7px; border-radius: 10px',
                    'class' => 'btn-primary'
                );
            endif;
        else:

            if ($id != null):

                $where_customer = array(
                    'id_customer' => $id
                );

                $this->customers_model->where = $where_customer;
                $customer = $this->customers_model->select();

                $data['customer'] = $customer;

                $where_form = array(
                    'id_customer' => $id
                );

                $this->forms_model->where = $where_form;
                $form = $this->forms_model->select();

                $data['form'] = $form;


            endif;

            $data['form_stock'] = array(
                'name' => 'chbStockOrder',
                'id' => 'chbStockOrder',
                'value' => '1'
            );

            $data['form_order'] = array(
                'class' => 'form',
                'accept-charset' => 'utf-8',
                'method' => 'POST'
            );



            $data['form_number_form'] = array(
                'name' => 'tbNumberForm',
                'id' => 'tbNumberForm',
                'size' => '10',
                'placeholder' => 'Broj reversa'
            );

            $data['form_name_customer'] = array(
                'name' => 'tbNameCustomer',
                'id' => 'tbNameCustomer',
                'size' => '24',
                'value' => isset($customer[0]->name_customer) ? $customer[0]->name_customer : '',
                'placeholder' => 'Ime i prezime'
            );
            $data['form_year_customer'] = array(
                'name' => 'tbYearCustomer',
                'id' => 'tbYearCustomer',
                'size' => '24',
                'value' => isset($customer[0]->year_customer) ? $customer[0]->year_customer : '',
                'placeholder' => 'Godina rođenja'
            );

            $data['form_phone_customer'] = array(
                'name' => 'tbPhoneCustomer',
                'id' => 'tbPhoneCustomer',
                'size' => '24',
                'value' => isset($customer[0]->phone_customer) ? $customer[0]->phone_customer : '',
                'placeholder' => 'Broj telefona'
            );

            $data['form_email_customer'] = array(
                'name' => 'tbEmailCustomer',
                'id' => 'tbEmailCustomer',
                'size' => '24',
                'value' => isset($customer[0]->email_customer) ? $customer[0]->email_customer : '',
                'placeholder' => 'Email'
            );

            $data['form_note_customer'] = array(
                'name' => 'taNoteCustomer',
                'id' => 'taNoteCustomer',
                'rows' => '4',
                'cols' => '26',
                'value' => isset($customer[0]->note_customer) ? $customer[0]->note_customer : '',
                'placeholder' => 'Napomena'
            );

            $data['form_distance_pd_form'] = array(
                'name' => 'tbDistancePdForm',
                'id' => 'tbDistancePdForm',
                'size' => '19',
                'value' => isset($form[0]->pd_form) ? $form[0]->pd_form : '',
                'placeholder' => 'Daljina PD'
            );

            $data['form_distance_od_sph_form'] = array(
                'name' => 'tbDistanceOdSphForm',
                'id' => 'tbDistanceOdSphForm',
                'class' => 'dioptreStart',
                'size' => '3',
                'value' => isset($form[0]->distance_od_sph_form) ? $form[0]->distance_od_sph_form : '',
                'placeholder' => '0.00'
            );

            $data['form_distance_od_cyl_form'] = array(
                'name' => 'tbDistanceOdCylForm',
                'id' => 'tbDistanceOdCylForm',
                'class' => 'dioptreStart',
                'size' => '3',
                'value' => isset($form[0]->distance_od_cyl_form) ? $form[0]->distance_od_cyl_form : '',
                'placeholder' => '0.00'
            );

            $data['form_distance_od_ax_form'] = array(
                'name' => 'tbDistanceOdAxForm',
                'id' => 'tbDistanceOdAxForm',
                'class' => 'dioptreStart',
                'size' => '3',
                'value' => isset($form[0]->distance_od_ax_form) ? $form[0]->distance_od_ax_form : '',
                'placeholder' => '0'
            );

            $data['form_distance_os_sph_form'] = array(
                'name' => 'tbDistanceOsSphForm',
                'id' => 'tbDistanceOsSphForm',
                'class' => 'dioptreStart',
                'size' => '3',
                'value' => isset($form[0]->distance_os_sph_form) ? $form[0]->distance_os_sph_form : '',
                'placeholder' => '0.00'
            );

            $data['form_distance_os_cyl_form'] = array(
                'name' => 'tbDistanceOsCylForm',
                'id' => 'tbDistanceOsCylForm',
                'class' => 'dioptreStart',
                'size' => '3',
                'value' => isset($form[0]->distance_os_cyl_form) ? $form[0]->distance_os_cyl_form : '',
                'placeholder' => '0.00'
            );

            $data['form_distance_os_ax_form'] = array(
                'name' => 'tbDistanceOsAxForm',
                'id' => 'tbDistanceOsAxForm',
                'class' => 'dioptreStart',
                'size' => '3',
                'value' => isset($form[0]->distance_os_ax_form) ? $form[0]->distance_od_ax_form : '',
                'placeholder' => '0'
            );

            $data['form_add_form'] = array(
                'name' => 'tbAddForm',
                'id' => 'tbAddForm',
                'class' => 'dioptreStart',
                'size' => '3',
                'value' => isset($form[0]->add_form) ? $form[0]->add_form : '',
                'placeholder' => '0'
            );

            $data['form_proximity_pd_form'] = array(
                'name' => 'tbProximityPdForm',
                'id' => 'tbProximityPdForm',
                'size' => '19',
                'placeholder' => 'Bliznina PD',
                'readonly' => true
            );

            $data['form_proximity_od_sph_form'] = array(
                'name' => 'tbProximityOdSphForm',
                'id' => 'tbProximityOdSphForm',
                'size' => '3',
                'value' => isset($form[0]->proximity_od_sph_form) ? $form[0]->proximity_od_sph_form : '',
                'placeholder' => '0.00',
                'readonly' => true
            );

            $data['form_proximity_od_cyl_form'] = array(
                'name' => 'tbProximityOdCylForm',
                'id' => 'tbProximityOdCylForm',
                'size' => '3',
                'value' => isset($form[0]->proximity_od_cyl_form) ? $form[0]->proximity_od_cyl_form : '',
                'placeholder' => '0.00',
                'readonly' => true
            );

            $data['form_proximity_od_ax_form'] = array(
                'name' => 'tbProximityOdAxForm',
                'id' => 'tbProximityOdAxForm',
                'size' => '3',
                'value' => isset($form[0]->proximity_od_ax_form) ? $form[0]->proximity_od_ax_form : '',
                'placeholder' => '0',
                'readonly' => true
            );

            $data['form_proximity_os_sph_form'] = array(
                'name' => 'tbProximityOsSphForm',
                'id' => 'tbProximityOsSphForm',
                'size' => '3',
                'value' => isset($form[0]->proximity_os_sph_form) ? $form[0]->proximity_os_sph_form : '',
                'placeholder' => '0.00',
                'readonly' => true
            );

            $data['form_proximity_os_cyl_form'] = array(
                'name' => 'tbProximityOsCylForm',
                'id' => 'tbProximityOsCylForm',
                'size' => '3',
                'value' => isset($form[0]->proximity_os_cyl_form) ? $form[0]->proximity_os_cyl_form : '',
                'placeholder' => '0.00',
                'readonly' => true
            );

            $data['form_proximity_os_ax_form'] = array(
                'name' => 'tbProximityOsAxForm',
                'id' => 'tbProximityOsAxForm',
                'size' => '3',
                'value' => isset($form[0]->proximity_os_ax_form) ? $form[0]->proximity_od_ax_form : '',
                'placeholder' => '0',
                'readonly' => true
            );

            $data['frame_form'] = array(
                'name' => 'tbFrameForm',
                'id' => 'tbFrameForm',
                'style' => 'width: 220px'
            );

            $data['frame_price_form'] = array(
                'name' => 'tbFramePriceForm',
                'id' => 'tbFramePriceForm',
                'style' => 'width: 185px'
            );

            $data['frame_discount_form'] = array(
                'name' => 'tbFrameDiscountForm',
                'id' => 'tbFrameDiscountForm',
                'style' => 'width: 190px'
            );

            $this->load->model('sellers_model');
            $order_by_name_seller = "name_seller ASC";
            $this->sellers_model->order_by = $order_by_name_seller;
            $sellerOption = $this->sellers_model->select();
            $optionForSeller = array('0' => 'Izaberi...');
            foreach ($sellerOption as $s):
                $optionForSeller += array($s->id_seller => $s->name_seller);
            endforeach;
            @$selected = $data_insert['id_seller'];
            $data['ddlSeller'] = form_dropdown('ddlSeller', $optionForSeller, $selected, array('style' => 'width: 220px', 'id' => 'ddlSeller'));

            $this->load->model('producers_lenses_model');
            $order_by_name_producer_lens = "name_producer_lens ASC";
            $this->producers_lenses_model->order_by = $order_by_name_producer_lens;
            $producersLensOption = $this->producers_lenses_model->select();
            $optionForProducerLens = array('0' => 'Izaberi...');
            foreach ($producersLensOption as $s):
                $optionForProducerLens += array($s->id_producer_lens => $s->name_producer_lens);
            endforeach;
            @$selected = $data_insert['id_producer_lens'];
            $data['ddlProducerLens'] = form_dropdown('ddlProducerLens', $optionForProducerLens, $selected, array('style' => 'width: 220px', 'id' => 'ddlProducerLens'));

            $optionFormMaterialLens = array('0' => 'Izaberi...');
            $data['ddlMaterialLens'] = form_dropdown('ddlMaterialLens', $optionFormMaterialLens, @$selected, array('style' => 'width: 220px', 'id' => 'ddlMaterialLens', 'disabled' => "true"));

            $optionForTypeLens = array('0' => 'Izaberi...');
            $data['ddlTypeLens'] = form_dropdown('ddlTypeLens', $optionForTypeLens, @$selected, array('style' => 'width: 220px', 'disabled' => 'true', 'id' => 'ddlTypeLens'));

            $optionForDesignLens = array('0' => 'Izaberi...');
            $data['ddlDesignLens'] = form_dropdown('ddlDesignLens', $optionForDesignLens, @$selected, array('style' => 'width: 220px', 'disabled' => 'true', 'id' => 'ddlDesignLens'));

            $optionForIndexLens = array('0' => 'Izaberi...');
            $data['ddlIndexLens'] = form_dropdown('ddlIndexLens', $optionForIndexLens, @$selected, array('style' => 'width: 220px', 'disabled' => 'true', 'id' => 'ddlIndexLens'));
            $optionForNameLens = array('0' => 'Izaberi...');
            $data['ddlNameLens'] = form_dropdown('ddlNameLens', $optionForNameLens, @$selected, array('style' => 'width: 220px', 'disabled' => 'true', 'id' => 'ddlNameLens'));

            $optionForFinishingLens = array('0' => 'Izaberi...');
            $data['ddlFinishingLens'] = form_dropdown('ddlFinishingLens', $optionForFinishingLens, @$selected, array('style' => 'width: 220px', 'disabled' => 'true', 'id' => 'ddlFinishingLens'));

            $optionForRangeDioptreLens = array('0' => 'Izaberi...');
            $data['ddlRangeDioptreLens'] = form_dropdown('ddlRangeDioptreLens', $optionForRangeDioptreLens, @$selected, array('style' => 'width: 220px', 'disabled' => 'true', 'id' => 'ddlRangeDioptreLens'));

            $optionForDiameterLens = array('0' => "Izaberi...");
            $data['ddlDiameterLens'] = form_dropdown('ddlDiameterLens', $optionForDiameterLens, @$selected, array('style' => 'width: 220px', 'disabled' => 'true', 'id' => 'ddlDiameterLens'));

            $data['lensPrice'] = array(
                'id' => 'PricePricelistLens',
                'name' => 'PricePricelistLens',
                'style' => 'width: 100px',
                'readonly' => 'true'
            );

            $data['lensDiscount'] = array(
                'id' => 'tbLensDiscountForm',
                'name' => 'tbLensDiscountForm',
                'style' => 'width: 100px',
                'disabled' => 'true'
            );

            $data['note_order_form'] = array(
                'name' => 'taNoteProducer',
                'id' => 'taNoteProducer',
                'rows' => '4',
                'cols' => '30',
                'placeholder' => 'Napomena proizvođaču',
                'value' => isset($form[0]->note_order_list) ? $form[0]->note_order_list : ''
            );

            $data['form_advance_payment_form'] = array(
                'name' => 'tbAdvancePaymentForm',
                'id' => 'tbAdvancePaymentForm',
                'style' => 'width: 160px',
                'placeholder' => 'Avans'
            );

            $data['form_order_submit'] = array(
                'name' => 'btnNext',
                'id' => 'btnNext',
                'value' => 'Dalje',
                'style' => 'width: 80px; font-weight: bold; float: right; padding: 7px; border-radius: 10px',
                'class' => 'btn-primary'
            );
        endif;

        $right_left = $this->right_left_model->select();
        $data['right_left'] = $right_left;

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

        $data['title'] = "Nova porudžbina";

        $view = "sales/NewOrderForm";
        $this->load_view_admin($view, $data);
    }

    public function confirmNewOrder($id = null) {

        $company_information = $this->company_information_model->select();
        $data['company'] = $company_information;
        if (isset($_POST['btnOrder'])):
            $data['message'] = "";
            if ($id != null):

                $insert_id_customer = $id;

                // unos u tabelu forms            
                $this->forms_model->number_form = $this->session->userdata('number_form');
                $this->forms_model->date_form = time();

                $this->forms_model->pd_form = $this->session->userdata('pd_form');

                $this->forms_model->distance_od_sph_form = $this->session->userdata('distance_od_sph_form');
                $this->forms_model->distance_od_cyl_form = $this->session->userdata('distance_od_cyl_form');
                $this->forms_model->distance_od_ax_form = $this->session->userdata('distance_od_ax_form');

                $this->forms_model->distance_os_sph_form = $this->session->userdata('distance_os_sph_form');
                $this->forms_model->distance_os_cyl_form = $this->session->userdata('distance_os_cyl_form');
                $this->forms_model->distance_os_ax_form = $this->session->userdata('distance_os_ax_form');

                $this->forms_model->frame_form = $this->session->userdata('frame_form');
                $this->forms_model->frame_price_form = $this->session->userdata('frame_price_form');
                $this->forms_model->frame_discount_form = $this->session->userdata('frame_discount_form');

                $this->producers_lenses_model->id_producer_lens = $this->session->userdata('lens_producer_form');
                $lens_producer_form = $this->producers_lenses_model->select();
                $this->forms_model->lens_producer_form = $lens_producer_form[0]->name_producer_lens;

                $this->material_lenses_model->id_material_lens = $this->session->userdata('lens_material_form');
                $lens_material_form = $this->material_lenses_model->select();
                $this->forms_model->lens_material_form = $lens_material_form[0]->name_material_lens;

                $this->type_lenses_model->id_type_lens = $this->session->userdata('lens_type_form');
                $lens_type_form = $this->type_lenses_model->select();
                $this->forms_model->lens_type_form = $lens_type_form[0]->name_type_lens;

                $this->designs_lenses_model->id_design_lens = $this->session->userdata('lens_designe_form');
                $lens_designe_form = $this->designs_lenses_model->select();
                $this->forms_model->lens_designe_form = $lens_designe_form[0]->name_design_lens;

                $this->index_lenses_model->id_index_lens = $this->session->userdata('lens_index_form');
                $lens_index_form = $this->index_lenses_model->select();
                $this->forms_model->lens_index_form = $lens_index_form[0]->name_index_lens;

                $this->name_lenses_model->id_name_lens = $this->session->userdata('lens_name_form');
                $lens_name_form = $this->name_lenses_model->select();
                $this->forms_model->lens_name_form = $lens_name_form[0]->name_name_lens;

                $this->finishing_lenses_model->id_finishing_lens = $this->session->userdata('lens_finishing_form');
                $lens_finishing_form = $this->finishing_lenses_model->select();
                $this->forms_model->lens_finishing_form = $lens_finishing_form[0]->name_finishing_lens;

                $this->diameter_lenses_model->id_diameter_lens = $this->session->userdata('lens_diampeter_form');
                $lens_diameter_form = $this->diameter_lenses_model->select();
                $this->forms_model->lens_diameter_lens = $lens_diameter_form[0]->name_diameter_lens;

                $where_lens_price_form = array(
                    'pricelist_lenses.id_producer_lens' => $this->session->userdata('lens_producer_form'),
                    'pricelist_lenses.id_material_lens' => $this->session->userdata('lens_material_form'),
                    'pricelist_lenses.id_type_lens' => $this->session->userdata('lens_type_form'),
                    'pricelist_lenses.id_design_lens' => $this->session->userdata('lens_designe_form'),
                    'pricelist_lenses.id_index_lens' => $this->session->userdata('lens_index_form'),
                    'pricelist_lenses.id_name_lens' => $this->session->userdata('lens_name_form'),
                    'pricelist_lenses.id_finishing_lens' => $this->session->userdata('lens_finishing_form'),
                    'pricelist_lenses.id_range_dioptre_lens' => $this->session->userdata('lens_range_dioptre_form'),
                    'pricelist_lenses.id_diameter_lens' => $this->session->userdata('lens_diampeter_form')
                );
                $this->pricelist_lenses_model->where = $where_lens_price_form;
                $lens_price_form = $this->pricelist_lenses_model->select();
                $this->forms_model->lens_price_form = $lens_price_form[0]->price_pricelist_lens;

//                $this->forms_model->lens_price_form = $this->session->userdata('lens_price_form');

                $this->forms_model->lens_discount_form = $this->session->userdata('lens_discount_form');

                if ($this->session->userdata('add_form') == 0):
                    $this->forms_model->add_form = NULL;
                else:
                    $this->forms_model->add_form = $this->session->userdata('add_form');
                endif;

                $this->forms_model->advance_payment_form = $this->session->userdata('advance_payment_form');
                $this->forms_model->id_seller = $this->session->userdata('id_seller');
                $this->forms_model->id_customer = $insert_id_customer;
                $where_exchange = array(
                    'default_amount_exchange' => 1
                );

                $this->exchange_model->where = $where_exchange;
                $id_exchange = $this->exchange_model->select();

                $this->forms_model->id_exchange = $id_exchange[0]->id_exchange;
                $this->forms_model->id_distance_proximity = $this->session->userdata('chbDistanceProximity');

                $result_forms = $this->forms_model->insert();
                $insert_id_forms = $this->forms_model->select_insert_id();

                // upis u tavelu order_lists
                $this->order_lists_model->date_order_list = time();
                $this->order_lists_model->id_form = $insert_id_forms[0]->lastId;
                $this->order_lists_model->note_order_list = $this->session->userdata('note_order_form');
                $this->order_lists_model->id_pricelist_lens_right = $lens_price_form[0]->id_pricelist_lens;
                $this->order_lists_model->id_pricelist_lens_left = $lens_price_form[0]->id_pricelist_lens;
                $this->order_lists_model->id_order_status = 3;
                $this->order_lists_model->id_right_left = $this->session->userdata('chbRightLeft')[0];

                if ($result_forms == TRUE):
                    $result_order_lists = $this->order_lists_model->insert();
                    $number_order = $this->order_lists_model->select_insert_id();
                else:
                    $result_order_lists = FALSE;
                endif;

//                $this->session->set_flashdata("message2", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Pozzz " . $result_forms . "</div>");
//                $this->session->set_flashdata("message2", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Pozzz " . $result_order_lists . "</div>");

                if ($result_order_lists == TRUE):

                    $this->load->library('email');
                    $this->email->set_newline("\r\n");


                    //slanje maila prozivodjacu
                    $this->producers_lenses_model->id_producer_lens = $this->session->userdata('lens_producer_form');
                    $producer = $this->producers_lenses_model->select();
                    $this->order_lists_model->id_order_list = $number_order[0]->lastId;
                    $new_order = $this->order_lists_model->select();
                    $this->email->from('office.eye.care@mms.in.rs', 'EyeCare Optical');
                    $this->email->to($producer[0]->email_producer_lens);

                    $this->email->subject('Broj porudžbine: ' . $number_order[0]->lastId);
                    $this->email->message('<hmtl><body><h1 style="text-decoration: none;"><a class="navbar-brand1" href="' . base_url() . '">' . $company_information[0]->name_company_1 . '</a><a class="navbar-brand1" href=" ' . base_url() . '">' . $company_information[0]->name_company_2 . ' optika</a></h1><hr><p>Poštovani,</p><p>Poručujemo sledeće: </p><p>Kupac: ' . $new_order[0]->name_customer . ', godina rođenja: ' . $new_order[0]->year_customer . '</p><ul><li>OKO: ' . $new_order[0]->name_right_left . '</li><li>Proizvođač: ' . $new_order[0]->lens_producer_form . '</li><li>Materija: ' . $new_order[0]->lens_material_form . '</li><li>Tip: ' . $new_order[0]->lens_type_form . '</li><li>Dizajn: ' . $new_order[0]->lens_designe_form . '</li><li>Index: ' . $new_order[0]->lens_index_form . '</li><li>Naziv: ' . $new_order[0]->lens_name_form . '</li><li>Dorada: ' . $new_order[0]->lens_finishing_form . '</li><li>Dioptrija: <ul><li>Desno sph: ' . $new_order[0]->distance_od_sph_form . ' Desno Cyl: ' . $new_order[0]->distance_od_cyl_form . ' Desno ax: ' . $new_order[0]->distance_od_ax_form . '</li><li>Levo sph: ' . $new_order[0]->distance_os_sph_form . ' Levo Cyl: ' . $new_order[0]->distance_os_cyl_form . ' Levo ax: ' . $new_order[0]->distance_os_ax_form . '</li><li>Adicija: ' . $new_order[0]->add_form . '</li></ul></li><li>Prečnik: ' . $new_order[0]->lens_diameter_lens . 'mm</li></ul><br><hr><footer><p>S poštovanjem,</p><p>Vaša optika ' . $company_information[0]->name_company_1 . " " . $company_information[0]->name_company_2 . '</p><p>Adresa: ' . $company_information[0]->address_company . ', ' . $company_information[0]->city_company . '</p><p>Telefon: ' . $company_information[0]->phone_company . '</p><p>Email: ' . $company_information[0]->mail_company . '</p><p>Radno vreme: ' . $company_information[0]->working_days_company . ', ' . $company_information[0]->working_time_company . '</p></footer></body></html>');


                    if ($this->email->send()):
                        $this->email->clear();
                        //slanje maila kupcu
                        $this->order_lists_model->id_order_list = $number_order[0]->lastId;
                        $new_order = $this->order_lists_model->select();
                        $code = $new_order[0]->date_order_list * $new_order[0]->id_form;

                        if ($new_order[0]->email_customer != NULL):
                            $this->email->from('office.eye.care@mms.in.rs', 'EyeCare Optical');
                            $this->email->to($new_order[0]->email_customer);
                            
                            $this->email->subject($new_order[0]->name_customer . ', vaša porudžbina ' . $number_order[0]->lastId . ' u optici ' . $company_information[0]->name_company_1 . ' ' . $company_information[0]->name_company_2);
                            $this->email->message('<hmtl><body><h1 style="text-decoration: none;"><a class="navbar-brand1" href="' . base_url() . '">' . $company_information[0]->name_company_1 . '</a><a class="navbar-brand1" href=" ' . base_url() . '">' . $company_information[0]->name_company_2 . ' optika</a></h1><hr><p>Poštovani, ' . $new_order[0]->name_customer . '</p><p>Ovim mail Vas obaveštavamo da je vaša porudžbina uspešno poručena. Za sve dodatne izmene bićete ovim putem obavešteni. Ukoliko imate neke nedoumice slobodno nas možete kontaktirati na naš broj telefona ili mail adresu.</p><p>Klikom na ovaj link: </p><p><a href="' . base_url() . 'home/index/' . $new_order[0]->id_order_list . '/' . $code . '">Proverite vaš status porudžbine</a></p><hr><footer><p>S poštovanjem,</p><p>Vaša optika ' . $company_information[0]->name_company_1 . " " . $company_information[0]->name_company_2 . '</p><p>Adresa: ' . $company_information[0]->address_company . ', ' . $company_information[0]->city_company . '</p><p>Telefon: ' . $company_information[0]->phone_company . '</p><p>Email: ' . $company_information[0]->mail_company . '</p><p>Radno vreme: ' . $company_information[0]->working_days_company . ', ' . $company_information[0]->working_time_company . '</p></footer></body></html>');

                            if ($this->email->send()):
                                $this->session->set_flashdata("message2", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste poručili robu i poslali mail kupcu! </div>");
                            else:
                                $this->session->set_flashdata("message2", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška pri slanju mail-a kupcu!<br>" . $this->email->print_debugger() . "</div>");
                            endif;
                        else:
                            $this->session->set_flashdata("message2", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste poručili robu!</div>");
                        endif;
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška pri slanju mail-a proizvodžaču!<br>" . $this->email->print_debugger() . "</div>");
                    endif;
                    redirect('administration/sales/NewOrder');
                else:
                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška pri poručivanju!</div>");
                    redirect('administration/sales/NewOrder');
                endif;

            else:

                if ($this->session->userdata('number_form') != "" && $this->session->userdata('name_customer') != ""):

                    // unos u tabelu customer
                    $this->customers_model->name_customer = $this->session->userdata('name_customer');
                    $this->customers_model->year_customer = $this->session->userdata('year_customer');
                    $this->customers_model->phone_customer = $this->session->userdata('phone_customer');
                    $this->customers_model->email_customer = $this->session->userdata('email_customer');
                    $this->customers_model->note_customer = $this->session->userdata('note_customer');

                    $result_customers = $this->customers_model->insert();
//                    $this->load->model('customers_model', 'customers');
                    $insert_id_customer = $this->customers_model->select_insert_id();
                else:
                    $this->session->set_userdata('number_form', 0);
                    @$insert_id_customer[0]->lastId = 1;
                endif;
                // unos u tabelu forms            
                $this->forms_model->number_form = $this->session->userdata('number_form');

                $this->forms_model->date_form = time();

                $this->forms_model->pd_form = $this->session->userdata('pd_form');

                $this->forms_model->distance_od_sph_form = $this->session->userdata('distance_od_sph_form');
                $this->forms_model->distance_od_cyl_form = $this->session->userdata('distance_od_cyl_form');
                $this->forms_model->distance_od_ax_form = $this->session->userdata('distance_od_ax_form');

                $this->forms_model->distance_os_sph_form = $this->session->userdata('distance_os_sph_form');
                $this->forms_model->distance_os_cyl_form = $this->session->userdata('distance_os_cyl_form');
                $this->forms_model->distance_os_ax_form = $this->session->userdata('distance_os_ax_form');

                $this->forms_model->frame_form = $this->session->userdata('frame_form');
                $this->forms_model->frame_price_form = $this->session->userdata('frame_price_form');
                $this->forms_model->frame_discount_form = $this->session->userdata('frame_discount_form');

                $this->producers_lenses_model->id_producer_lens = $this->session->userdata('lens_producer_form');
                $lens_producer_form = $this->producers_lenses_model->select();
                $this->forms_model->lens_producer_form = $lens_producer_form[0]->name_producer_lens;

                $this->material_lenses_model->id_material_lens = $this->session->userdata('lens_material_form');
                $lens_material_form = $this->material_lenses_model->select();
                $this->forms_model->lens_material_form = $lens_material_form[0]->name_material_lens;

                $this->type_lenses_model->id_type_lens = $this->session->userdata('lens_type_form');
                $lens_type_form = $this->type_lenses_model->select();
                $this->forms_model->lens_type_form = $lens_type_form[0]->name_type_lens;

                $this->designs_lenses_model->id_design_lens = $this->session->userdata('lens_designe_form');
                $lens_designe_form = $this->designs_lenses_model->select();
                $this->forms_model->lens_designe_form = $lens_designe_form[0]->name_design_lens;

                $this->index_lenses_model->id_index_lens = $this->session->userdata('lens_index_form');
                $lens_index_form = $this->index_lenses_model->select();
                $this->forms_model->lens_index_form = $lens_index_form[0]->name_index_lens;

                $this->name_lenses_model->id_name_lens = $this->session->userdata('lens_name_form');
                $lens_name_form = $this->name_lenses_model->select();
                $this->forms_model->lens_name_form = $lens_name_form[0]->name_name_lens;

                $this->finishing_lenses_model->id_finishing_lens = $this->session->userdata('lens_finishing_form');
                $lens_finishing_form = $this->finishing_lenses_model->select();
                $this->forms_model->lens_finishing_form = $lens_finishing_form[0]->name_finishing_lens;

                $this->diameter_lenses_model->id_diameter_lens = $this->session->userdata('lens_diampeter_form');
                $lens_diameter_form = $this->diameter_lenses_model->select();
                $this->forms_model->lens_diameter_lens = $lens_diameter_form[0]->name_diameter_lens;

                $where_lens_price_form = array(
                    'pricelist_lenses.id_producer_lens' => $this->session->userdata('lens_producer_form'),
                    'pricelist_lenses.id_material_lens' => $this->session->userdata('lens_material_form'),
                    'pricelist_lenses.id_type_lens' => $this->session->userdata('lens_type_form'),
                    'pricelist_lenses.id_design_lens' => $this->session->userdata('lens_designe_form'),
                    'pricelist_lenses.id_index_lens' => $this->session->userdata('lens_index_form'),
                    'pricelist_lenses.id_name_lens' => $this->session->userdata('lens_name_form'),
                    'pricelist_lenses.id_finishing_lens' => $this->session->userdata('lens_finishing_form'),
                    'pricelist_lenses.id_range_dioptre_lens' => $this->session->userdata('lens_range_dioptre_form'),
                    'pricelist_lenses.id_diameter_lens' => $this->session->userdata('lens_diampeter_form')
                );
                $this->pricelist_lenses_model->where = $where_lens_price_form;
                $lens_price_form = $this->pricelist_lenses_model->select();
                $this->forms_model->lens_price_form = $lens_price_form[0]->price_pricelist_lens;
//                $this->forms_model->lens_price_form = $this->session->userdata('lens_price_form');

                $this->forms_model->lens_discount_form = $this->session->userdata('lens_discount_form');

                if ($this->session->userdata('add_form') == 0):
                    $this->forms_model->add_form = NULL;
                else:
                    $this->forms_model->add_form = $this->session->userdata('add_form');
                endif;

                $this->forms_model->advance_payment_form = $this->session->userdata('advance_payment_form');
                $this->forms_model->id_seller = $this->session->userdata('id_seller');
                $this->forms_model->id_customer = $insert_id_customer[0]->lastId;
                $where_exchange = array(
                    'default_amount_exchange' => 1
                );

                $this->exchange_model->where = $where_exchange;
                $id_exchange = $this->exchange_model->select();

                $this->forms_model->id_exchange = $id_exchange[0]->id_exchange;
                $this->forms_model->id_distance_proximity = $this->session->userdata('chbDistanceProximity');

                if ($this->session->userdata('number_form') == 0):
                    $result_forms = $this->forms_model->insert();
                    $insert_id_forms = $this->forms_model->select_insert_id();
                else:
                    if ($result_customers == TRUE):
                        $result_forms = $this->forms_model->insert();
                        $insert_id_forms = $this->forms_model->select_insert_id();
                    else:
                        $result_forms = FALSE;
                    endif;
                endif;

                // uois u tavelu order_lists
                $this->order_lists_model->date_order_list = time();
                $this->order_lists_model->id_form = $insert_id_forms[0]->lastId;
                $this->order_lists_model->note_order_list = $this->session->userdata('note_order_form');
                $this->order_lists_model->id_pricelist_lens_right = $lens_price_form[0]->id_pricelist_lens;
                $this->order_lists_model->id_pricelist_lens_left = $lens_price_form[0]->id_pricelist_lens;
                $this->order_lists_model->id_order_status = 3;
                $this->order_lists_model->id_right_left = $this->session->userdata('chbRightLeft')[0];

                if ($result_forms == TRUE):
                    $result_order_lists = $this->order_lists_model->insert();
                    $number_order = $this->order_lists_model->select_insert_id();
                else:
                    $result_order_lists = FALSE;
                endif;

                if ($result_order_lists == TRUE):

                    $this->load->library('email');
                    $this->email->set_newline("\r\n");

                    //slanje maila prozivodjacu
                    $this->producers_lenses_model->id_producer_lens = $this->session->userdata('lens_producer_form');
                    $producer = $this->producers_lenses_model->select();
                    $this->order_lists_model->id_order_list = $number_order[0]->lastId;
                    $new_order = $this->order_lists_model->select();
                    $this->email->from('testiranje160488@gmail.com', 'EyeCare Optical');
                    $this->email->to($producer[0]->email_producer_lens);

                    $this->email->subject('Broj porudžbine: ' . $number_order[0]->lastId);
                    $this->email->message('<hmtl><body><h1 style="text-decoration: none;"><a class="navbar-brand1" href="' . base_url() . '">' . $company_information[0]->name_company_1 . '</a><a class="navbar-brand1" href=" ' . base_url() . '">' . $company_information[0]->name_company_2 . ' optika</a></h1><hr><p>Poštovani,</p><p>Poručujemo sledeće: </p><p>Kupac: ' . $new_order[0]->name_customer . ', godina rođenja: ' . $new_order[0]->year_customer . '</p><ul><li>OKO: ' . $new_order[0]->name_right_left . '</li><li>Proizvođač: ' . $new_order[0]->lens_producer_form . '</li><li>Materija: ' . $new_order[0]->lens_material_form . '</li><li>Tip: ' . $new_order[0]->lens_type_form . '</li><li>Dizajn: ' . $new_order[0]->lens_designe_form . '</li><li>Index: ' . $new_order[0]->lens_index_form . '</li><li>Naziv: ' . $new_order[0]->lens_name_form . '</li><li>Dorada: ' . $new_order[0]->lens_finishing_form . '</li><li>Dioptrija: <ul><li>Desno sph: ' . $new_order[0]->distance_od_sph_form . ' Desno Cyl: ' . $new_order[0]->distance_od_cyl_form . ' Desno ax: ' . $new_order[0]->distance_od_ax_form . '</li><li>Levo sph: ' . $new_order[0]->distance_os_sph_form . ' Levo Cyl: ' . $new_order[0]->distance_os_cyl_form . ' Levo ax: ' . $new_order[0]->distance_os_ax_form . '</li><li>Adicija: ' . $new_order[0]->add_form . '</li></ul></li><li>Prečnik: ' . $new_order[0]->lens_diameter_lens . 'mm</li></ul><br><hr><footer><p>S poštovanjem,</p><p>Vaša optika ' . $company_information[0]->name_company_1 . " " . $company_information[0]->name_company_2 . '</p><p>Adresa: ' . $company_information[0]->address_company . ', ' . $company_information[0]->city_company . '</p><p>Telefon: ' . $company_information[0]->phone_company . '</p><p>Email: ' . $company_information[0]->mail_company . '</p><p>Radno vreme: ' . $company_information[0]->working_days_company . ', ' . $company_information[0]->working_time_company . '</p></footer></body></html>');

                    if ($this->email->send()):
                        $this->email->clear();
                        //slanje maila kupcu
                        $this->order_lists_model->id_order_list = $number_order[0]->lastId;
                        $new_order = $this->order_lists_model->select();
                        $code = $new_order[0]->date_order_list * $new_order[0]->id_form;

                        if ($new_order[0]->email_customer != NULL):
                            $this->email->from('testiranje160488@gmail.com', 'EyeCare Optical');
                            $this->email->to($new_order[0]->email_customer);

                            $this->email->subject($new_order[0]->name_customer . ', vaša porudžbina ' . $number_order[0]->lastId . ' u optici ' . $company_information[0]->name_company_1 . ' ' . $company_information[0]->name_company_2);
                            $this->email->message('<hmtl><body><h1 style="text-decoration: none;"><a class="navbar-brand1" href="' . base_url() . '">' . $company_information[0]->name_company_1 . '</a><a class="navbar-brand1" href=" ' . base_url() . '">' . $company_information[0]->name_company_2 . ' optika</a></h1><hr><p>Poštovani, ' . $new_order[0]->name_customer . '</p><p>Ovim mail Vas obaveštavamo da je vaša porudžbina uspešno poručena. Za sve dodatne izmene bićete ovim putem obavešteni. Ukoliko imate neke nedoumice slobodno nas možete kontaktirati na naš broj telefona ili mail adresu.</p><p>Klikom na ovaj link: </p><p><a href="' . base_url() . 'home/index/' . $new_order[0]->id_order_list . '/' . $code . '">Proverite vaš status porudžbine</a></p><hr><footer><p>S poštovanjem,</p><p>Vaša optika ' . $company_information[0]->name_company_1 . " " . $company_information[0]->name_company_2 . '</p><p>Adresa: ' . $company_information[0]->address_company . ', ' . $company_information[0]->city_company . '</p><p>Telefon: ' . $company_information[0]->phone_company . '</p><p>Email: ' . $company_information[0]->mail_company . '</p><p>Radno vreme: ' . $company_information[0]->working_days_company . ', ' . $company_information[0]->working_time_company . '</p></footer></body></html>');

                            if ($this->email->send()):
                                $this->session->set_flashdata("message2", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste poručili robu i poslali mail kupcu!</div>");
                                redirect('administration/sales/NewOrder');
                                redirect('administration/sales/NewOrder');
                            else:
                                $this->session->set_flashdata("message2", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška pri slanju mail-a kupcu!<br>" . $this->email->print_debugger() . "</div>");
                                redirect('administration/sales/NewOrder');
                            endif;
                        else:
                            $this->session->set_flashdata("message2", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste poručili robu!</div>");
                            redirect('administration/sales/NewOrder');
                        endif;
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška pri slanju mail-a proizvodžaču!<br>" . $this->email->print_debugger() . "</div>");
                        redirect('administration/sales/NewOrder');
                    endif;
                else:
                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška pri poručivanju!</div>");
                    redirect('administration/sales/NewOrder');
                endif;
            endif;
        endif;

        $data['form_order'] = array(
            'class' => 'form',
            'accept-charset' => 'utf-8',
            'method' => 'POST'
        );

        $data['form_stock'] = array(
            'name' => 'chbStockOrder',
            'id' => 'chbStockOrder',
            'value' => '1',
            'onclick' => 'stockChange()'
        );

        $data['form_number_form'] = array(
            'name' => 'tbNumberForm',
            'id' => 'tbNumberForm',
            'size' => '10',
            'placeholder' => 'Broj reversa',
            'value' => @$this->session->userdata('number_form'),
            'disabled' => 'true',
            'required' => TRUE
        );

        $data['form_name_customer'] = array(
            'name' => 'tbNameCustomer',
            'id' => 'tbNameCustomer',
            'size' => '24',
            'value' => @$this->session->userdata('name_customer'),
            'placeholder' => 'Ime i prezime',
            'disabled' => 'true',
            'required' => TRUE
        );
        $data['form_year_customer'] = array(
            'name' => 'tbYearCustomer',
            'id' => 'tbYearCustomer',
            'size' => '24',
            'value' => @$this->session->userdata('year_customer'),
            'placeholder' => 'Godina rođenja',
            'disabled' => 'true'
        );

        $data['form_phone_customer'] = array(
            'name' => 'tbPhoneCustomer',
            'id' => 'tbPhoneCustomer',
            'size' => '24',
            'value' => @$this->session->userdata('phone_customer'),
            'placeholder' => 'Broj telefona',
            'disabled' => 'true'
        );

        $data['form_email_customer'] = array(
            'name' => 'tbEmailCustomer',
            'id' => 'tbEmailCustomer',
            'size' => '24',
            'value' => @$this->session->userdata('email_customer'),
            'placeholder' => 'Email',
            'disabled' => 'true'
        );

        $data['form_note_customer'] = array(
            'name' => 'taNoteCustomer',
            'id' => 'taNoteCustomer',
            'rows' => '4',
            'cols' => '26',
            'value' => @$this->session->userdata('note_customer'),
            'placeholder' => 'Napomena',
            'disabled' => 'true'
        );

        $data['form_distance_pd_form'] = array(
            'name' => 'tbDistancePdForm',
            'id' => 'tbDistancePdForm',
            'size' => '19',
            'value' => @$this->session->userdata('pd_form'),
            'placeholder' => 'Daljina PD',
            'disabled' => 'true',
            'onchange' => 'pdForm()'
        );

        $data['form_distance_od_sph_form'] = array(
            'name' => 'tbDistanceOdSphForm',
            'id' => 'tbDistanceOdSphForm',
            'size' => '3',
            'value' => @$this->session->userdata('distance_od_sph_form'),
            'placeholder' => '0.00',
            'disabled' => 'true',
            'onchange' => 'addForm()'
        );

        $data['form_distance_od_cyl_form'] = array(
            'name' => 'tbDistanceOdCylForm',
            'id' => 'tbDistanceOdCylForm',
            'size' => '3',
            'value' => @$this->session->userdata('distance_od_cyl_form'),
            'placeholder' => '0.00',
            'disabled' => 'true',
            'onchange' => 'addForm()'
        );

        $data['form_distance_od_ax_form'] = array(
            'name' => 'tbDistanceOdAxForm',
            'id' => 'tbDistanceOdAxForm',
            'size' => '3',
            'value' => @$this->session->userdata('distance_od_ax_form'),
            'placeholder' => '0',
            'disabled' => 'true',
            'onchange' => 'addForm()'
        );

        $data['form_distance_os_sph_form'] = array(
            'name' => 'tbDistanceOsSphForm',
            'id' => 'tbDistanceOsSphForm',
            'size' => '3',
            'value' => @$this->session->userdata('distance_os_sph_form'),
            'placeholder' => '0.00',
            'disabled' => 'true'
        );

        $data['form_distance_os_cyl_form'] = array(
            'name' => 'tbDistanceOsCylForm',
            'id' => 'tbDistanceOsCylForm',
            'size' => '3',
            'value' => @$this->session->userdata('distance_os_cyl_form'),
            'placeholder' => '0.00',
            'disabled' => 'true'
        );

        $data['form_distance_os_ax_form'] = array(
            'name' => 'tbDistanceOsAxForm',
            'id' => 'tbDistanceOsAxForm',
            'size' => '3',
            'value' => @$this->session->userdata('distance_os_ax_form'),
            'placeholder' => '0',
            'disabled' => 'true'
        );

        $data['form_add_form'] = array(
            'name' => 'tbAddForm',
            'id' => 'tbAddForm',
            'size' => '3',
            'value' => @$this->session->userdata('add_form'),
            'placeholder' => '0',
            'disabled' => 'true'
        );

        $data['form_proximity_pd_form'] = array(
            'name' => 'tbProximityPdForm',
            'id' => 'tbProximityPdForm',
            'size' => '19',
            'placeholder' => 'Bliznina PD',
            'disabled' => 'true'
        );

        $data['form_proximity_od_sph_form'] = array(
            'name' => 'tbProximityOdSphForm',
            'id' => 'tbProximityOdSphForm',
            'size' => '3',
            'placeholder' => '0.00',
            'disabled' => 'true'
        );

        $data['form_proximity_od_cyl_form'] = array(
            'name' => 'tbProximityOdCylForm',
            'id' => 'tbProximityOdCylForm',
            'size' => '3',
            'placeholder' => '0.00',
            'disabled' => 'true'
        );

        $data['form_proximity_od_ax_form'] = array(
            'name' => 'tbProximityOdAxForm',
            'id' => 'tbProximityOdAxForm',
            'size' => '3',
            'placeholder' => '0',
            'disabled' => 'true'
        );

        $data['form_proximity_os_sph_form'] = array(
            'name' => 'tbProximityOsSphForm',
            'id' => 'tbProximityOsSphForm',
            'size' => '3',
            'placeholder' => '0.00',
            'disabled' => 'true'
        );

        $data['form_proximity_os_cyl_form'] = array(
            'name' => 'tbProximityOsCylForm',
            'id' => 'tbProximityOsCylForm',
            'size' => '3',
            'placeholder' => '0.00',
            'disabled' => 'true',
            'onchange' => 'addForm()'
        );

        $data['form_proximity_os_ax_form'] = array(
            'name' => 'tbProximityOsAxForm',
            'id' => 'tbProximityOsAxForm',
            'size' => '3',
            'placeholder' => '0',
            'disabled' => 'true',
            'onchange' => 'addForm()'
        );

        $this->load->model('producers_lenses_model');
        $order_by_name_producer_lens = "name_producer_lens ASC";
        $this->producers_lenses_model->order_by = $order_by_name_producer_lens;
        $producersLensOption = $this->producers_lenses_model->select();
        $optionForProducerLens = array('0' => 'Izaberi...');
        foreach ($producersLensOption as $s):
            $optionForProducerLens += array($s->id_producer_lens => $s->name_producer_lens);
        endforeach;
        @$selected = $this->session->userdata('lens_producer_form');
        $data['ddlProducerLens'] = form_dropdown('ddlProducerLens', $optionForProducerLens, $selected, array('style' => 'width: 220px', 'required' => TRUE, 'id' => 'ddlProducerLens', 'disabled' => 'true'));

        $this->load->model('material_lenses_model');
        $order_by_name_material_lens = "name_material_lens ASC";
        $this->material_lenses_model->order_by = $order_by_name_material_lens;
        $materialLensOption = $this->material_lenses_model->select();
        $optionForMaterialLens = array('' => 'Izaberi...');
        foreach ($materialLensOption as $s):
            $optionForMaterialLens += array($s->id_material_lens => $s->name_material_lens);
        endforeach;
        @$selected = $this->session->userdata('lens_material_form');
        $data['ddlMaterialLens'] = form_dropdown('ddlMaterialLens', $optionForMaterialLens, $selected, array('style' => 'width: 220px', 'required' => TRUE, 'disabled' => 'true'));


        $this->load->model('type_lenses_model');
        $order_by_name_type_lens = "order_type_lens ASC";
        $this->type_lenses_model->order_by = $order_by_name_type_lens;
        $typeLensOption = $this->type_lenses_model->select();
        $optionForTypeLens = array('' => 'Izaberi...');
        foreach ($typeLensOption as $s):
            $optionForTypeLens += array($s->id_type_lens => $s->name_type_lens);
        endforeach;
        @$selected = $this->session->userdata('lens_type_form');
        $data['ddlTypeLens'] = form_dropdown('ddlTypeLens', $optionForTypeLens, $selected, array('style' => 'width: 220px', 'required' => TRUE, 'disabled' => 'true'));


        $this->load->model('designs_lenses_model');
        $order_by_name_design_lens = "name_design_lens ASC";
        $this->designs_lenses_model->order_by = $order_by_name_design_lens;
        $designLensOption = $this->designs_lenses_model->select();
        $optionForDesignLens = array('' => 'Izaberi...');
        foreach ($designLensOption as $s):
            $optionForDesignLens += array($s->id_design_lens => $s->name_design_lens);
        endforeach;
        @$selected = $this->session->userdata('lens_designe_form');
        $data['ddlDesignLens'] = form_dropdown('ddlDesignLens', $optionForDesignLens, $selected, array('style' => 'width: 220px', 'required' => TRUE, 'disabled' => 'true'));


        $this->load->model('index_lenses_model');
        $order_by_name_index_lens = "name_index_lens ASC";
        $this->index_lenses_model->order_by = $order_by_name_index_lens;
        $indexLensOption = $this->index_lenses_model->select();
        $optionForIndexLens = array('' => 'Izaberi...');
        foreach ($indexLensOption as $s):
            $optionForIndexLens += array($s->id_index_lens => $s->name_index_lens);
        endforeach;
        @$selected = $this->session->userdata('lens_index_form');
        $data['ddlIndexLens'] = form_dropdown('ddlIndexLens', $optionForIndexLens, $selected, array('style' => 'width: 220px', 'required' => TRUE, 'disabled' => 'true'));

        $this->load->model('name_lenses_model');
        $order_by_name_name_lens = "name_name_lens ASC";
        $this->name_lenses_model->order_by = $order_by_name_name_lens;
        $nameLensOption = $this->name_lenses_model->select();
        $optionForNameLens = array('' => 'Izaberi...');
        foreach ($nameLensOption as $s):
            $optionForNameLens += array($s->id_name_lens => $s->name_name_lens);
        endforeach;
        @$selected = $this->session->userdata('lens_name_form');
        $data['ddlNameLens'] = form_dropdown('ddlNameLens', $optionForNameLens, $selected, array('style' => 'width: 220px', 'disabled' => 'true'));


        $this->load->model('finishing_lenses_model');
        $order_by_name_finishing_lens = "name_finishing_lens ASC";
        $this->finishing_lenses_model->order_by = $order_by_name_finishing_lens;
        $finishingLensOption = $this->finishing_lenses_model->select();
        $optionForFinishingLens = array('' => 'Izaberi...');
        foreach ($finishingLensOption as $s):
            $optionForFinishingLens += array($s->id_finishing_lens => $s->name_finishing_lens);
        endforeach;
        @$selected = $this->session->userdata('lens_finishing_form');
        $data['ddlFinishingLens'] = form_dropdown('ddlFinishingLens', $optionForFinishingLens, $selected, array('style' => 'width: 220px', 'required' => TRUE, 'disabled' => 'true'));

        $this->load->model('sph_range_dioptre_lenses_model');
        $sph_range_dioptre_lenses = $this->sph_range_dioptre_lenses_model->select();

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
                @$optionForRangeDioptreLens += array(
                    $s->id_range_dioptre_lens => $min . " / " . $max . " / " . $s->cyl_range_dioptre_lens
                );
            endif;
        endforeach;
        @$selected = $this->session->userdata('lens_range_dioptre_form');
        $data['ddlRangeDioptreLens'] = form_dropdown('ddlRangeDioptreLens', $optionForRangeDioptreLens, $selected, array('style' => 'width: 220px', 'required' => TRUE, 'disabled' => 'true'));

        $this->load->model('diameter_lenses_model');
        $order_by_name_diameter_lens = "name_diameter_lens ASC";
        $this->diameter_lenses_model->order_by = $order_by_name_diameter_lens;
        $diameterLensOption = $this->diameter_lenses_model->select();
        $optionForDiameterLens = array('' => "Izaberi...");
        foreach ($diameterLensOption as $s):
            $optionForDiameterLens += array($s->id_diameter_lens => $s->name_diameter_lens);
        endforeach;

        @$selected = $this->session->userdata('lens_diampeter_form');
        $data['ddlDiameterLens'] = form_dropdown('ddlDiameterLens', $optionForDiameterLens, $selected, array('style' => 'width: 220px', 'required' => TRUE, 'disabled' => 'true'));

        $data['lensPrice'] = array(
            'id' => 'PricePricelistLens',
            'name' => 'PricePricelistLens',
            'style' => 'width: 100px',
            'readonly' => 'true',
            'value' => $this->session->userdata('lens_price_form')
        );
        $data['lensDiscount'] = array(
            'id' => 'tbLensDiscountForm',
            'name' => 'tbLensDiscountForm',
            'style' => 'width: 100px',
            'disabled' => 'true',
            'value' => $this->session->userdata('lens_discount_form')
        );

        $data['taNoteProducer'] = array(
            'id' => 'taNoteProducer',
            'name' => 'taNoteProducer',
            'rows' => '4',
            'cols' => '30',
            'disabled' => 'true',
            'value' => $this->session->userdata('note_order_form'),
            'placeholder' => 'Napomena proizvođaču'
        );

        $this->load->model('sellers_model');
        $order_by_name_seller = "name_seller ASC";
        $this->sellers_model->order_by = $order_by_name_seller;
        $sellerOption = $this->sellers_model->select();
        $optionForSeller = array('0' => 'Izaberi...');
        foreach ($sellerOption as $s):
            $optionForSeller += array($s->id_seller => $s->name_seller);
        endforeach;
        @$selected = $this->session->userdata('id_seller');
        $data['ddlSeller'] = form_dropdown('ddlSeller', $optionForSeller, $selected, array('style' => 'width: 220px', 'required' => TRUE, 'id' => 'ddlSeller', 'disabled' => 'true'));

        $data['form_advance_payment_form'] = array(
            'name' => 'tbAdvancePaymentForm',
            'id' => 'tbAdvancePaymentForm',
            'style' => 'width: 160px',
            'value' => $this->session->userdata('advance_payment_form'),
            'placeholder' => 'Avans',
            'disabled' => 'true'
        );

        $data['form_order_submit'] = array(
            'name' => 'btnOrder',
            'id' => 'btnOrder',
            'value' => 'Poruči',
            'style' => 'width: 80px; font-weight: bold; float: right; padding: 7px; border-radius: 10px',
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



        $data['title'] = "Spisak kartona";

        $view = "sales/NewOrderConfirmForm";
        $this->load_view_admin($view, $data);
    }

    function ddlMaterialLens() {
        $idProducerLens = $this->input->post('idProducerLens');

        $this->load->model('pricelist_lenses_model');
        $where_producer_lens = array(
            'pricelist_lenses.id_producer_lens' => $idProducerLens
        );
        $this->pricelist_lenses_model->where = $where_producer_lens;
        $this->pricelist_lenses_model->group_by = "material_lenses.name_material_lens";
        $order_by_name_material_lens = "name_material_lens ASC";
        $this->pricelist_lenses_model->order_by = $order_by_name_material_lens;
        $materialLensOption = $this->pricelist_lenses_model->select();

        $material_lens = "<option value='0'>Izaberi...</option>";
        foreach ($materialLensOption as $m):
            $material_lens .= "<option value=" . $m->id_material_lens . ">" . $m->name_material_lens . "</option>";
        endforeach;

        echo json_encode($material_lens);
    }

    function ddlTypeLens() {
        $idProducerLens = $this->input->post('idProducerLens');
        $idMaterialLens = $this->input->post('idMaterialLens');

        $this->load->model('pricelist_lenses_model');
        $where_material_lens = array(
            'pricelist_lenses.id_producer_lens' => $idProducerLens,
            'pricelist_lenses.id_material_lens' => $idMaterialLens
        );
        $this->pricelist_lenses_model->where = $where_material_lens;
        $this->pricelist_lenses_model->group_by = "type_lenses.name_type_lens";
        $order_by_name_type_lens = "order_type_lens ASC";
        $this->pricelist_lenses_model->order_by = $order_by_name_type_lens;
        $typeLensOption = $this->pricelist_lenses_model->select();

        $type_lens = "<option value='0'>Izaberi...</option>";
        foreach ($typeLensOption as $t):
            $type_lens .= "<option value=" . $t->id_type_lens . ">" . $t->name_type_lens . "</option>";
        endforeach;

        echo json_encode($type_lens);
    }

    function ddlDesignLens() {
        $idProducerLens = $this->input->post('idProducerLens');
        $idMaterialLens = $this->input->post('idMaterialLens');
        $idTypeLens = $this->input->post('idTypeLens');

        $this->load->model('pricelist_lenses_model');
        $where_type_lens = array(
            'pricelist_lenses.id_producer_lens' => $idProducerLens,
            'pricelist_lenses.id_material_lens' => $idMaterialLens,
            'pricelist_lenses.id_type_lens' => $idTypeLens
        );
        $this->pricelist_lenses_model->where = $where_type_lens;
        $this->pricelist_lenses_model->group_by = "designs_lenses.name_design_lens";
        $order_by_name_design_lens = "name_design_lens ASC";
        $this->pricelist_lenses_model->order_by = $order_by_name_design_lens;
        $designLensOption = $this->pricelist_lenses_model->select();

        $design_lens = "<option value='0'>Izaberi...</option>";
        //$design_lens = "";
        foreach ($designLensOption as $d):
            $design_lens .= "<option value=" . $d->id_design_lens . ">" . $d->name_design_lens . "</option>";
            //$design_lens .= $d->id_design_lens['designs_lenses'];
        endforeach;

        echo json_encode($design_lens);
    }

    function ddlIndexLens() {
        $idProducerLens = $this->input->post('idProducerLens');
        $idMaterialLens = $this->input->post('idMaterialLens');
        $idTypeLens = $this->input->post('idTypeLens');
        $idDesignLens = $this->input->post('idDesignLens');

        $this->load->model('pricelist_lenses_model');
        $where_design_lens = array(
            'pricelist_lenses.id_producer_lens' => $idProducerLens,
            'pricelist_lenses.id_material_lens' => $idMaterialLens,
            'pricelist_lenses.id_type_lens' => $idTypeLens,
            'pricelist_lenses.id_design_lens' => $idDesignLens
        );
        $this->pricelist_lenses_model->where = $where_design_lens;
        $this->pricelist_lenses_model->group_by = "index_lenses.name_index_lens";
        $order_by_name_index_lens = "name_index_lens ASC";
        $this->pricelist_lenses_model->order_by = $order_by_name_index_lens;
        $indexLensOption = $this->pricelist_lenses_model->select();

        $index_lens = "<option value='0'>Izaberi...</option>";
        foreach ($indexLensOption as $i):
            $index_lens .= "<option value=" . $i->id_index_lens . ">" . $i->name_index_lens . "</option>";
        endforeach;

        echo json_encode($index_lens);
    }

    function ddlNameLens() {
        $idProducerLens = $this->input->post('idProducerLens');
        $idMaterialLens = $this->input->post('idMaterialLens');
        $idTypeLens = $this->input->post('idTypeLens');
        $idDesignLens = $this->input->post('idDesignLens');
        $idIndexLens = $this->input->post('idIndexLens');

        $this->load->model('pricelist_lenses_model');
        $where_name_lens = array(
            'pricelist_lenses.id_producer_lens' => $idProducerLens,
            'pricelist_lenses.id_material_lens' => $idMaterialLens,
            'pricelist_lenses.id_type_lens' => $idTypeLens,
            'pricelist_lenses.id_design_lens' => $idDesignLens,
            'pricelist_lenses.id_index_lens' => $idIndexLens
        );
        $this->pricelist_lenses_model->where = $where_name_lens;
        $this->pricelist_lenses_model->group_by = "name_lenses.name_name_lens";
        $order_by_name_name_lens = "name_name_lens ASC";
        $this->pricelist_lenses_model->order_by = $order_by_name_name_lens;
        $nameLensOption = $this->pricelist_lenses_model->select();

        $name_lens = "<option value='0'>Izaberi...</option>";
        foreach ($nameLensOption as $n):
            $name_lens .= "<option value=" . $n->id_name_lens . ">" . $n->name_name_lens . "</option>";
        endforeach;

        echo json_encode($name_lens);
    }

    function ddlFinishingLens() {
        $idProducerLens = $this->input->post('idProducerLens');
        $idMaterialLens = $this->input->post('idMaterialLens');
        $idTypeLens = $this->input->post('idTypeLens');
        $idDesignLens = $this->input->post('idDesignLens');
        $idIndexLens = $this->input->post('idIndexLens');
        $idNameLens = $this->input->post('idNameLens');

        $this->load->model('pricelist_lenses_model');
        $where_design_lens = array(
            'pricelist_lenses.id_producer_lens' => $idProducerLens,
            'pricelist_lenses.id_material_lens' => $idMaterialLens,
            'pricelist_lenses.id_type_lens' => $idTypeLens,
            'pricelist_lenses.id_design_lens' => $idDesignLens,
            'pricelist_lenses.id_index_lens' => $idIndexLens,
            'pricelist_lenses.id_name_lens' => $idNameLens
        );
        $this->pricelist_lenses_model->where = $where_design_lens;
        $this->pricelist_lenses_model->group_by = "finishing_lenses.name_finishing_lens";
        $order_by_name_finishing_lens = "name_finishing_lens ASC";
        $this->pricelist_lenses_model->order_by = $order_by_name_finishing_lens;
        $finishingLensOption = $this->pricelist_lenses_model->select();

        $finishing_lens = "<option value='0'>Izaberi...</option>";
        foreach ($finishingLensOption as $f):
            $finishing_lens .= "<option value=" . $f->id_finishing_lens . ">" . $f->name_finishing_lens . "</option>";
        endforeach;

        echo json_encode($finishing_lens);
    }

    function ddlRangeDioptreLens() {
        $idProducerLens = $this->input->post('idProducerLens');
        $idMaterialLens = $this->input->post('idMaterialLens');
        $idTypeLens = $this->input->post('idTypeLens');
        $idDesignLens = $this->input->post('idDesignLens');
        $idIndexLens = $this->input->post('idIndexLens');
        $idNameLens = $this->input->post('idNameLens');
        $idFinishingLens = $this->input->post('idFinishingLens');

        $this->load->model('pricelist_lenses_model');
        $where_range_dioptre_lens = array(
            'pricelist_lenses.id_producer_lens' => $idProducerLens,
            'pricelist_lenses.id_material_lens' => $idMaterialLens,
            'pricelist_lenses.id_type_lens' => $idTypeLens,
            'pricelist_lenses.id_design_lens' => $idDesignLens,
            'pricelist_lenses.id_index_lens' => $idIndexLens,
            'pricelist_lenses.id_name_lens' => $idNameLens,
            'pricelist_lenses.id_finishing_lens' => $idFinishingLens
        );
        $this->pricelist_lenses_model->where = $where_range_dioptre_lens;
//        $this->pricelist_lenses_model->group_by = "ranges_dioptre_lenses._lens";
        $order_by_id_range_dioptre_lens = "min.value_sph_range_dioptre_lens, max.value_sph_range_dioptre_lens, cyl_range_dioptre_lens, add_range_dioptre_lens ASC";
        $this->pricelist_lenses_model->order_by = $order_by_id_range_dioptre_lens;
        $rangeDioptreLensOption = $this->pricelist_lenses_model->select();

        $range_dioptre_lens = "<option value='0'>Izaberi...</option>";
        $this->load->model('sph_range_dioptre_lenses_model');
        $sph_range_dioptre_lenses = $this->sph_range_dioptre_lenses_model->select();
//        $data['sph_range_dioptre_lenses'] = $sph_range_dioptre_lenses;
        foreach ($rangeDioptreLensOption as $r):
            foreach ($sph_range_dioptre_lenses as $l):
                if ($r->id_max_sph_range_dioptre_lens == $l->id_sph_range_dioptre_lens):
                    $max = $l->value_sph_range_dioptre_lens;
                endif;
            endforeach;
            foreach ($sph_range_dioptre_lenses as $l):
                if ($r->id_min_sph_range_dioptre_lens == $l->id_sph_range_dioptre_lens):
                    $min = $l->value_sph_range_dioptre_lens;
                endif;
            endforeach;
            if ($r->add_range_dioptre_lens != null):
                $range_dioptre_lens .= "<option value=" . $r->id_range_dioptre_lens . ">" . $min . " / " . $max . " / " . $r->cyl_range_dioptre_lens . " / " . $r->add_range_dioptre_lens . "</option>";
            else:
                $range_dioptre_lens .= "<option value=" . $r->id_range_dioptre_lens . ">" . $min . " / " . $max . " / " . $r->cyl_range_dioptre_lens . "</option>";
            endif;
        endforeach;

        echo json_encode($range_dioptre_lens);
    }

    function ddlDiameterLens() {
        $idProducerLens = $this->input->post('idProducerLens');
        $idMaterialLens = $this->input->post('idMaterialLens');
        $idTypeLens = $this->input->post('idTypeLens');
        $idDesignLens = $this->input->post('idDesignLens');
        $idIndexLens = $this->input->post('idIndexLens');
        $idNameLens = $this->input->post('idNameLens');
        $idFinishingLens = $this->input->post('idFinishingLens');
        $idRangeDioptreLens = $this->input->post('idRangeDioptreLens');

        $this->load->model('pricelist_lenses_model');
        $where_design_lens = array(
            'pricelist_lenses.id_producer_lens' => $idProducerLens,
            'pricelist_lenses.id_material_lens' => $idMaterialLens,
            'pricelist_lenses.id_type_lens' => $idTypeLens,
            'pricelist_lenses.id_design_lens' => $idDesignLens,
            'pricelist_lenses.id_index_lens' => $idIndexLens,
            'pricelist_lenses.id_name_lens' => $idNameLens,
            'pricelist_lenses.id_finishing_lens' => $idFinishingLens,
            'pricelist_lenses.id_range_dioptre_lens' => $idRangeDioptreLens
        );
        $this->pricelist_lenses_model->where = $where_design_lens;
//        $this->pricelist_lenses_model->group_by = "ranges_dioptre_lenses._lens";
        $order_by_name_diameter_lens = "name_diameter_lens ASC";
        $this->pricelist_lenses_model->order_by = $order_by_name_diameter_lens;
        $diameterLensOption = $this->pricelist_lenses_model->select();

        $diameter_lens = "<option value='0'>Izaberi...</option>";
//        if($diameterLensOption != null):
//            $diameter_lens = "<option value='0'>Ima</option>";
//        else:
//            $diameter_lens = "<option value='0'>Nema</option>";
//        endif;
//        //$diameter_lens = "<option value='0'>Pozdrav</option>";
        foreach ($diameterLensOption as $d):
            //$diameter_lens .= "poZdrav";
            $diameter_lens .= "<option value=" . $d->id_diameter_lens . ">" . $d->name_diameter_lens . "</option>";
        endforeach;

        echo json_encode($diameter_lens);
    }

    function PricePricelistLens() {
        $idProducerLens = $this->input->post('idProducerLens');
        $idMaterialLens = $this->input->post('idMaterialLens');
        $idTypeLens = $this->input->post('idTypeLens');
        $idDesignLens = $this->input->post('idDesignLens');
        $idIndexLens = $this->input->post('idIndexLens');
        $idNameLens = $this->input->post('idNameLens');
        $idFinishingLens = $this->input->post('idFinishingLens');
        $idRangeDioptreLens = $this->input->post('idRangeDioptreLens');
        $idDiameterLens = $this->input->post('idDiameterLens');
        $idRightLeft = $this->input->post('idRightLeft');
        $lensDiscountForm = $this->input->post('lensDiscountForm');

        $this->load->model('pricelist_lenses_model');
        $this->load->model('exchange_model');
//        $default_amount_exchange
        $where_default_amount_exchange = array(
            'exchange.default_amount_exchange' => 1
        );

        $where_design_lens = array(
            'pricelist_lenses.id_producer_lens' => $idProducerLens,
            'pricelist_lenses.id_material_lens' => $idMaterialLens,
            'pricelist_lenses.id_type_lens' => $idTypeLens,
            'pricelist_lenses.id_design_lens' => $idDesignLens,
            'pricelist_lenses.id_index_lens' => $idIndexLens,
            'pricelist_lenses.id_name_lens' => $idNameLens,
            'pricelist_lenses.id_finishing_lens' => $idFinishingLens,
            'pricelist_lenses.id_range_dioptre_lens' => $idRangeDioptreLens,
            'pricelist_lenses.id_diameter_lens' => $idDiameterLens
        );
        $this->exchange_model->where = $where_default_amount_exchange;
        $this->pricelist_lenses_model->where = $where_design_lens;
//        $this->pricelist_lenses_model->group_by = "pricelist_lenses.name_finishing_lens";
//        $order_by_name_finishing_lens = "name_finishing_lens ASC";
//        $this->pricelist_lenses_model->order_by = $order_by_name_finishing_lens;
        $defaultAmountExchange = $this->exchange_model->select();
        $pricePricelistLens = $this->pricelist_lenses_model->select();
        $price_pricelist_lens = "";
        if ($idRightLeft == 3):
            $price_pricelist_lens .= round(($pricePricelistLens[0]->price_pricelist_lens * 2) * $defaultAmountExchange[0]->amount_exchange, -2);
        else:
            $price_pricelist_lens .= round($pricePricelistLens[0]->price_pricelist_lens * $defaultAmountExchange[0]->amount_exchange, -2);
        endif;
//        echo json_encode($idRightLeft);
        echo json_encode($price_pricelist_lens);
    }

    function DiscountPricePricelistLens() {
        $idProducerLens = $this->input->post('idProducerLens');
        $idMaterialLens = $this->input->post('idMaterialLens');
        $idTypeLens = $this->input->post('idTypeLens');
        $idDesignLens = $this->input->post('idDesignLens');
        $idIndexLens = $this->input->post('idIndexLens');
        $idNameLens = $this->input->post('idNameLens');
        $idFinishingLens = $this->input->post('idFinishingLens');
        $idRightLeft = $this->input->post('idRightLeft');
        $lensDiscountForm = $this->input->post('lensDiscountForm');

        $this->load->model('pricelist_lenses_model');
        $this->load->model('exchange_model');
//        $default_amount_exchange
        $where_default_amount_exchange = array(
            'exchange.default_amount_exchange' => 1
        );

        $where_design_lens = array(
            'pricelist_lenses.id_producer_lens' => $idProducerLens,
            'pricelist_lenses.id_material_lens' => $idMaterialLens,
            'pricelist_lenses.id_type_lens' => $idTypeLens,
            'pricelist_lenses.id_design_lens' => $idDesignLens,
            'pricelist_lenses.id_index_lens' => $idIndexLens,
            'pricelist_lenses.id_name_lens' => $idNameLens,
            'pricelist_lenses.id_finishing_lens' => $idFinishingLens
        );
        $this->exchange_model->where = $where_default_amount_exchange;
        $this->pricelist_lenses_model->where = $where_design_lens;
//        $this->pricelist_lenses_model->group_by = "pricelist_lenses.name_finishing_lens";
//        $order_by_name_finishing_lens = "name_finishing_lens ASC";
//        $this->pricelist_lenses_model->order_by = $order_by_name_finishing_lens;
        $defaultAmountExchange = $this->exchange_model->select();
        $pricePricelistLens = $this->pricelist_lenses_model->select();
        $price_pricelist_lens = "";
        if ($idRightLeft == 3):
            $sum = round(($pricePricelistLens[0]->price_pricelist_lens * 2) * $defaultAmountExchange[0]->amount_exchange, -2);
            $price_pricelist_lens .= round($sum - ($sum / 100) * $lensDiscountForm, -2);
        else:
            $sum = round($pricePricelistLens[0]->price_pricelist_lens * $defaultAmountExchange[0]->amount_exchange, -2);
            $price_pricelist_lens .= round($sum - ($sum / 100) * $lensDiscountForm, -2);
        endif;
        echo json_encode($price_pricelist_lens);
    }

    function LensDiscountForm() {
        $idProducerLens = $this->input->post('idProducerLens');
        $idMaterialLens = $this->input->post('idMaterialLens');
        $idTypeLens = $this->input->post('idTypeLens');
        $idDesignLens = $this->input->post('idDesignLens');
        $idIndexLens = $this->input->post('idIndexLens');
        $idNameLens = $this->input->post('idNameLens');
        $idFinishingLens = $this->input->post('idFinishingLens');
        $idRightLeft = $this->input->post('idRightLeft');
        $lensDiscountForm = $this->input->post('lensDiscountForm');

        $this->load->model('pricelist_lenses_model');
        $this->load->model('exchange_model');
//        $default_amount_exchange
        $where_default_amount_exchange = array(
            'exchange.default_amount_exchange' => 1
        );

        $where_design_lens = array(
            'pricelist_lenses.id_producer_lens' => $idProducerLens,
            'pricelist_lenses.id_material_lens' => $idMaterialLens,
            'pricelist_lenses.id_type_lens' => $idTypeLens,
            'pricelist_lenses.id_design_lens' => $idDesignLens,
            'pricelist_lenses.id_index_lens' => $idIndexLens,
            'pricelist_lenses.id_name_lens' => $idNameLens,
            'pricelist_lenses.id_finishing_lens' => $idFinishingLens
        );
        $this->exchange_model->where = $where_default_amount_exchange;
        $this->pricelist_lenses_model->where = $where_design_lens;
//        $this->pricelist_lenses_model->group_by = "pricelist_lenses.name_finishing_lens";
//        $order_by_name_finishing_lens = "name_finishing_lens ASC";
//        $this->pricelist_lenses_model->order_by = $order_by_name_finishing_lens;
        $defaultAmountExchange = $this->exchange_model->select();
        $pricePricelistLens = $this->pricelist_lenses_model->select();

        $price_pricelist_lens = "";
        if ($idRightLeft == 3):
            $sum = round(($pricePricelistLens[0]->price_pricelist_lens * 2) * $defaultAmountExchange[0]->amount_exchange, -2);
            $price_pricelist_lens .= number_format(round($sum - ($sum / 100) * $lensDiscountForm, -2), 0, ',', '.') . " RSD";
        else:
            $sum = round($pricePricelistLens[0]->price_pricelist_lens * $defaultAmountExchange[0]->amount_exchange, -2);
            $price_pricelist_lens .= number_format(round($sum - ($sum / 100) * $lensDiscountForm, -2), 0, ',', '.') . " RSD";
        endif;


        echo json_encode($price_pricelist_lens);
    }

    public function searchNewOrder() {
        if (isset($_POST['searchNewOrder'])):
            $search = strtolower(trim($this->input->post('searchNewOrder')));

            if ($search == ""):
                $id_search = $this->customers_model->select();

                $data = '<table style="width: 98%; border: 1px solid; padding: 10px; margin: 60px 10px;">';
                $data .= '<tr class="border3">';
                $data .= '<th width="20%" class="border text-alignC">Ime i prezime</th>';
                $data .= '<th width="20%" class="border text-alignC">Broj Telefona</th>';
                $data .= '<th width="20%" class="border text-alignC">Email</th>';
                $data .= '<th width="20%" class="border text-alignC">Napomena</th>';
                $data .= '<th width="20%" class="border text-alignC">Akcija</th>';
                $data .= '</tr>';
                foreach ($id_search as $c):
                    if ($c->id_customer != 1):
                        $data .= '<tr class="border text-alignC">';
                        $data .= '<td class="border">' . $c->name_customer . '</td>';
                        $data .= '<td class="border">' . $c->phone_customer . '</td>';
                        $data .= '<td class="border">' . $c->email_customer . '</td>';
                        $data .= '<td class="border">' . $c->note_customer . '</td>';
                        $data .= '<td>';
                        $data .= '<a href="' . base_url() . 'administration/sales/NewOrder/newOrder/' . $c->id_customer . '">Poručivanje</a>';
                        $data .= '</td>';
                        $data .= '</tr>';
                    endif;
                endforeach;
                $data .= '</table>';
                echo json_encode($data);
            else:

                $this->load->library('form_validation');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                $this->form_validation->set_rules('searchNewOrder', 'pretragu', 'xss_clean|required');

                $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');

                if ($this->form_validation->run()):

                    $this->customers_model->where = "name_customer LIKE '%" . $search . "%'";
                    $order_by_date = "name_customer ASC";
                    $id_search = $this->customers_model->select();

                    if ($id_search == true):

                        $data = '<table style="width: 98%; border: 1px solid; padding: 10px; margin: 60px 10px;">';
                        $data .= '<tr class="border3">';
                        $data .= '<th width="20%" class="border text-alignC">Ime i prezime</th>';
                        $data .= '<th width="20%" class="border text-alignC">Broj Telefona</th>';
                        $data .= '<th width="20%" class="border text-alignC">Email</th>';
                        $data .= '<th width="20%" class="border text-alignC">Napomena</th>';
                        $data .= '<th width="20%" class="border text-alignC">Akcija</th>';
                        $data .= '</tr>';
                        foreach ($id_search as $c):
                            $data .= '<tr class="border text-alignC">';
                            $data .= '<td class="border">' . $c->name_customer . '</td>';
                            $data .= '<td class="border">' . $c->phone_customer . '</td>';
                            $data .= '<td class="border">' . $c->email_customer . '</td>';
                            $data .= '<td class="border">' . $c->note_customer . '</td>';
                            $data .= '<td>';
                            $data .= '<a href="' . base_url() . 'administration/sales/NewOrder/newOrder/' . $c->id_customer . '">Poručivanje</a>';
                            $data .= '</td>';
                            $data .= '</tr>';
                        endforeach;
                        $data .= '</table>';
                        echo json_encode($data);
                    else:
                        $data = '<table style="width: 98%; padding: 10px; margin: 10px 10px;">';
                        $data .= '<tr class="border3">';
                        $data .= '<th class="border text-alignC">Ime i prezime</th>';
                        $data .= '<th class="border text-alignC">Broj Telefona</th>';
                        $data .= '<th class="border text-alignC">Email</th>';
                        $data .= '<th class="border text-alignC">Napomena</th>';
                        $data .= '<th class="border text-alignC">Akcija</th>';
                        $data .= '</tr>';
                        $data .= '</table>';
                        $data .= "<div class='alert text-alignC alert-danger' style='width: 600px; text-align: center; margin: 0px auto'>Ne postoji kupac pod imenom " . $search . " koji ste pokušali da pretražite!</div>";
                        echo json_encode($data);
                    endif;
                else:
                endif;
            endif;
        endif;
    }

    public function number($str) {
//        $regExp = "/^\d{1,}$/";
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('number', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbNumberForm').css('border', '1px solid red');"
                        . "$('.tbNumberFormCss').css('display', 'block');"
                        . "$('.tbNumberFormCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('number', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#tbNumberForm').css('border', '1px solid red');"
                    . "$('.tbNumberFormCss').css('display', 'block');"
                    . "$('.tbNumberFormCss').text('* Polje za {field} mora biti uneto!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        endif;
    }

    public function name($str) {
//        $regExp = "/^\d{1,}$/";
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('name', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbNameCustomer').css('border', '1px solid red');"
                        . "$('.tbNameCustomerCss').css('display', 'block');"
                        . "$('.tbNameCustomerCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('name', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#tbNameCustomer').css('border', '1px solid red');"
                    . "$('.tbNameCustomerCss').css('display', 'block');"
                    . "$('.tbNameCustomerCss').text('* Polje za {field} mora biti uneto!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        endif;
    }

    public function year($str) {
        $regExp = "/^\d{4}$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('year', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbYearCustomer').css('border', '1px solid red');"
                        . "$('.tbYearCustomerCss').css('display', 'block');"
                        . "$('.tbYearCustomerCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }

    public function phone($str) {
        $regExp = "/^[+]?\d{11,12}$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('phone', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbPhoneCustomer').css('border', '1px solid red');"
                        . "$('.tbPhoneCustomerCss').css('display', 'block');"
                        . "$('.tbPhoneCustomerCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }

    public function email($str) {
        $regExp = "/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('email', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbEmailCustomer').css('border', '1px solid red');"
                        . "$('.tbEmailCustomerCss').css('display', 'block');"
                        . "$('.tbEmailCustomerCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }

    public function note($str) {
//        $regExp = "/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/";
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('note', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#taNoteCustomer').css('border', '1px solid red');"
                        . "$('.taNoteCustomerCss').css('display', 'block');"
                        . "$('.taNoteCustomerCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }

    public function pd($str) {
        $regExp = "/^\d{2}$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('pd', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbDistancePdForm').css('border', '1px solid red');"
                        . "$('.tbPdFormCss').css('display', 'block');"
                        . "$('.tbPdFormCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('pd', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#tbDistancePdForm').css('border', '1px solid red');"
                    . "$('.tbPdFormCss').css('display', 'block');"
                    . "$('.tbPdFormCss').text('* Polje za {field} mora biti uneto!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        endif;
    }

    public function od_sph($str) {
        $regExp = "/^[+]?\d{1,}\.(00|25|50|75)|[-]\d{1,}\.(00|25|50|75)$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('od_sph', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbDistanceOdSphForm').css('border', '1px solid red');"
                        . "$('.tbDistanceOdSphFormCss').css('display', 'block');"
                        . "$('.tbDistanceOdSphFormCss').html('{field}  U polje nije uneta ispravno diotrija!<br>Iznos diotrije mora biti zaokružen na 0.25.'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('od_sph', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#tbDistanceOdSphForm').css('border', '1px solid red');"
                    . "$('.tbDistanceOdSphFormCss').css('display', 'block');"
                    . "$('.tbDistanceOdSphFormCss').html('{field} * Polje mora biti uneto!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        endif;
    }

    public function od_cyl($str) {
        $regExp = "/^[+]?\d{1,}\.(00|25|50|75)|[-]\d{1,}\.(00|25|50|75)$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('od_cyl', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbDistanceOdCylForm').css('border', '1px solid red');"
                        . "$('.tbDistanceOdCylFormCss').css('display', 'block');"
                        . "$('.tbDistanceOdCylFormCss').html('{field}  U polje nije uneta ispravno diotrija!<br>Iznos diotrije mora biti zaokružen na 0.25.'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }

    public function od_ax($str) {
        $regExp = "/^(0?[0-9]{1,2}|1[0-7][0-9]|180)$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('od_ax', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbDistanceOdAxForm').css('border', '1px solid red');"
                        . "$('.tbDistanceOdAxFormCss').css('display', 'block');"
                        . "$('.tbDistanceOdAxFormCss').html('{field}  U polje nije uneta ispravno diotrija!<br>Iznos diotrije mora biti zaokružen na 0.25.'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }

    public function os_sph($str) {
        $regExp = "/^[+]?\d{1,}\.(00|25|50|75)|[-]\d{1,}\.(00|25|50|75)$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('os_sph', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbDistanceOsSphForm').css('border', '1px solid red');"
                        . "$('.tbDistanceOsSphFormCss').css('display', 'block');"
                        . "$('.tbDistanceOsSphFormCss').html('{field}  U polje nije uneta ispravno diotrija!<br>Iznos diotrije mora biti zaokružen na 0.25.'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('os_sph', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#tbDistanceOsSphForm').css('border', '1px solid red');"
                    . "$('.tbDistanceOsSphFormCss').css('display', 'block');"
                    . "$('.tbDistanceOsSphFormCss').html('{field} * Polje mora biti uneto!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        endif;
    }

    public function os_cyl($str) {
        $regExp = "/^[+]?\d{1,}\.(00|25|50|75)|[-]\d{1,}\.(00|25|50|75)$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('os_cyl', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbDistanceOsCylForm').css('border', '1px solid red');"
                        . "$('.tbDistanceOsCylFormCss').css('display', 'block');"
                        . "$('.tbDistanceOsCylFormCss').html('{field}  U polje nije uneta ispravno diotrija!<br>Iznos diotrije mora biti zaokružen na 0.25.'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }

    public function os_ax($str) {
        $regExp = "/^(0?[0-9]{1,2}|1[0-7][0-9]|180)$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('os_ax', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbDistanceOsAxForm').css('border', '1px solid red');"
                        . "$('.tbDistanceOsAxFormCss').css('display', 'block');"
                        . "$('.tbDistanceOsAxFormCss').html('{field}  U polje nije uneta ispravno diotrija!<br>Iznos diotrije mora biti zaokružen na 0.25.'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }

    public function add($str) {
        $regExp = "/^[+]?\d{1,}\.(00|25|50|75)$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if ($str < 0):
                $this->form_validation->set_message('add', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbAddForm').css('border', '1px solid red');"
                        . "$('.tbAddFormCss').css('display', 'block');"
                        . "$('.tbAddFormCss').html('{field}  U polje nije uneta ispravno diotrija!<br>Iznos mora biti pozitivan.'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                if (!preg_match($regExp, $str)):
                    $this->form_validation->set_message('add', "<script>"
                            . "$(document).ready(function () { "
                            . "$('#tbAddForm').css('border', '1px solid red');"
                            . "$('.tbAddFormCss').css('display', 'block');"
                            . "$('.tbAddFormCss').html('{field}  U polje nije uneta ispravno diotrija!<br>Iznos diotrije mora biti zaokružen na 0.25.'); "
                            . "});"
                            . "</script>");
                    return FALSE;
                else:
                    return TRUE;
                endif;
            endif;
        endif;
    }

    public function distance_proximity($str) {
        $regExp = "/^(0?[0-9]{1,2}|1[0-7][0-9]|180)$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != 1 && $str != 2):
            $this->form_validation->set_message('distance_proximity', "<script>"
                    . "$(document).ready(function () { "
//                    . "$('#chbDistanceProximityTable').css('border', '1px solid red');"
                    . "$('.chbDistanceProximityCss').css('display', 'block');"
                    . "$('.chbDistanceProximityCss').html('Odgovor na pitanje šta poručuješ je obavezno!'); "
                    . "});"
                    . "</script>");
            return FALSE;

        else:
            return TRUE;
        endif;
    }

    public function frame($str) {
//        $regExp = "/^[+]?\d{1,}\.(00|25|50|75)|[-]\d{1,}\.(00|25|50|75)$/";
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('frame', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbFrameForm').css('border', '1px solid red');"
                        . "$('.tbFrameFormCss').css('display', 'block');"
                        . "$('.tbFrameFormCss').html('U polje za {field} nisu uneti ispravno podaci! '); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }

    public function frame_price($str) {
        $regExp = "/^\d{1,}$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('frame_price', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbFramePriceForm').css('border', '1px solid red');"
                        . "$('.tbFramePriceFormCss').css('display', 'block');"
                        . "$('.tbFramePriceFormCss').html('U polje za {field} nisu uneti ispravno podaci! '); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }

    public function frame_discount($str) {
        $regExp = "/^([0-9]|[1-9][0-9]|100)$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('frame_discount', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbFrameDiscountForm').css('border', '1px solid red');"
                        . "$('.tbFrameDiscountFormCss').css('display', 'block');"
                        . "$('.tbFrameDiscountFormCss').html('U polje za {field} nisu uneti ispravno podaci! '); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }

    function producer($str) {
        if ($str == 0):
            $this->form_validation->set_message('producer', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#ddlProducerLens').css('border', '1px solid red');"
                    . "$('.ddlProducerLensCss').css('display', 'block');"
                    . "$('.ddlProducerLensCss').text('* Polje za {field} mora biti uzabrano!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        else:
            return TRUE;
        endif;
    }

    function material($str) {
        if ($str == 0):
            $this->form_validation->set_message('material', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#ddlMaterialLens').css('border', '1px solid red');"
                    . "$('.ddlMaterialLensCss').css('display', 'block');"
                    . "$('.ddlMaterialLensCss').text('* Polje za {field} mora biti uzabrano!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        else:
            return TRUE;
        endif;
    }

    function type($str) {
        if ($str == 0):
            $this->form_validation->set_message('type', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#ddlTypeLens').css('border', '1px solid red');"
                    . "$('.ddlTypeLensCss').css('display', 'block');"
                    . "$('.ddlTypeLensCss').text('* Polje za {field} mora biti uzabrano!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        else:
            return TRUE;
        endif;
    }

    function design($str) {
        if ($str == 0):
            $this->form_validation->set_message('design', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#ddlDesignLens').css('border', '1px solid red');"
                    . "$('.ddlDesignLensCss').css('display', 'block');"
                    . "$('.ddlDesignLensCss').text('* Polje za {field} mora biti uzabrano!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        else:
            return TRUE;
        endif;
    }

    function indexLens($str) {
        if ($str == 0):
            $this->form_validation->set_message('indexLens', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#ddlIndexLens').css('border', '1px solid red');"
                    . "$('.ddlIndexLensCss').css('display', 'block');"
                    . "$('.ddlIndexLensCss').text('* Polje za {field} mora biti uzabrano!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        else:
            return TRUE;
        endif;
    }

    function namelens($str) {
        if ($str == 0):
            $this->form_validation->set_message('namelens', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#ddlNameLens').css('border', '1px solid red');"
                    . "$('.ddlNameLensCss').css('display', 'block');"
                    . "$('.ddlNameLensCss').text('* Polje za {field} mora biti uzabrano!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        else:
            return TRUE;
        endif;
    }

    function finishing($str) {
        if ($str == 0):
            $this->form_validation->set_message('finishing', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#ddlFinishingLens').css('border', '1px solid red');"
                    . "$('.ddlFinishingLensCss').css('display', 'block');"
                    . "$('.ddlFinishingLensCss').text('* Polje za {field} mora biti uzabrano!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        else:
            return TRUE;
        endif;
    }

    function range($str) {
        if ($str == 0):
            $this->form_validation->set_message('range', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#ddlRangeDioptreLens').css('border', '1px solid red');"
                    . "$('.ddlRangeDioptreLensCss').css('display', 'block');"
                    . "$('.ddlRangeDioptreLensCss').text('* Polje za {field} mora biti uzabrano!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        else:
            return TRUE;
        endif;
    }

    function diameter($str) {
        if ($str == 0):
            $this->form_validation->set_message('diameter', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#ddlDiameterLens').css('border', '1px solid red');"
                    . "$('.ddlDiameterLensCss').css('display', 'block');"
                    . "$('.ddlDiameterLensCss').text('* Polje za {field} mora biti uzabrano!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        else:
            return TRUE;
        endif;
    }

    function lens_discount($str) {
        $regExp = "/^([0-9]|[1-9][0-9]|100)$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('lens_discount', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbLensDiscountForm').css('border', '1px solid red');"
                        . "$('.tbLensDiscountFormCss').css('display', 'block');"
                        . "$('.tbLensDiscountFormCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }

    function note_producer($str) {
//                $regExp = "/^([0-9]|[1-9][0-9]|100)$/";
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('note_producer', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#taNoteProducer').css('border', '1px solid red');"
                        . "$('.taNoteProducerCss').css('display', 'block');"
                        . "$('.taNoteProducerCss').text('U polje za {field} nisu uneti ispravno podaci!'); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }

    function seller($str) {
        if ($str == 0):
            $this->form_validation->set_message('seller', "<script>"
                    . "$(document).ready(function () { "
                    . "$('#ddlSeller').css('border', '1px solid red');"
                    . "$('.ddlSellerCss').css('display', 'block');"
                    . "$('.ddlSellerCss').text('* Polje za {field} mora biti uzabrano!'); "
                    . "});"
                    . "</script>");
            return FALSE;
        else:
            return TRUE;
        endif;
    }

    function advance($str) {
        $regExp = "/^\d{1,}$/";
//        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('advance', "<script>"
                        . "$(document).ready(function () { "
                        . "$('#tbAdvancePaymentForm').css('border', '1px solid red');"
                        . "$('.tbAdvancePaymentFormCss').css('display', 'block');"
                        . "$('.tbAdvancePaymentFormCss').html('U polje za {field} nisu uneti ispravno podaci! '); "
                        . "});"
                        . "</script>");
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }

}
