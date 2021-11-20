<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Goods extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_goods');
        $this->load->model('m_category');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Goods',
            'goods' => $this->m_goods->get_all_data(),
            'isi' => 'goods/v_goods',
        );

        $this->load->view('lyout/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {

        $this->form_validation->set_rules(
            'name_goods',
            'Goods Name',
            'required',
            array('required' => '%s  Not Entered !!!')

        );

        $this->form_validation->set_rules(
            'weight',
            'Weight',
            'required',
            array('required' => '%s  Not Entered !!!')

        );
        $this->form_validation->set_rules(
            'discount',
            'Discount',
            'required',
            array('required' => '%s  Not Entered !!!')

        );
        $this->form_validation->set_rules(
            'id_category',
            'Category',
            'required',
            array('required' => '%s Not Entered !!!')

        );
        $this->form_validation->set_rules(
            'price',
            'price',
            'required',
            array('required' => '%s Not Entered !!!')

        );
        $this->form_validation->set_rules(
            'description',
            'Description',
            'required',
            array('required' => '%s Not Entered !!!')

        );

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/picture/';
            $config['allowed_types'] = 'gif|png|jfif|jpeg|ico|jpg';
            $config['max_size']     = '12000';
            $this->upload->initialize($config);
            $field_name = "picture";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Goods',
                    'category' => $this->m_category->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'goods/v_add',

                );

                $this->load->view('lyout/v_wrapper_backend', $data, FALSE);
            } else {

                $upload_data  = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/picture/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'name_goods' => $this->input->post('name_goods'),
                    'id_category' => $this->input->post('id_category'),
                    'price' => $this->input->post('price'),
                    'weight' => $this->input->post('weight'),
                    'discount' => $this->input->post('discount'),
                    'description' => $this->input->post('description'),
                    'picture' =>  $upload_data['uploads']['file_name'],
                );
                $this->m_goods->add($data);
                $this->session->set_flashdata('Great', 'You Have Add A New Data !!!');

                redirect('goods');
            }
        }


        $data = array(
            'title' => 'Add Goods',
            'category' => $this->m_category->get_all_data(),
            'isi' => 'goods/v_add',

        );

        $this->load->view('lyout/v_wrapper_backend', $data, FALSE);
    }


    //edit one item
    public function edit($id_goods = NULL)
    {
        $this->form_validation->set_rules(
            'name_goods',
            'Goods Name',
            'required',
            array('required' => '%s  Not Entered !!!')

        );
        $this->form_validation->set_rules(
            'id_category',
            'Category',
            'required',
            array('required' => '%s Not Entered !!!')

        );
        $this->form_validation->set_rules(
            'price',
            'price',
            'required',
            array('required' => '%s Not Entered !!!')

        );
        $this->form_validation->set_rules(
            'weight',
            'Weight',
            'required',
            array('required' => '%s  Not Entered !!!')

        );
        $this->form_validation->set_rules(
            'discount',
            'Discount',
            'required',
            array('required' => '%s  Not Entered !!!')

        );
        $this->form_validation->set_rules(
            'description',
            'Description',
            'required',
            array('required' => '%s Not Entered !!!')

        );

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/picture/';
            $config['allowed_types'] = 'gif|jpg|png|jfif|jpeg|ico';
            $config['max_size']     = '12000';
            $this->upload->initialize($config);
            $field_name = "picture";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(

                    'id_goods' => $id_goods,
                    'title' => 'Edit Goods',
                    'category' => $this->m_category->get_all_data(),
                    'goods' => $this->m_goods->get_Data($id_goods),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'goods/v_edit',

                );

                $this->load->view('lyout/v_wrapper_backend', $data, FALSE);
            } else {
                $goods = $this->m_goods->get_Data($id_goods);
                if ($goods->picture != "") {
                    unlink('./assets/picture/' . $goods->picture);
                }
                $upload_data  = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/picture/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'id_goods' => $id_goods,
                    'name_goods' => $this->input->post('name_goods'),
                    'id_category' => $this->input->post('id_category'),
                    'price' => $this->input->post('price'),
                    'weight' => $this->input->post('weight'),
                    'description' => $this->input->post('description'),
                    'picture' =>  $upload_data['uploads']['file_name'],
                );

                $this->m_goods->edit($data);
                $this->session->set_flashdata('Great', 'You Have Edit The Data !!!');
                redirect('goods');
            }

            $data = array(
                'id_goods' => $id_goods,
                'name_goods' => $this->input->post('name_goods'),
                'id_category' => $this->input->post('id_category'),
                'price' => $this->input->post('price'),
                'weight' => $this->input->post('weight'),
                'discount' => $this->input->post('discount'),
                'description' => $this->input->post('description'),


            );
            $this->m_goods->edit($data);
            $this->session->set_flashdata('Great', 'You Have Edit The Data !!!');

            redirect('goods');
        }


        $data = array(
            'title' => 'Edit Goods',
            'category' => $this->m_category->get_all_data(),
            'goods' => $this->m_goods->get_Data($id_goods),
            'isi' => 'goods/v_edit',

        );

        $this->load->view('lyout/v_wrapper_backend', $data, FALSE);
    }


    //Delete one item
    public function delete($id_goods = NULL)
    {
        // delete pic
        $goods = $this->m_goods->get_Data($id_goods);
        if ($goods->picture != "") {
            unlink('./assets/picture/' . $goods->picture);
        }
        // end 
        $data = array('id_goods' => $id_goods);
        $this->m_goods->delete($data);
        $this->session->set_flashdata('Great', 'You Have Delete Your Goods !!!');
        redirect('goods');
    }
}


/* End of file Controllername.php */
