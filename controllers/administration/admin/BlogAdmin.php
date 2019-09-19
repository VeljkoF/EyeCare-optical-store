<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BlogAdmin
 *
 * @author Veljko
 */
class BlogAdmin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('blog_model');
        $this->load->model('company_information_model');
        $this->load->model('users_model');
    }

    function index($id = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $id_role = $this->session->userdata('id_role');

        if ($id != null):

            $where_blog = array(
                'id_blog' => $id
            );

            $this->blog_model->where = $where_blog;

            $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
            if ($is_post):
                $button = $this->input->post('btnEdit');
                if ($button != ""):
                    $title_blog = trim($this->input->post('tbTitleBlog'));
                    $text_blog = trim($this->input->post('taTextBlog'));
                    $date_blog = trim($this->input->post('tbDateBlog'));
                    $pic_blog = $_FILES['fPicBlog'];

                    $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\']{1,}){1,}$/";
//                    $regExp= "/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/";

                    $greske = array();
                    if (isset($title_blog) && $title_blog != ""):
                        if (!preg_match($regExp, $title_blog)):
                            $greske[] = "U polje za naslov nisu uneti ispravno podaci!";
                        endif;
                    else:
                        $greske[] = "Polje za naslov mora biti uneto!";
                    endif;
                    if (isset($text_blog) && $text_blog != ""):
                        if (!preg_match($regExp, $text_blog)):
                            $greske[] = "U polje za tekst nisu uneti ispravno podaci!";
                        endif;
                    else:
                        $greske[] = "Polje za tekst mora biti uneto!";
                    endif;
                    if (!isset($date_blog) && $date_blog == ""):
                        $greske[] = "Polje za datum mora biti uneto!";
                    endif;

                    if (count($greske) == 0):
                        $file_name = "";

                        list($year, $month, $day) = explode('-', $date_blog);
                        //$date['dan'] = $day;
                        $date_form = mktime(00, 00, 00, $month, $day, $year);


                        if ($pic_blog['name'] != ""):
                            $config['upload_path'] = 'images/blog/';
                            $config['allowed_types'] = 'gif|jpg|png|JPG';
                            $config['max_size'] = '4096';
                            $config['max_width'] = '800';
                            $config['max_height'] = '550';

                            if ($_FILES['fPicBlog']['type'] == 'image/jpeg'):
                                $picName = '.jpg';
                            elseif ($_FILES['fPicBlog']['type'] == 'image/JPEG'):
                                $picName = '.JPG';
                            elseif ($_FILES['fPicBlog']['type'] == 'image/png'):
                                $picName = '.png';
                            elseif ($_FILES['fPicBlog']['type'] == 'image/PNG'):
                                $picName = '.PNG';
                            elseif ($_FILES['fPicBlog']['type'] == 'image/gif'):
                                $picName = '.gif';
                            elseif ($_FILES['fPicBlog']['type'] == 'image/GIF'):
                                $picName = '.GIF';
                            endif;
                            $file_name .= time() . $picName;

                            $config['file_name'] = $file_name;

                            $this->load->library('upload', $config);
                            $this->load->library('form_validation');

                            if (!$this->upload->do_upload('fPicBlog')):
                                $this->session->set_flashdata("message", "<div class='alert alert-danger ispis'>Izmena bloga nije uspelo!<br> Proverite da li je uneta slika odgovarajucih dimenzija!<br>Maximalna visina 550px, maximalna širina 800px i veličina 4MB.</div>");
                                redirect('administration/admin/BlogAdmin');
                            else:
                                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                                $this->form_validation->set_rules('tbTitleBlog', 'naslova bloga', 'xss_clean|required');
                                $this->form_validation->set_rules('taTextBlog', 'tekst bloga', 'xss_clean|required');
                                $this->form_validation->set_rules('tbDateBlog', 'datum bloga', 'xss_clean|required');

                                $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');

                                if ($this->form_validation->run()):

                                    $result_old_pic = $this->blog_model->select();

                                    //unos podataka u model
                                    $this->blog_model->title_blog = $title_blog;
                                    $this->blog_model->text_blog = $text_blog;
                                    $this->blog_model->date_blog = $date_form;
                                    $this->blog_model->pic_blog = $file_name;

                                    $result_blog = $this->blog_model->update();

                                    if (file_exists('images/blog/' . $result_old_pic[0]->pic_blog)):
                                        unlink('images/blog/' . $result_old_pic[0]->pic_blog);
                                    endif;


                                    if ($result_blog != ""):
                                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili blog!</div>");
                                        redirect('administration/admin/BlogAdmin');
                                    else:
                                        if (file_exists('images/blog/' . @$file_name)):
                                            unlink('images/blog/' . @$file_name);
                                        endif;
                                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Izmena bloga nije uspelo!</div>");
                                        redirect('administration/admin/BlogAdmin');
                                    endif;
                                else:
                                    if (file_exists('images/blog/' . @$file_name)):
                                        unlink('images/blog/' . @$file_name);
                                    endif;
                                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                                    redirect('administration/admin/BlogAdmin');
                                endif;
                            endif;
                        else:
                            $this->load->library('form_validation');

                            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                            $this->form_validation->set_rules('tbTitleBlog', 'naslova bloga', 'xss_clean|required');
                            $this->form_validation->set_rules('taTextBlog', 'tekst bloga', 'xss_clean|required');
                            $this->form_validation->set_rules('tbDateBlog', 'datum bloga', 'xss_clean|required');

                            $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');

                            if ($this->form_validation->run()):

                                //unos podataka u model
                                $this->blog_model->title_blog = $title_blog;
                                $this->blog_model->text_blog = $text_blog;
                                $this->blog_model->date_blog = $date_form;

                                $result_slider = $this->blog_model->update();

                                if ($result_slider != ""):
                                    $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili blog!</div>");
                                    redirect('administration/admin/BlogAdmin');
                                else:
                                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Izmena bloga nije uspelo!</div>");
                                    redirect('administration/admin/BlogAdmin');
                                endif;
                            else:
                                $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                                redirect('administration/admin/BlogAdmin');
                            endif;
                        endif;
                    else:
                        $ispisGreske = "Greške: <br>";
                        foreach ($greske as $g):
                            $ispisGreske .= $g . "<br>";
                        endforeach;
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>" . $ispisGreske . "<br>Ponovite ceo unos!</div>");
                        redirect('administration/admin/BlogAdmin');
                    endif;
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

        $data['blog'] = $this->blog_model->select();

        $data['company'] = $this->company_information_model->select();

        $data['title'] = "Oprema administacija sajta";
        $view = "administration/BlogAdmin";
        $this->load_view_admin($view, $data);
    }

    function insert() {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        if (isset($_SESSION['message'])) {
            unset($_SESSION['message']);
        }

        $id_role = $this->session->userdata('id_role');

        $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
        if ($is_post):

            $button = $this->input->post('btnAdd');
            if ($button != ""):
                $title_blog = trim($this->input->post('tbTitleBlog'));
                $text_blog = trim($this->input->post('taTextBlog'));
                $date_blog = trim($this->input->post('tbDateBlog'));
                $pic_blog = $_FILES['fPicBlog'];

                $file_name = "";
                if ($pic_blog["name"] != ""):
                    list($year, $month, $day) = explode('-', $date_blog);

                    $date_form = mktime(00, 00, 00, $month, $day, $year);
                    $config['upload_path'] = 'images/blog/';
                    $config['allowed_types'] = 'gif|jpg|png|JPG';
                    $config['max_size'] = '4096';
                    $config['max_width'] = '800';
                    $config['max_height'] = '550';

                    if ($_FILES['fPicBlog']['type'] == 'image/jpeg'):
                        $picName = '.jpg';
                    elseif ($_FILES['fPicBlog']['type'] == 'image/JPEG'):
                        $picName = '.JPG';
                    elseif ($_FILES['fPicBlog']['type'] == 'image/png'):
                        $picName = '.png';
                    elseif ($_FILES['fPicBlog']['type'] == 'image/PNG'):
                        $picName = '.PNG';
                    elseif ($_FILES['fPicBlog']['type'] == 'image/gif'):
                        $picName = '.gif';
                    elseif ($_FILES['fPicBlog']['type'] == 'image/GIF'):
                        $picName = '.GIF';
                    endif;
                    $file_name .= time() . $picName;

                    $config['file_name'] = $file_name;

                    $this->load->library('upload', $config);
                    $this->load->library('form_validation');

                    if (!$this->upload->do_upload('fPicBlog')):
                        $data_insert['title_blog'] = $title_blog;
                        $data_insert['text_blog'] = $text_blog;
                        $data_insert['date_blog'] = $date_blog;
                        $this->session->set_flashdata("message", "<div class='alert alert-danger ispis'>Dodavanje bloga nije uspelo!<br> Proverite da li je uneta slika odgovarajucih dimenzija!<br>Maximalna visina 550px, maximalna širina 800px i veličina 4MB.</div>");
                    else:
                        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                        $this->form_validation->set_rules('tbTitleBlog', 'naslova bloga', 'xss_clean|required|callback_title_text');
                        $this->form_validation->set_rules('taTextBlog', 'tekst bloga', 'xss_clean|required|callback_title_text');
                        $this->form_validation->set_rules('tbDateBlog', 'datum bloga', 'xss_clean|required|callback_date');

                        $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');

                        if ($this->form_validation->run()):

                            //unos podataka u model
                            $this->blog_model->title_blog = $title_blog;
                            $this->blog_model->text_blog = $text_blog;
                            $this->blog_model->date_blog = $date_form;
                            $this->blog_model->pic_blog = $file_name;

                            $result_blog = $this->blog_model->insert();

                            if ($result_blog != ""):
                                $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste dodali novi blog!</div>");
                            else:
                                if (file_exists('images/blog/' . @$file_name)):
                                    unlink('images/blog/' . @$file_name);
                                endif;
                                $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Dodavanje novog bloga nije uspelo!</div>");
                            endif;
                        else:
                            $data_insert['title_blog'] = $title_blog;
                            $data_insert['text_blog'] = $text_blog;
                            $data_insert['date_blog'] = $date_blog;

                            if (file_exists('images/blog/' . @$file_name)):
                                unlink('images/blog/' . @$file_name);
                            endif;
                            $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                        endif;
                    endif;
                else:
                    $data_insert['title_blog'] = $title_blog;
                    $data_insert['text_blog'] = $text_blog;
                    $data_insert['date_blog'] = $date_blog;

                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Slika je obavezna!</div>");
                endif;
            endif;
        endif;

        $data['form_blog'] = array(
            'class' => 'form-group'
        );
        $data['form_title_blog'] = array(
            'class' => 'size tbTitleBlog',
            'name' => 'tbTitleBlog',
            'value' => isset($data_insert['title_blog']) ? $data_insert['title_blog'] : '',
            'id' => 'tbTitleBlog',
            'placeholder' => 'Naslov',
            'data-id' => 0
        );
        $data['form_text_blog'] = array(
            'class' => 'size_textarea taTextBlog',
            'name' => 'taTextBlog',
            'value' => isset($data_insert['text_blog']) ? $data_insert['text_blog'] : '',
            'id' => 'taTextBlog',
            'placeholder' => 'Tekst',
            'data-id' => 0
        );
        $data['form_date_blog'] = array(
            'class' => 'form-control size tbDateBlog',
            'type' => 'date',
            'name' => 'tbDateBlog',
            'value' => isset($data_insert['date_blog']) ? @date('Y-m-d', $data_insert['date_blog']) : '',
            'id' => 'tbDateBlog',
            'min' => date("Y-m-d"),
            'value' => date("Y-m-d"),
            'data-id' => 0
        );
        $data['form_pic_blog'] = array(
            'class' => 'size fPicBlog',
            'name' => 'fPicBlog',
            'id' => 'fPicBlog',
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
        $data['blog'] = $this->blog_model->select();

        $data['company'] = $this->company_information_model->select();

        $data['title'] = "Blog administacija sajta";
        $view = "administration/add-edit/AddEditBlogAdmin";
        $this->load_view_admin($view, $data);
    }

    public function delete($id = null) {
        if ($id != null):
            $where_id_blog = "blog.id_blog = " . $id;
            $this->blog_model->where = $where_id_blog;
            $result_id_blog = $this->blog_model->select();
            $path = 'images/blog/' . $result_id_blog[0]->pic_blog;

            if ($result_id_blog != null):
                if (file_exists($path)):
                    $this->blog_model->id_blog = $id;
                    $result = $this->blog_model->delete();
                    if ($result == true):
                        unlink($path);
                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste obrisali blog!</div>");
                        redirect('administration/admin/BlogAdmin', 'refresh');
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Niste obrisali blog!</div>");
                        redirect('administration/admin/BlogAdmin', 'refresh');
                    endif;
                else:
                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Niste obrisali blog!</div>");
                    redirect('administration/admin/BlogAdmin', 'refresh');
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
        else:
            $this->form_validation->set_message('title_text', 'Polje za {field} mora biti uneto!');
            return FALSE;
        endif;
    }
    
    public function date($str) {
        $regExp = "/^\d{4}\-\d{2}\-\d{2}$/";
//        $regExp = "/^[+]?\d{11,12}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('date', 'U polje za {field} nisu uneti ispravno podaci!');
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('date', 'Polje za {field} mora biti uneto!');
            return FALSE;
        endif;
    }

}
