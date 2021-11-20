

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class customer_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($email, $password)
    {

        $sek = $this->ci->m_auth->login_customer($email, $password);
        if ($sek) {
            $id_customer = $sek->id_customer;
            $name_customer = $sek->name_customer;
            $email = $sek->email;
            $foto = $sek->foto;
            //for session
            $this->ci->session->set_userdata('id_customer', $id_customer);
            $this->ci->session->set_userdata('name_customer', $name_customer);
            $this->ci->session->set_userdata('email', $email);
            $this->ci->session->set_userdata('foto', $foto);
            redirect('home');
        } else {
            $this->ci->session->set_flashdata('error', 'Email Or Password is Wrong');
            redirect('customer/login');
        }
    }
    public function security_page()
    {
        if ($this->ci->session->userdata('name_customer') == '') {
            $this->ci->session->set_flashdata('error', 'You not login !!!!');
            redirect('customer/login');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('id_customer');
        $this->ci->session->unset_userdata('name_customer');
        $this->ci->session->unset_userdata('email');
        $this->ci->session->unset_userdata('foto');
        $this->ci->session->set_flashdata('Great', 'You logout !!!!');
        redirect('customer/login');
    }
}

/* End of file user_login.php */
