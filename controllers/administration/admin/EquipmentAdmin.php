<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EquipmentAdmin
 *
 * @author Veljko
 */
class EquipmentAdmin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('equipment_model');
        $this->load->model('company_information_model');
        $this->load->model('users_model');
    }

    function index($id = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        if ($id != null):

            $where_equipment = array(
                'id_equipment' => $id
            );

            $this->equipment_model->where = $where_equipment;

            $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
            if ($is_post):
                $button = $this->input->post('btnEdit');
                if ($button != ""):
                    $submenu_equipment = trim($this->input->post('tbSubmenuEquipment'));
                    $title_equipment = trim($this->input->post('taTitleEquipment'));
                    $text_equipment = trim($this->input->post('taTextEquipment'));
                    $link_equipment = trim($this->input->post('tbLinkEquipment'));
                    $pic_equipment = $_FILES['fPicEquipment'];

                    $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
                    $regExpLink = "/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/";

                    $greske = array();
                    if (isset($submenu_equipment) && $submenu_equipment != ""):
                        if (!preg_match($regExp, $submenu_equipment)):
                            $greske[] = "U polje za pod naslov nisu uneti ispravno podaci!";
                        endif;
                    else:
                        $greske[] = "Polje za pod naslov mora biti uneto!";
                    endif;
                    if (isset($title_equipment) && $title_equipment != ""):
                        if (!preg_match($regExp, $title_equipment)):
                            $greske[] = "U polje za naslov nisu uneti ispravno podaci!";
                        endif;
                    else:
                        $greske[] = "Polje za naslov mora biti uneto!";
                    endif;
                    if (isset($text_equipment) && $text_equipment != ""):
                        if (!preg_match($regExp, $text_equipment)):
                            $greske[] = "U polje za tekst nisu uneti ispravno podaci!";
                        endif;
                    else:
                        $greske[] = "Polje za tekst mora biti uneto!";
                    endif;
                    if (isset($link_equipment) && $link_equipment != ""):
                        if (!preg_match($regExpLink, $link_equipment)):
                            $greske[] = "U polje za link nisu uneti ispravno podaci!";
                        endif;
                    else:
                        $greske[] = "Polje za link mora biti uneto!";
                    endif;

                    if (count($greske) == 0):
                        $file_name = "";

                        if ($pic_equipment['name'] != null):

                            $config['upload_path'] = 'images/equipment/';
                            $config['allowed_types'] = 'gif|jpg|png|JPG|GIF|PNG';
                            $config['max_size'] = '4096';
                            $config['max_width'] = '150';
                            $config['max_height'] = '188';

                            if ($_FILES['fPicEquipment']['type'] == 'image/jpeg'):
                                $picName = '.jpg';
                            elseif ($_FILES['fPicEquipment']['type'] == 'image/JPEG'):
                                $picName = '.JPG';
                            elseif ($_FILES['fPicEquipment']['type'] == 'image/png'):
                                $picName = '.png';
                            elseif ($_FILES['fPicEquipment']['type'] == 'image/PNG'):
                                $picName = '.PNG';
                            elseif ($_FILES['fPicEquipment']['type'] == 'image/gif'):
                                $picName = '.gif';
                            elseif ($_FILES['fPicEquipment']['type'] == 'image/GIF'):
                                $picName = '.GIF';
                            endif;
                            $file_name .= time() . $picName;

                            $config['file_name'] = $file_name;

                            $this->load->library('upload', $config);
                            $this->load->library('form_validation');

                            if (!$this->upload->do_upload('fPicEquipment')):
                                $this->session->set_flashdata("message", "<div class='alert alert-danger ispis'>Izmena opreme nije uspelo!<br> Proverite da li je uneta slika odgovarajucih dimenzija!<br>Maximalna visina 188px, maximalna širina 150px i veličina 4MB.</div>");
                                redirect('administration/admin/EquipmentAdmin');
                            else:
                                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                                $this->form_validation->set_rules('tbSubmenuEquipment', 'pod meni opreme', 'xss_clean|required');
                                $this->form_validation->set_rules('taTitleEquipment', 'naslov opreme', 'xss_clean|required');
                                $this->form_validation->set_rules('taTextEquipment', 'tekst opreme', 'xss_clean|required');
                                $this->form_validation->set_rules('tbLinkEquipment', 'link opreme', 'xss_clean|required');

                                $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');

                                if ($this->form_validation->run()):

                                    $result_old_pic = $this->equipment_model->select();

                                    //unos podataka u model
                                    $this->equipment_model->submenu_equipment = $submenu_equipment;
                                    $this->equipment_model->title_equipment = $title_equipment;
                                    $this->equipment_model->text_equipment = $text_equipment;
                                    $this->equipment_model->link_equipment = $link_equipment;
                                    $this->equipment_model->pic_equipment = $file_name;

                                    $result_equipment = $this->equipment_model->update();

                                    if (file_exists('images/equipment/' . $result_old_pic[0]->pic_equipment)):
                                        unlink('images/equipment/' . $result_old_pic[0]->pic_equipment);
                                    endif;

                                    if ($result_equipment != ""):
                                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili opremu!</div>");
                                        redirect('administration/admin/EquipmentAdmin');
                                    else:
                                        if (file_exists('images/equipment/' . @$file_name)):
                                            unlink('images/equipment/' . @$file_name);
                                        endif;
                                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Izmena opreme nije uspela!</div>");
                                        redirect('administration/admin/EquipmentAdmin');
                                    endif;
                                else:
                                    if (file_exists('images/equipment/' . @$file_name)):
                                        unlink('images/equipment/' . @$file_name);
                                    endif;
                                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                                    redirect('administration/admin/EquipmentAdmin');
                                endif;
                            endif;
                        else:
                            $this->load->library('form_validation');

                            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                            $this->form_validation->set_rules('tbSubmenuEquipment', 'pod meni opreme', 'xss_clean|required');
                            $this->form_validation->set_rules('taTitleEquipment', 'naslov opreme', 'xss_clean|required');
                            $this->form_validation->set_rules('taTextEquipment', 'tekst opreme', 'xss_clean|required');
                            $this->form_validation->set_rules('tbLinkEquipment', 'link opreme', 'xss_clean|required');

                            $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');

                            if ($this->form_validation->run()):

                                //unos podataka u model
                                $this->equipment_model->submenu_equipment = $submenu_equipment;
                                $this->equipment_model->title_equipment = $title_equipment;
                                $this->equipment_model->text_equipment = $text_equipment;
                                $this->equipment_model->link_equipment = $link_equipment;

                                $result_equipment = $this->equipment_model->update();

                                if ($result_equipment != ""):
                                    $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili opremu!</div>");
                                    redirect('administration/admin/EquipmentAdmin');
                                else:
                                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Izmena opreme nije uspela!</div>");
                                    redirect('administration/admin/EquipmentAdmin');
                                endif;
                            else:
                                $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                                redirect('administration/admin/EquipmentAdmin');
                            endif;
                        endif;
                    else:
                        $ispisGreske = "Greške: <br>";
                        foreach ($greske as $g):
                            $ispisGreske .= $g . "<br>";
                        endforeach;
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>" . $ispisGreske . "<br>Ponovite ceo unos!</div>");
                        redirect('administration/admin/EquipmentAdmin');
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

        $data['equipment'] = $this->equipment_model->select();
        $data['count_equipment'] = $this->equipment_model->count_all();

        $data['company'] = $this->company_information_model->select();

        $data['title'] = "Oprema administacija sajta";
        $view = "administration/EquipmentAdmin";
        $this->load_view_admin($view, $data);
    }

    function insert() {

        $count_equipment = $this->equipment_model->count_all();

        if ($count_equipment > 6):

            if (empty($this->session->userdata('id_role'))):
                redirect('Home');
            endif;

            $id_role = $this->session->userdata('id_role');

            $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
            if ($is_post):

                $button = $this->input->post('btnAdd');
                if ($button != ""):
                    $submenu_equipment = trim($this->input->post('tbSubmenuEquipment'));
                    $title_equipment = trim($this->input->post('taTitleEquipment'));
                    $text_equipment = trim($this->input->post('taTextEquipment'));
                    $link_equipment = trim($this->input->post('tbLinkEquipment'));
                    $pic_equipment = $_FILES['fPicEquipment'];

                    $file_name = "";
                    if ($pic_equipment["name"] != ""):
                        $config['upload_path'] = 'images/equipment/';
                        $config['allowed_types'] = 'gif|jpg|png|JPG|GIF|PNG';
                        $config['max_size'] = '4096';
                        $config['max_width'] = '150';
                        $config['max_height'] = '188';

                        if ($_FILES['fPicEquipment']['type'] == 'image/jpeg'):
                            $picName = '.jpg';
                        elseif ($_FILES['fPicEquipment']['type'] == 'image/JPEG'):
                            $picName = '.JPG';
                        elseif ($_FILES['fPicEquipment']['type'] == 'image/png'):
                            $picName = '.png';
                        elseif ($_FILES['fPicEquipment']['type'] == 'image/PNG'):
                            $picName = '.PNG';
                        elseif ($_FILES['fPicEquipment']['type'] == 'image/gif'):
                            $picName = '.gif';
                        elseif ($_FILES['fPicEquipment']['type'] == 'image/GIF'):
                            $picName = '.GIF';
                        endif;
                        $file_name .= time() . @$picName;

                        $config['file_name'] = $file_name;

                        $this->load->library('upload', $config);
                        $this->load->library('form_validation');

                        if (!$this->upload->do_upload('fPicEquipment')):
                            $data_insert['submenu_equipment'] = $submenu_equipment;
                            $data_insert['title_equipment'] = $title_equipment;
                            $data_insert['text_equipment'] = $text_equipment;
                            $data_insert['link_equipment'] = $link_equipment;
                            $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Dodavanje opreme nije uspelo!<br> Proverite da li je uneta slika odgovarajućih dimenzija!<br>Maximalna visina 188px, maximalna širina 150px i veličina 4MB.</div>");
                        else:
                            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                            $this->form_validation->set_rules('tbSubmenuEquipment', 'pod meni opreme', 'xss_clean|required|callback_submenu_title_text');
                            $this->form_validation->set_rules('taTitleEquipment', 'naslov opreme', 'xss_clean|required|callback_submenu_title_text');
                            $this->form_validation->set_rules('taTextEquipment', 'tekst opreme', 'xss_clean|required|callback_submenu_title_text');
                            $this->form_validation->set_rules('tbLinkEquipment', 'link opreme', 'xss_clean|required|callback_link');

                            $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');

                            if ($this->form_validation->run()):

                                //unos podataka u model
                                $this->equipment_model->submenu_equipment = $submenu_equipment;
                                $this->equipment_model->title_equipment = $title_equipment;
                                $this->equipment_model->text_equipment = $text_equipment;
                                $this->equipment_model->link_equipment = $link_equipment;
                                $this->equipment_model->pic_equipment = $file_name;

                                $result_equipment = $this->equipment_model->insert();

                                if ($result_equipment != ""):
                                    $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste dodali opremu!</div>");
                                else:
                                    if (file_exists('images/equipment/' . @$file_name)):
                                        unlink('images/equipment/' . @$file_name);
                                    endif;
                                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Dodavanje nove opreme nije uspelo!</div>");
                                endif;
                            else:
                                $data_insert['submenu_equipment'] = $submenu_equipment;
                                $data_insert['title_equipment'] = $title_equipment;
                                $data_insert['text_equipment'] = $text_equipment;
                                $data_insert['link_equipment'] = $link_equipment;

                                if (file_exists('images/equipment/' . @$file_name)):
                                    unlink('images/equipment/' . @$file_name);
                                endif;

                                $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                            endif;
                        endif;
                    else:
                        $data_insert['submenu_equipment'] = $submenu_equipment;
                        $data_insert['title_equipment'] = $title_equipment;
                        $data_insert['text_equipment'] = $text_equipment;
                        $data_insert['link_equipment'] = $link_equipment;

                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Slika je obavezna!</div>");
                    endif;
                endif;
            endif;
            $data['form_equipment'] = array(
                'class' => 'form-group'
            );
            $data['form_submenu_equipment'] = array(
                'class' => 'size tbSubmenuEquipment',
                'name' => 'tbSubmenuEquipment',
                'value' => isset($data_insert['submenu_equipment']) ? $data_insert['submenu_equipment'] : '',
                'id' => 'tbSubmenuEquipment',
                'placeholder' => 'Pod naslov',
                'data-id' => 0
            );
            $data['form_title_equipment'] = array(
                'class' => 'size_textarea taTitleEquipment',
                'name' => 'taTitleEquipment',
                'value' => isset($data_insert['title_equipment']) ? $data_insert['title_equipment'] : '',
                'id' => 'taTitleEquipment',
                'placeholder' => 'Naslov',
                'data-id' => 0
            );
            $data['form_text_equipment'] = array(
                'class' => 'size_textarea taTextEquipment',
                'name' => 'taTextEquipment',
                'value' => isset($data_insert['text_equipment']) ? $data_insert['text_equipment'] : '',
                'id' => 'taTextEquipment',
                'placeholder' => 'Tekst',
                'data-id' => 0
            );
            $data['form_link_equipment'] = array(
                'class' => 'size tbLinkEquipment',
                'name' => 'tbLinkEquipment',
                'value' => isset($data_insert['link_equipment']) ? $data_insert['link_equipment'] : '',
                'id' => 'tbLinkEquipment',
                'placeholder' => 'www.link.com',
                'data-id' => 0
            );
            $data['form_pic_equipment'] = array(
                'class' => 'size fPicEquipment',
                'name' => 'fPicEquipment',
                'id' => 'fPicEquipment',
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

            $data['slider'] = $this->equipment_model->select();

            $data['company'] = $this->company_information_model->select();

            $data['title'] = "Slajder administacija sajta";
            $view = "administration/add-edit/AddEditEquipmentAdmin";
            $this->load_view_admin($view, $data);

        else:
            redirect('administration/admin/EquipmentAdmin');
        endif;
    }

    public function delete($id = null) {
        if ($id != null):
            $where_id_equipment = "equipment.id_equipment = " . $id;
            $this->equipment_model->where = $where_id_equipment;
            $result_id_equipment = $this->equipment_model->select();
            $path = 'images/equipment/' . $result_id_equipment[0]->pic_equipment;

            if ($result_id_equipment != null):
                if (file_exists($path)):
                    $this->equipment_model->id_equipment = $id;
                    $result = $this->equipment_model->delete();
                    if ($result == true):
                        unlink($path);
                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste obrisali opremu!</div>");
                        redirect('administration/admin/EquipmentAdmin', 'refresh');
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Niste obrisali opremu!</div>");
                        redirect('administration/admin/EquipmentAdmin', 'refresh');
                    endif;
                else:
                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Niste obrisali opremu!</div>");
                    redirect('administration/admin/EquipmentAdmin', 'refresh');
                endif;
            endif;
        else:
            echo "<script language='JavaScript'> window.location='./'</script>";
        endif;
    }

    public function submenu_title_text($str) {
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
//        $regExp = "/^[+]?\d{11,12}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('submenu_title_text', 'U polje za {field} nisu uneti ispravno podaci!');
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('submenu_title_text', 'Polje za {field} mora biti uneto!');
            return FALSE;
        endif;
    }
    
    public function link($str) {
        $regExp = "/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/";
//        $regExp = "/^[+]?\d{11,12}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('link', 'U polje za {field} nisu uneti ispravno podaci!');
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('link', 'Polje za {field} mora biti uneto!');
            return FALSE;
        endif;
    }
}
