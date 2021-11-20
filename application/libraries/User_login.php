

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($username, $password)
    {

        $sek = $this->ci->m_auth->login_user($username, $password);
        if ($sek) {
            $user_name = $sek->user_name;
            $username = $sek->username;
            $level_user = $sek->level_user;
            //for session
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('user_name', $user_name);
            $this->ci->session->set_userdata('level_user', $level_user);
            redirect('admin');
        } else {
            $this->ci->session->set_flashdata('error', 'Username Or Password is Wrong');
            redirect('auth/login_user');
        }
    }
    public function security_page()
    {
        if ($this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('error', 'You not login !!!!');
            redirect('auth/login_user');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('user_name');
        $this->ci->session->unset_userdata('level_user');
        $this->ci->session->set_flashdata('pesan', 'You logout !!!!');
        redirect('auth/login_user');
    }
}

/* End of file user_login.php */
