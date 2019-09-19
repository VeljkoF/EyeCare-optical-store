<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersAdmin
 *
 * @author Veljko
 */
class UsersAdmin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('company_information_model');
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

        $data['user'] = $this->users_model->select();

        $data['company'] = $this->company_information_model->select();

        $data['title'] = "Korisnici - Administacija sajta";
        $view = "administration/UsersAdmin";
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
                $name_user = trim($this->input->post('tbNameUser'));
                $password_user = md5(trim($this->input->post('tbPasswordUser')));
                $id_role = $this->input->post('ddlNameRole');

                $this->load->library('form_validation');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                $this->form_validation->set_rules('tbNameUser', 'korisničko ime', 'xss_clean|required');
                $this->form_validation->set_rules('tbPasswordUser', 'lozinka', 'xss_clean|required');
                $this->form_validation->set_rules('ddlNameRole', 'uloga korisnika', 'xss_clean|required|callback_checkFunction');
                $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');
                $this->form_validation->set_message('checkFunction', 'Polje za %s mora biti izabrano!');

                if ($this->form_validation->run()):

                    //unos podataka u model
                    $this->users_model->name_user = $name_user;
                    $this->users_model->password_user = $password_user;
                    $this->users_model->id_role = $id_role;

                    $result_user = $this->users_model->insert();

                    if ($result_user == true):
                        $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste dodali novog korisnika!</div>");
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Dodavanje novog korisnikak nije uspelo!</div>");
                    endif;
                else:
                    $data_insert['name_user'] = $name_user;
                    $data_insert['id_role'] = $id_role;

                    $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                endif;
            endif;
        endif;

        $data['form_customer'] = array(
            'class' => 'form',
            'accept-charset' => 'utf-8',
            'method' => 'POST',
            'style' => 'margin: 60px 0px 60px 0px'
        );

        $data['form_name_user'] = array(
            'name' => 'tbNameUser',
            'id' => 'tbNameUser',
            'value' => isset($data_insert['name_user']) ? $data_insert['name_user'] : '',
            'placeholder' => 'Korisničko ime',
            'required' => TRUE
        );

        $data['form_password_user'] = array(
            'name' => 'tbPasswordUser',
            'id' => 'tbPasswordUser',
            'placeholder' => 'Lozinka',
            'required' => TRUE
        );

        $this->load->model('role_model');
        $order_by_name_role = "name_role ASC";
        $this->role_model->order_by = $order_by_name_role;
        $nameRoleOption = $this->role_model->select();
        $optionForNameRole = array('' => "Izaberi...");
        foreach ($nameRoleOption as $n):
            $optionForNameRole += array($n->id_role => $n->name_role);
        endforeach;
        @$selected = $data_insert['id_role'];
        $data['ddlNameRole'] = form_dropdown('ddlNameRole', $optionForNameRole, @$selected, array('style' => 'width: 100px', 'required' => true, 'id' => 'ddlNameRole'));

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

        $data['title'] = "Korisnici - Administacija sajta";
        $view = "administration/add-edit/AddEditUserAdmin";
        $this->load_view_admin($view, $data);
    }

    public function edit($id = null) {

        if (empty($this->session->userdata('id_role'))):
            redirect('Home');
        endif;

        $id_role = $this->session->userdata('id_role');

        if ($id != null):

            $where_user = array(
                'id_user' => $id
            );

            $this->users_model->where = $where_user;
            $user = $this->users_model->select();

            $data['user'] = $user;

            $data['form_customer'] = array(
                'class' => 'form',
                'accept-charset' => 'utf-8',
                'method' => 'POST',
                'style' => 'margin: 60px 0px 60px 0px'
            );

            $data['form_name_user'] = array(
                'name' => 'tbNameUser',
                'id' => 'tbNameUser',
                'value' => $user[0]->name_user,
                'placeholder' => 'Korisničko ime',
                'required' => TRUE
            );

            $data['form_password_user'] = array(
                'name' => 'tbPasswordUser',
                'id' => 'tbPasswordUser',
                'placeholder' => 'Lozinka',
                'required' => TRUE
            );

            $this->load->model('role_model');
            $order_by_name_role = "name_role ASC";
            $this->role_model->order_by = $order_by_name_role;
            $nameRoleOption = $this->role_model->select();
            $optionForNameRole = array('' => "Izaberi...");
            foreach ($nameRoleOption as $n):
                $optionForNameRole += array($n->id_role => $n->name_role);
            endforeach;
            @$selected = $user[0]->id_role;
            $data['ddlNameRole'] = form_dropdown('ddlNameRole', $optionForNameRole, @$selected, array('style' => 'width: 100px', 'required' => true, 'id' => 'ddlNameRole'));

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
                    $name_user = trim($this->input->post('tbNameUser'));
                    $password_user = md5(trim($this->input->post('tbPasswordUser')));
                    $id_role = $this->input->post('ddlNameRole');

                    $this->load->library('form_validation');
                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                    $this->form_validation->set_rules('tbNameUser', 'korisničko ime', 'xss_clean|required|callback_name');
                    $this->form_validation->set_rules('tbPasswordUser', 'lozinka', 'xss_clean|required|callback_password');
                    $this->form_validation->set_rules('ddlNameRole', 'uloga korisnika', 'xss_clean|required|callback_checkFunction');
                    $this->form_validation->set_message('required', 'Polje za %s mora biti uneto!');
                    $this->form_validation->set_message('checkFunction', 'Polje za %s mora biti izabrano!');

                    if ($this->form_validation->run()):

                        //unos podataka u model
                        $this->users_model->name_user = $name_user;
                        $this->users_model->password_user = $password_user;
                        $this->users_model->id_role = $id_role;

                        $result_user = $this->users_model->update();

                        if ($result_user == true):
                            $this->session->set_flashdata("message", "<div class='alert alert-success' style='width: 400px; text-align: center; margin:0px auto'>Uspešno ste izmenili " . $name_user . "</div>");
                            redirect('administration/admin/UsersAdmin');
                        else:
                            $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px'; text-align: center; margin:0px auto>Izmena " . $name_user . " nije uspelo!</div>");
                        endif;
                        $data_insert['name_user'] = $name_user;
                        $data_insert['id_role'] = $id_role;
                    else:
                        $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Proverite da li ste uneli podatke ispravno!</div>");
                        $data_insert['name_user'] = $name_user;
                        $data_insert['id_role'] = $id_role;
                    endif;

                    $data['form_customer'] = array(
                        'class' => 'form',
                        'accept-charset' => 'utf-8',
                        'method' => 'POST',
                        'style' => 'margin: 60px 0px 60px 0px'
                    );

                    $data['form_name_user'] = array(
                        'name' => 'tbNameUser',
                        'id' => 'tbNameUser',
                        'value' => isset($data_insert['name_user']) ? $data_insert['name_user'] : '',
                        'placeholder' => 'Korisničko ime',
                        'required' => TRUE
                    );

                    $data['form_password_user'] = array(
                        'name' => 'tbPasswordUser',
                        'id' => 'tbPasswordUser',
                        'placeholder' => 'Lozinka',
                        'required' => TRUE
                    );

                    $this->load->model('role_model');
                    $order_by_name_role = "name_role ASC";
                    $this->role_model->order_by = $order_by_name_role;
                    $nameRoleOption = $this->role_model->select();
                    $optionForNameRole = array('' => "Izaberi...");
                    foreach ($nameRoleOption as $n):
                        $optionForNameRole += array($n->id_role => $n->name_role);
                    endforeach;
                    @$selected = $data_insert['id_role'];
                    $data['ddlNameRole'] = form_dropdown('ddlNameRole', $optionForNameRole, @$selected, array('style' => 'width: 100px', 'required' => true));

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

        $data['title'] = "Izmena korisnika: " . $user[0]->name_user;
        $view = "administration/add-edit/AddEditUserAdmin";
        $this->load_view_admin($view, $data);
    }

    public function delete() {
        if (isset($_POST['idUser'])):
            $id = $_POST['idUser'];

            $where_id_user = "users.id_user = " . $id;
            $this->users_model->where = $where_id_user;
            $result_id_user = $this->users_model->delete();
            if ($result_id_user == true):
                $this->load->model('users_model', 'users');
                $user = $this->users->select();

                $data = '<table style="width: 100%; border: 1px solid; padding: 10px; margin: 10px 10px;">';
                $data .= '<tr class="border3">';
                $data .= '<th class="border text-alignC">Korisničko ime</th>';
                $data .= '<th class="border text-alignC">Uloga</th>';
                $data .= '<th class="border text-alignC">Akcija</th>';
                $data .= '</tr>';
                foreach ($user as $u):
                    $data .= '<tr class="border">';
                    $data .= '<td class="border text-alignC" style="padding: 10px">' . $u->name_user . '</td>';
                    $data .= '<td class="border text-alignC" style="padding: 10px">' . $u->name_role . '</td>';
                    $data .= '<td class="border text-alignC">';
                    $data .= '<a href="' . base_url() . 'administration/admin/UsersAdmin/edit/' . $u->id_user . '">Izmeni</a>';
                    $data .= '&nbsp;|&nbsp;';
                    $data .= '<a href="#" class="deleteUser" data-id="' . $u->id_user . '">Obriši</a>';
                    $data .= '</td>';
                    $data .= '</tr>';
                endforeach;
                $data .= '</table>';
                echo json_encode($data);
            else:
                $message = $this->session->set_flashdata("message", "<div class='alert alert-danger' style='width: 400px; text-align: center; margin:0px auto'>Greška! Niste obrisali korisnika!</div>");
            endif;
        else:
            redirect('administration/admin/UsersAdmin', 'refresh');
        endif;
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
    
    public function password($str) {
        $regExp = "/^([A-ZŠĐŽĆČa-zđšžćč\d\s\.\:\"\!\?\'\`\s\_\-\/\,\\\*\+\\(\)\'\!\@\#\$\%\^\&\=]{1,}){1,}$/";
//        $regExp = "/^[+]?\d{11,12}$/";
        if ($str != ""):
            if (!preg_match($regExp, $str)):
                $this->form_validation->set_message('password', 'U polje za {field} nisu uneti ispravno podaci!');
                return FALSE;
            else:
                return TRUE;
            endif;
        else:
            $this->form_validation->set_message('password', 'Polje za {field} mora biti uneto!');
            return FALSE;
        endif;
    }
}
