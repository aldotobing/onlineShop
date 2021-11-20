<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_customer');
        $this->load->model('m_auth');
    }


    public function register()
    {
        $this->form_validation->set_rules(
            'name_customer',
            'Customer Name',
            'required',
            array(
                'required' => '%s Not Entered !!!'
            )
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|is_unique[tbl_customer.email]',
            array(
                'required' => '%s Not Entered !!!',
                'is_unique' => '%s Email Have Already Add'
            )
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => '%s Not Entered !!!')
        );
        $this->form_validation->set_rules(
            'retype_password',
            'Retype Password',
            'required|matches[password]',
            array(
                'required' => '%s Not Entered !!!',
                'matches' => '%s Password Is Different'
            )
        );


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'customer Register',
                'isi' => 'v_register',
            );
            $this->load->view('lyout/v_wrapper_frontend', $data, FALSE);
        } else {
            $data = array(
                'name_customer' => $this->input->post('name_customer'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),

            );
            $this->m_customer->register($data);

            $this->session->set_flashdata('Great', 'You Have Add Your Account, Please Login Again!!!');

            redirect('customer/register');
        }
    }
    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s from onisi !!!'

        ));
        $this->form_validation->set_rules('password', 'password', 'required', array(
            'required' => '%s from onisi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->customer_login->login($email, $password);
        }

        $data = array(
            'title' => 'Login Customer',
            'isi' => 'v_login_customer',
        );
        $this->load->view('lyout/v_wrapper_frontend', $data, FALSE);
    }
    public function logout()
    {
        $this->customer_login->logout();
    }
    public function accuont()
    {
        $this->customer_login->security_page();
        $data = array(
            'title' => 'My Account',
            'isi' => 'v_my_accuont',
        );
        $this->load->view('lyout/v_wrapper_frontend', $data, FALSE);
    }
}
