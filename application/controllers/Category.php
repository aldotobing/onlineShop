<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_category');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'category',
            'category' => $this->m_category->get_all_data(),
            'isi' => 'v_category',
        );
        $this->load->view('lyout/v_wrapper_backend', $data, FALSE);
    }


    // Add a new item
    public function add()
    {
        $data = array(
            'name_category' => $this->input->post('name_category'),
        );
        $this->m_category->add($data);

        $this->session->set_flashdata('Great', 'You Have Add A New Category !!!');

        redirect('category');
    }

    //Update one item
    public function edit($id_category = NULL)
    {
        $data = array(
            'id_category' => $id_category,
            'name_category' => $this->input->post('name_category'),
        );
        $this->m_category->edit($data);

        $this->session->set_flashdata('Great', 'You Have Update Category !!!');

        redirect('category');
    }

    //Delete one item
    public function delete($id_category = NULL)
    {
        $data = array('id_category' => $id_category);
        $this->m_category->delete($data);
        $this->session->set_flashdata('Great', 'You Have Delete Your Category !!!');
        redirect('category');
    }
}

/* End of file Category.php */
