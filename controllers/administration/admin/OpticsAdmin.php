<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OpticsAdmin
 *
 * @author Veljko
 */
class OpticsAdmin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('company_information_model');
        $this->load->model('text_site_model');
        $this->load->model('list_site_model');
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

        $data['text'] = $this->text_site_model->select();

        $data['list'] = $this->list_site_model->select();

        $data['company'] = $this->company_information_model->select();

        $data['title'] = "Optika administacija sajta";
        $view = "administration/OpticsAdmin";
        $this->load_view_admin($view, $data);
    }

    function edit($id = null) {
        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $id_role = $this->session->userdata('id_role');

        if ($id != null):

            $where_text_site = array(
                'id_text_site' => $id
            );
            $data['id_text'] = $id;

            $this->text_site_model->where = $where_text_site;
            $text = $this->text_site_model->select();

            $data['text'] = $text;

            $data['form_text_site'] = array(
                'class' => 'form',
                'accept-charset' => 'utf-8',
                'method' => 'POST',
                'style' => 'margin: 60px 0px 60px 0px'
            );

            $data['form_title_text_site'] = array(
                'name' => 'tbTitleTextSite',
                'id' => 'tbTitleTextSite',
                'value' => $text[0]->title_text_site,
                'placeholder' => 'Naslov',
                'style' => 'width: 220px',
                'required' => TRUE
            );

            $data['form_text_text_site_1'] = array(
                'class' => 'size_textarea',
                'name' => 'taTextTextSite1',
                'id' => 'taTextTextSite1',
                'value' => $text[0]->text_text_site_1,
                'placeholder' => 'Tekst'
            );

            $data['form_text_text_site_2'] = array(
                'class' => 'size_textarea',
                'name' => 'taTextTextSite2',
                'id' => 'taTextTextSite2',
                'value' => $text[0]->text_text_site_2,
                'placeholder' => 'Nasov liste'
            );
            if ($text[0]->pic_text_site != null):
                $data['form_img'] = array(
                    'src' => "images/" . $text[0]->pic_text_site,
                    'alt' => $text[0]->title_text_site,
                    'style' => 'width: 200px',
                    'title' => $text[0]->title_text_site
                );
            endif;

            $data['form_pic_text_site'] = array(
                'class' => 'size',
                'name' => 'fPicTextSite',
                'id' => 'fPicTextSite'
            );

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
                    if ($this->input->post('tbTitleTextSite')):
                        $title_text_site = trim($this->input->post('tbTitleTextSite'));
                    endif;
                    if ($this->input->post('taTextTextSite1')):
                        $text_text_site_1 = trim($this->input->post('taTextTextSite1'));
                    endif;
                    if ($this->input->post('taTextTextSite2')):
                        $text_text_site_2 = trim($this->input->post('taTextTextSite2'));
                    endif;
                    $pic_text_site = $_FILES['fPicTextSite']['name'];
                    $pic_text_site2 = $_FILES['fPicTextSite'];

                    $this->load->library('form_validation');

                    if ($pic_text_site != ""):

                        $config['upload_path'] = 'images/';
                        $config['allowed_types'] = 'gif|jpg|png|JPG|GIF|PNG';
                        $config['max_size'] = '4096';
                        $config['max_width'] = '800';
                        $config['max_height'] = '550';

                        if ($_FILES['fPicTextSite']['type'] == 'image/jpeg'):
                            $picName = '.jpg';
                        elseif ($_FILES['fPicTextSite']['type'] == 'image/JPEG'):
                            $picName = '.JPG';
                        elseif ($_FILES['fPicTextSite']['type'] == 'image/png'):
                            $picName = '.png';
                        elseif ($_FILES['fPicTextSite']['type'] == 'image/PNG'):
                            $picName = '.PNG';
                        elseif ($_FILES['fPicTextSite']['type'] == 'image/gif'):
                            $picName = '.gif';
                        elseif ($_FILES['fPicTextSite']['type'] == 'image/GIF'):
                            $picName = '.GIF';
                        endif;
                        $file_name = time() . $picName;

                        $config['file_name'] = $file_name;

                        $this->load->library('upload', $config);


                        if (!$this->upload->do_upload('fPicTextSite')):
                            $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Izmena teksta za optiku nije uspelo!<br> Proverite da li je uneta slika odgovarajućih dimenzija!<br>Maximalna visina 550px, maximalna širina 800px i veličina 4MB.</div>");
                            $data_insert['title_text_site'] = $title_text_site;
                            $data_insert['text_text_site_1'] = $text_text_site_1;
                            $data_insert['text_text_site_2'] = $text_text_site_2;
                        else:
                            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                            $this->form_validation->set_rules('tbTitleTextSite', 'naslov dela za optiku', 'trim|xss_clean|callback_title');
                            $this->form_validation->set_rules('taTextTextSite1', 'prvi deo teksta za optiku', 'trim|xss_clean|callback_text');
                            $this->form_validation->set_rules('taTextTextSite2', 'drugi deo teksta za optiku', 'trim|xss_clean|callback_text');

                            $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');

                            if ($this->form_validation->run()):

                                //unos podataka u model
                                $this->text_site_model->title_text_site = $title_text_site;
                                $this->text_site_model->text_text_site_1 = $text_text_site_1;
                                $this->text_site_model->text_text_site_2 = $text_text_site_2;
                                $this->text_site_model->pic_text_site = $file_name;

                                $result_text_site = $this->text_site_model->update();

                                if ($result_text_site == true):
                                    $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili deo teksta za optiku!</div>");
                                    redirect('administration/admin/OpticsAdmin');
                                else:
                                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Izmena dela teksta za optiku nije uspelo!</div>");
                                endif;
                                $data_insert['title_text_site'] = $title_text_site;
                                $data_insert['text_text_site_1'] = $text_text_site_1;
                                $data_insert['text_text_site_2'] = $text_text_site_2;
                            else:
                                $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                                $data_insert['title_text_site'] = $title_text_site;
                                $data_insert['text_text_site_1'] = $text_text_site_1;
                                $data_insert['text_text_site_2'] = $text_text_site_2;
                            endif;
                        endif;
                    else:
                        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                        $this->form_validation->set_rules('tbTitleTextSite', 'naslov dela za optiku', 'trim|xss_clean|callback_title');
                        $this->form_validation->set_rules('taTextTextSite1', 'prvi deo teksta za optiku', 'trim|xss_clean|callback_text');
                        $this->form_validation->set_rules('taTextTextSite2', 'drugi deo teksta za optiku', 'trim|xss_clean|callback_text');

                        $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');

                        if ($this->form_validation->run()):

                            //unos podataka u model
                            $this->text_site_model->title_text_site = $title_text_site;
                            $this->text_site_model->text_text_site_1 = $text_text_site_1;
                            $this->text_site_model->text_text_site_2 = $text_text_site_2;

                            $result_text_site = $this->text_site_model->update();

                            if ($result_text_site == true):
                                $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili deo teksta za optiku!</div>");
                                redirect('administration/admin/OpticsAdmin');
                            else:
                                $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Izmena dela teksta za optiku nije uspelo!</div>");
                            endif;
                            $data_insert['title_text_site'] = $title_text_site;
                            $data_insert['text_text_site_1'] = @$text_text_site_1;
                            $data_insert['text_text_site_2'] = @$text_text_site_2;
                        else:
                            $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                            $data_insert['title_text_site'] = $title_text_site;
                            $data_insert['text_text_site_1'] = @$text_text_site_1;
                            $data_insert['text_text_site_2'] = @$text_text_site_2;
                        endif;
                    endif;

                    $data['form_text_site'] = array(
                        'class' => 'form',
                        'accept-charset' => 'utf-8',
                        'method' => 'POST',
                        'style' => 'margin: 60px 0px 60px 0px'
                    );

                    $data['form_title_text_site'] = array(
                        'name' => 'tbTitleTextSite',
                        'id' => 'tbTitleTextSite',
                        'value' => isset($data_insert['title_text_site']) ? $data_insert['title_text_site'] : '',
                        'placeholder' => 'Naslov',
                        'required' => TRUE
                    );

                    $data['form_text_text_site_1'] = array(
                        'class' => 'size_textarea',
                        'name' => 'taTextTextSite1',
                        'id' => 'taTextTextSite1',
                        'value' => isset($data_insert['text_text_site_1']) ? $data_insert['text_text_site_1'] : '',
                        'placeholder' => 'Tekst',
                        'required' => TRUE
                    );

                    $data['form_text_text_site_2'] = array(
                        'class' => 'size_textarea',
                        'name' => 'taTextTextSite2',
                        'id' => 'taTextTextSite2',
                        'value' => isset($data_insert['text_text_site_2']) ? $data_insert['text_text_site_2'] : '',
                        'placeholder' => 'Nasov liste',
                        'required' => TRUE
                    );
                    if ($text[0]->pic_text_site != null):
                        $data['form_img'] = array(
                            'src' => "images/" . $text[0]->pic_text_site,
                            'alt' => $text[0]->title_text_site,
                            'style' => 'width: 200px',
                            'title' => $text[0]->title_text_site
                        );
                    endif;

                    $data['form_pic_text_site'] = array(
                        'class' => 'size',
                        'name' => 'fPicTextSite',
                        'id' => 'fPicTextSite'
                    );

                    $data['form_edit_submit'] = array(
                        'name' => 'btnEdit',
                        'id' => 'btnEdit',
                        'value' => 'Izmeni',
                        'style' => 'width: 80px; font-weight: bold; padding: 7px; border-radius: 10px',
                        'class' => 'btn-primary'
                    );
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
        $data['list'] = $this->list_site_model->select();

        $data['company'] = $this->company_information_model->select();

        $data['title'] = "Optika administacija sajta";
        $view = "administration/add-edit/EditOpticsAdmin";
        $this->load_view_admin($view, $data);
    }

    public function deletePic($id = null) {
        if ($id != null):
            $where_id_text_site = "text_site.id_text_site = " . $id;
            $this->text_site_model->where = $where_id_text_site;
            $result_id_text_site = $this->text_site_model->select();
            $path = 'images/' . $result_id_text_site[0]->pic_text_site;

            if ($result_id_text_site != null):
                if (file_exists($path)):
                    $this->text_site_model->title_text_site = $result_id_text_site[0]->title_text_site;
                    $this->text_site_model->text_text_site_1 = $result_id_text_site[0]->text_text_site_1;
                    $this->text_site_model->text_text_site_2 = $result_id_text_site[0]->text_text_site_2;
                    $this->text_site_model->pic_text_site = null;
                    $result = $this->text_site_model->update();
                    if ($result == true):
                        unlink($path);
                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste obrisali sliku sajta!</div>");
                        redirect('administration/admin/OpticsAdmin/edit/' . $id, 'refresh');
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Niste obrisali sliku sajta!</div>");
                        redirect('administration/admin/OpticsAdmin/edit/' . $id, 'refresh');
                    endif;
                else:
                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Niste obrisali opremu!</div>");
                    redirect('administration/admin/OpticsAdmin/edit/' . $id, 'refresh');
                endif;
            endif;
        else:
            echo "<script language='JavaScript'> window.location='./'</script>";
        endif;
    }

    public function title($str) {
        $regTitle = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
//        $regTitle = "/^[+]?\d{11,12}$/";
        if ($str != ""):
            if (!preg_match($regTitle, $str)):
                $this->form_validation->set_message('title', 'U polje za {field} nisu uneti ispravno podaci!');
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('title', 'Polje za {field} mora biti uneto!');
                return FALSE;
        endif;
    }

    public function text($str) {
        $regText = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
//        $regText = "/^[+]?\d{11,12}$/";
        if ($str != ""):
            if (!preg_match($regText, $str)):
                $this->form_validation->set_message('text', 'U polje za {field} nisu uneti ispravno podaci!');
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }

}
