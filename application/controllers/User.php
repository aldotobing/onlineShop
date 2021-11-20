<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_user');
    }

    // List all your items
    public function index($offset = 0)
    {
        $data = array(
            'title' => 'User',
            'user' => $this->m_user->get_all_Data(),
            'isi' => 'v_user',

        );

        $this->load->view('lyout/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'user_name' => $this->input->post('user_name'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level_user' => $this->input->post('level_user'),
        );
        $this->m_user->add($data);

        $this->session->set_flashdata('Great', 'You Have Add A New User !!!');

        redirect('user');
    }

    //edit one item
    public function edit($id_user = NULL)
    {
        $data = array(
            'id_user' => $id_user,
            'user_name' => $this->input->post('user_name'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level_user' => $this->input->post('level_user'),
        );
        $this->m_user->edit($data);
        $this->session->set_flashdata('Great', 'You Have Edit Your Data !!!');

        redirect('user');
    }

    //Delete one item
    public function delete($id_user = NULL)
    {
        $data = array('id_user' => $id_user);
        $this->m_user->delete($data);
        $this->session->set_flashdata('Great', 'You Have Delete Your Data !!!');
        redirect('user');
    }
}


/* End of file Controllername.php */
