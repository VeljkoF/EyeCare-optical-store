<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SliderAdmin
 *
 * @author Veljko
 */
class SliderAdmin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('company_information_model');
        $this->load->model('slider_model');
        $this->load->model('users_model');
    }

    function index($id = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;


        if ($id != null):

            $where_slider = array(
                'id_slider' => $id
            );

            $this->slider_model->where = $where_slider;

            $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
            if ($is_post):
                $button = $this->input->post('btnEdit');
                if ($button != ""):
                    if ($this->input->post('tbTitleSlider')):
                        $title_slider = trim($this->input->post('tbTitleSlider'));
                    endif;
                    if ($this->input->post('taTextSlider')):
                        $text_slider = trim($this->input->post('taTextSlider'));
                    endif;
                    $name_pic_slider = trim($this->input->post('tbPicNameSlider'));
                    $pic_slider = $_FILES['fPicSlider'];

                    $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
//                    $regExp = "/^[+]?\d{11,12}$/";

                    $greske = array();
                    if (isset($title_slider) && $title_slider != ""):
                        if (!preg_match($regExp, $title_slider)):
                            $greske[] = "U polje za naslov nisu uneti ispravno podaci!";
                        endif;
                    endif;
                    if (isset($text_slider) && $text_slider != ""):
                        if (!preg_match($regExp, $text_slider)):
                            $greske[] = "U polje za tekst nisu uneti ispravno podaci!";
                        endif;
                    endif;
                    if (isset($name_pic_slider) && $name_pic_slider != ""):
                        if (!preg_match($regExp, $name_pic_slider)):
                            $greske[] = "U polje za ime slike nisu uneti ispravno podaci!";
                        endif;
                    else:
                        $greske[] = "Polje za ime slike mora biti uneto!";
                    endif;
                    if (count($greske) == 0):
                        $file_name = "";
                        if ($pic_slider['name'] != ""):

                            $config['upload_path'] = 'images/slider/';
                            $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
                            $config['max_size'] = '4096';
                            $config['max_width'] = '2000';
                            $config['max_height'] = '2000';

                            if ($_FILES['fPicSlider']['type'] == 'image/jpeg'):
                                $picName = '.jpg';
                            elseif ($_FILES['fPicSlider']['type'] == 'image/JPEG'):
                                $picName = '.JPG';
                            elseif ($_FILES['fPicSlider']['type'] == 'image/png'):
                                $picName = '.png';
                            elseif ($_FILES['fPicSlider']['type'] == 'image/PNG'):
                                $picName = '.PNG';
                            elseif ($_FILES['fPicSlider']['type'] == 'image/gif'):
                                $picName = '.gif';
                            elseif ($_FILES['fPicSlider']['type'] == 'image/GIF'):
                                $picName = '.GIF';
                            endif;
                            $file_name .= time() . $picName;

                            $config['file_name'] = $file_name;

                            $this->load->library('upload', $config);
                            $this->load->library('form_validation');

                            if (!$this->upload->do_upload('fPicSlider')):
                                $this->session->set_flashdata("message", "<div class='alert alert-danger ispis'>Dodavanje slajdera nije uspelo!<br> Proverite da li je uneta slika odgovarajućih dimenzija!<br>Maximalna visina 2000px, maximalna širina 2000px i veličina 4MB.</div>");
                                redirect('administration/admin/SliderAdmin');
                            else:
                                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                                $this->form_validation->set_rules('tbTitleSlider', 'naslova slajdera', 'xss_clean');
                                $this->form_validation->set_rules('taTextSlider', 'tekst slajdera', 'xss_clean');
                                $this->form_validation->set_rules('tbPicNameSlider', 'ime slike', 'xss_clean|required');

                                $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');

                                if ($this->form_validation->run()):

                                    $result_old_pic = $this->slider_model->select();

                                    //unos podataka u model
                                    $this->slider_model->title_slider = @$title_slider;
                                    $this->slider_model->text_slider = @$text_slider;
                                    $this->slider_model->name_pic_slider = $name_pic_slider;
                                    $this->slider_model->pic_slider = $file_name;

                                    $result_slider = $this->slider_model->update();

                                    if (file_exists('images/slider/' . $result_old_pic[0]->pic_slider)):
                                        unlink('images/slider/' . $result_old_pic[0]->pic_slider);
                                    endif;

                                    if ($result_slider != ""):
                                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili slajder!</div>");
                                        redirect('administration/admin/SliderAdmin');
                                    else:
                                        if (file_exists('images/slider/' . @$file_name)):
                                            unlink('images/slider/' . @$file_name);
                                        endif;
                                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Izmena slajdera nije uspelo!</div>");
                                        redirect('administration/admin/SliderAdmin');
                                    endif;
                                else:
                                    if (file_exists('images/slider/' . @$file_name)):
                                        unlink('images/slider/' . @$file_name);
                                    endif;
                                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                                    redirect('administration/admin/SliderAdmin');
                                endif;
                            endif;
                        else:
                            $this->load->library('form_validation');

                            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                            $this->form_validation->set_rules('tbTitleSlider', 'naslova slajdera', 'xss_clean');
                            $this->form_validation->set_rules('taTextSlider', 'tekst slajdera', 'xss_clean');
                            $this->form_validation->set_rules('tbPicNameSlider', 'ime slike', 'xss_clean|required');

                            $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');

                            if ($this->form_validation->run()):

                                //unos podataka u model
                                $this->slider_model->title_slider = @$title_slider;
                                $this->slider_model->text_slider = @$text_slider;
                                $this->slider_model->name_pic_slider = $name_pic_slider;

                                $result_slider = $this->slider_model->update();

                                if ($result_slider != ""):
                                    $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili slajder!</div>");
                                    redirect('administration/admin/SliderAdmin');
                                else:
                                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Izmena slajdera nije uspelo!</div>");
                                    redirect('administration/admin/SliderAdmin');
                                endif;
                            else:
                                $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                                redirect('administration/admin/SliderAdmin');
                            endif;
                        endif;
                    else:
                        $ispisGreske = "Greške: <br>";
                        foreach ($greske as $g):
                            $ispisGreske .= $g . "<br>";
                        endforeach;
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>" . $ispisGreske . "<br>Ponovite ceo unos!</div>");
                        redirect('administration/admin/SliderAdmin');
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

        $data['slider'] = $this->slider_model->select();

        $data['company'] = $this->company_information_model->select();

        $data['title'] = "Slajder administacija sajta";
        $view = "administration/SliderAdmin";
        $this->load_view_admin($view, $data);
    }

    function insert() {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $id_role = $this->session->userdata('id_role');

        $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
        if ($is_post):

            $button = $this->input->post('btnAdd');
            if ($button != ""):
                if ($this->input->post('tbTitleSlider')):
                    $title_slider = trim($this->input->post('tbTitleSlider'));
                endif;
                if ($this->input->post('taTextSlider')):
                    $text_slider = trim($this->input->post('taTextSlider'));
                endif;
                $name_pic_slider = trim($this->input->post('tbPicNameSlider'));
                $pic_slider = $_FILES['fPicSlider'];

                $file_name = "";
                if ($pic_slider["name"] != ""):

                    $config['upload_path'] = 'images/slider/';
                    $config['allowed_types'] = 'gif|jpg|png|JPG|GIF|PNG';
                    $config['max_size'] = '4096';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    //list($namePic, $type) = explode('.', $pic_slider);
                    if ($_FILES['fPicSlider']['type'] == 'image/jpeg'):
                        $picName = '.jpg';
                    elseif ($_FILES['fPicSlider']['type'] == 'image/JPEG'):
                        $picName = '.JPG';
                    elseif ($_FILES['fPicSlider']['type'] == 'image/png'):
                        $picName = '.png';
                    elseif ($_FILES['fPicSlider']['type'] == 'image/PNG'):
                        $picName = '.PNG';
                    elseif ($_FILES['fPicSlider']['type'] == 'image/gif'):
                        $picName = '.gif';
                    elseif ($_FILES['fPicSlider']['type'] == 'image/GIF'):
                        $picName = '.GIF';
                    endif;
                    $file_name .= time() . @$picName;

                    $config['file_name'] = $file_name;

                    $this->load->library('upload', $config);
                    $this->load->library('form_validation');

                    if (!$this->upload->do_upload('fPicSlider')):
                        $data_insert['title_slider'] = @$title_slider;
                        $data_insert['text_slider'] = @$text_slider;
                        $data_insert['name_pic_slider'] = $name_pic_slider;
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Dodavanje slajdera nije uspelo!<br> Proverite da li je uneta slika odgovarajućih dimenzija!<br>Maximalna visina 2000px, maximalna širina 2000px i veličina 4MB.</div>");
                    else:
                        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                        $this->form_validation->set_rules('tbTitleSlider', 'naslova slajdera', 'trim|xss_clean|callback_title_text');
                        $this->form_validation->set_rules('taTextSlider', 'tekst slajdera', 'trim|xss_clean|callback_title_and_text');
                        $this->form_validation->set_rules('tbPicNameSlider', 'ime slike', 'trim|xss_clean|required|callback_title_pic');

                        $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');

                        if ($this->form_validation->run()):

                            //unos podataka u model
                            $this->slider_model->title_slider = @$title_slider;
                            $this->slider_model->text_slider = @$text_slider;
                            $this->slider_model->name_pic_slider = $name_pic_slider;
                            $this->slider_model->pic_slider = $file_name;

                            $result_slider = $this->slider_model->insert();

                            if ($result_slider != ""):
                                $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste dodali novi slajder!</div>");
                            else:
                                if (file_exists('images/slider/' . @$file_name)):
                                    unlink('images/slider/' . @$file_name);
                                endif;
                                $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Dodavanje novog slajdera nije uspelo!</div>");
                            endif;
                        else:
                            $data_insert['title_slider'] = @$title_slider;
                            $data_insert['text_slider'] = @$text_slider;
                            $data_insert['name_pic_slider'] = $name_pic_slider;

                            if (file_exists('images/slider/' . @$file_name)):
                                unlink('images/slider/' . @$file_name);
                            endif;

                            $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                        endif;
                    endif;
                else:
                    $data_insert['title_slider'] = @$title_slider;
                    $data_insert['text_slider'] = @$text_slider;
                    $data_insert['name_pic_slider'] = $name_pic_slider;

                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Slika je obavezna!</div>");
                endif;
            endif;
        endif;
        $data['form_slider'] = array(
            'class' => 'form-group'
        );
        $data['form_title_slider'] = array(
            'class' => 'size tbTitleSlider',
            'name' => 'tbTitleSlider',
            'value' => isset($data_insert['title_slider']) ? $data_insert['title_slider'] : '',
            'id' => 'tbTitleSlider',
            'placeholder' => 'Naslov',
            'data-id' => 0
        );
        $data['form_text_slider'] = array(
            'class' => 'size_textarea taTextSlider',
            'name' => 'taTextSlider',
            'value' => isset($data_insert['text_slider']) ? $data_insert['text_slider'] : '',
            'id' => 'taTextSlider',
            'placeholder' => 'Tekst',
            'data-id' => 0
        );
        $data['form_name_pic_slider'] = array(
            'class' => 'size tbPicNameSlider',
            'name' => 'tbPicNameSlider',
            'value' => isset($data_insert['name_pic_slider']) ? $data_insert['name_pic_slider'] : '',
            'id' => 'tbPicNameSlider',
            'placeholder' => 'Ime slike',
            'data-id' => 0
        );
        $data['form_pic_slider'] = array(
            'class' => 'size fPicSlider',
            'name' => 'fPicSlider',
            'id' => 'fPicSlider',
            'data-id' => 0
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

        $data['slider'] = $this->slider_model->select();

        $data['company'] = $this->company_information_model->select();

        $data['title'] = "Slajder administacija sajta";
        $view = "administration/add-edit/AddEditSliderAdmin";
        $this->load_view_admin($view, $data);
    }

    public function delete($id = null) {
        if ($id != null):
            $where_id_slider = "slider.id_slider = " . $id;
            $this->slider_model->where = $where_id_slider;
            $result_id_slider = $this->slider_model->select();
            $path = 'images/slider/' . $result_id_slider[0]->pic_slider;

            if ($result_id_slider != null):
                if (file_exists($path)):
                    $this->slider_model->id_slider = $id;
                    $result = $this->slider_model->delete();
                    if ($result == true && file_exists($path)):
                        unlink($path) or die('failed deleting: ' . $path);
                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste obrisali sliku slajdera!</div>");
                        redirect('administration/admin/SliderAdmin', 'refresh');
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Niste obrisali sliku slajdera!</div>");
                        redirect('administration/admin/SliderAdmin', 'refresh');
                    endif;
                else:
                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Niste obrisali sliku slajdera!</div>");
                    redirect('administration/admin/SliderAdmin', 'refresh');
                endif;
            endif;

        else:
            echo "<script language='JavaScript'> window.location='./'</script>";
        endif;
    }

    public function title_text($str) {
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
//        $regExp = "/^[+]?\d{11,12}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('title_text', 'U polje za {field} nisu uneti ispravno podaci!');
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }
    
    public function title_and_text($str) {
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
//        $regExp = "/^[+]?\d{11,12}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('title_and_text', 'U polje za {field} nisu uneti ispravno podaci!');
                return FALSE;
            else:
                return TRUE;
            endif;
        endif;
    }

    public function title_pic($str) {
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
//        $regExp = "/^[+]?\d{11,12}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('title_pic', 'U polje za {field} nisu uneti ispravno podaci!');
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('title_pic', 'Polje za {field} mora biti uneto!');
            return FALSE;
        endif;
    }

}
