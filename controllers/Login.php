<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Veljko
 */
class Login extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        
    }
    public function login(){
        $this->load->library('form_validation');
        $is_post=$this->input->server('REQUEST_METHOD') == 'POST';
        
        if($is_post):
        
            $this->form_validation->set_rules('tbUserName','korisničko ime','required');       
            $this->form_validation->set_rules('tbPassword','lozinka','required');
            $this->form_validation->set_message('required','Polje za %s je obavezno');
            
            if($this->form_validation->run()==FALSE):
                
                //redirect('Welcome');
                //$data = array('notice' => "Greska! Form validation");
                //$this->load_view('', $data);
                $flash_data=array(
                'notice' => "Greska! Form validation"
                );
                $this->session->set_flashdata($flash_data);            
                redirect(base_url());
            
            else:
                $user_name = trim($this->input->post('tbUserName'));
                $password = md5(trim($this->input->post('tbPassword')));
                $where = array(
                    'name_user' => $user_name,
                    'password_user' => $password
                );
                $this->users_model->where = $where;
                $check = $this->users_model->select();
                //var_dump($check);
                if($check != FALSE):
                    $session_data=array(
                        'id_user' => $check[0]->id_user,
                        'name_user' => $check[0]->name_user,
                        'id_role' => $check[0]->id_role
                    );
//                    $flash_data=array(
//                        'notice' => "Uspešno ste se prijavili kao: ".$check[0]->name_role
//                    );
                    $id_role=$check[0]->id_role;
                    
//                    $this->session->set_flashdata($flash_data);
                    
                    $this->session->set_userdata($session_data);
                    
                    if($this->session->userdata('id_role') == 1):
                        redirect('administration/admin/SliderAdmin');
                    elseif($this->session->userdata('id_role') == 2):
                        redirect('administration/sales/OrderList');
                    elseif($this->session->userdata('id_role') == 3):
                        redirect('administration/sales/HomeSales');
                    else:
                        $flash_data=array(
                        'notice' => "Greška! Pogrešan unos podataka prilikom logovanja. Proverite unete podatke."
                        );
                        $this->session->set_flashdata($flash_data);
                        redirect(base_url());
                    endif;
                else:
                    $flash_data=array(
                        'notice' => "Greška! Pogrešan unos podataka prilikom logovanja. Proverite unete podatke."
                    );
                    $this->session->set_flashdata($flash_data);
                    redirect(base_url());
                endif;
            endif;
        endif;
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
