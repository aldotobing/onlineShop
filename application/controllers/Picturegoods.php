
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Picturegoods extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_picturegoods');

        $this->load->model('m_goods');
    }


    public function index()
    {
        $data = array(
            'title' => 'GOODS PICTURES',
            'picturegoods' => $this->m_picturegoods->get_all_data(),
            'isi' => 'picturegoods/v_index',

        );

        $this->load->view('lyout/v_wrapper_backend', $data, FALSE);
    }
    public function add($id_goods)
    {
        $this->form_validation->set_rules(
            'ket',
            'Ket pic',
            'required',
            array('required' => '%s  Not Entered !!!')

        );

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/picturegoods/';
            $config['allowed_types'] = 'gif|png|jfif|jpeg|ico|jpg';
            $config['max_size']     = '12000';
            $this->upload->initialize($config);
            $field_name = "picture";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'ADD GOODS PICTURES',
                    'error_upload' => $this->upload->display_errors(),
                    'goods' => $this->m_goods->get_Data($id_goods),
                    'picture' => $this->m_picturegoods->get_picture($id_goods),
                    'isi' => 'picturegoods/v_add',
                );

                $this->load->view('lyout/v_wrapper_backend', $data, FALSE);
            } else {

                $upload_data  = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/picturegoods/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'id_goods' => $id_goods,
                    'ket' => $this->input->post('ket'),
                    'picture' =>  $upload_data['uploads']['file_name'],
                );
                $this->m_picturegoods->add($data);
                $this->session->set_flashdata('Great', 'You Have Add A New picture !!!');

                redirect('picturegoods/add/' . $id_goods);
            }
        }



        $data = array(
            'title' => 'ADD GOODS PICTURES',
            'goods' => $this->m_goods->get_Data($id_goods),
            'picture' => $this->m_picturegoods->get_picture($id_goods),
            'isi' => 'picturegoods/v_add',
        );

        $this->load->view('lyout/v_wrapper_backend', $data, FALSE);
    }
    //Delete one item
    public function delete($id_goods, $id_picture)
    {
        // delete pic
        $picture = $this->m_picturegoods->get_Data($id_picture);
        if ($picture->picture != "") {
            unlink('./assets/picturegoods/' . $picture->picture);
        }
        // end 
        $data = array('id_picture' => $id_picture);
        $this->m_picturegoods->delete($data);
        $this->session->set_flashdata('You Have Delete The Picture !!!');
        redirect('picturegoods/add/' . $id_goods);
    }
}
