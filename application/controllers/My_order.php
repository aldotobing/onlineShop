<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_order extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transfer');
        $this->load->model('m_order_income');
    }

    public function index()
    {
        $data = array(
            'title' => ' My Order',
            'not_payment' => $this->m_transfer->not_payment(),
            'proses' => $this->m_transfer->proses(),
            'finshed' => $this->m_transfer->finshed(),
            'send' => $this->m_transfer->send(),
            'isi' => 'v_my_order',
        );
        $this->load->view('lyout/v_wrapper_frontend', $data, FALSE);
    }

    public function payment($id_transfer)
    {
        $this->form_validation->set_rules(
            'atas_name',
            'Atas Name',
            'required',
            array('required' => '%s Not Entered !!!')

        );

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/bukti_payment/';
            $config['allowed_types'] = 'gif|png|jfif|jpeg|ico|jpg';
            $config['max_size']     = '12000';
            $this->upload->initialize($config);
            $field_name = 'bukti_payment';
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Payment',
                    'order' => $this->m_transfer->detail_order($id_transfer),
                    'account' => $this->m_transfer->account(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'v_payment',
                );
                $this->load->view('lyout/v_wrapper_frontend', $data, FALSE);
            } else {

                $upload_data  = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/bukti_payment/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'id_transfer' => $id_transfer,
                    'atas_name' => $this->input->post('atas_name'),
                    'name_bank' => $this->input->post('name_bank'),
                    'no_rek' => $this->input->post('no_rek'),
                    'status_payment' => '1',
                    'bukti_payment' =>  $upload_data['uploads']['file_name'],
                );
                $this->m_transfer->upload_proof($data);
                $this->session->set_flashdata('Great', 'You Have Add A proof payment !!!');
                redirect('my_order');
            }
        }
        $data = array(
            'title' => 'Payment',
            'order' => $this->m_transfer->detail_order($id_transfer),
            'account' => $this->m_transfer->account(),
            'isi' => 'v_payment',
        );
        $this->load->view('lyout/v_wrapper_frontend', $data, FALSE);
    }

    public function accept($id_transfer)
    {
        $data = array(
            'id_transfer' => $id_transfer,
            'status_order' => '3'
        );
        $this->m_order_income->update_order($data);
        $this->session->set_flashdata('Great', 'We Accept Your Order');
        redirect('my_order');
    }
}
