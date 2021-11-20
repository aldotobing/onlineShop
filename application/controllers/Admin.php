
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_admin');

        $this->load->model('m_order_income');
    }


    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'total_goods' => $this->m_admin->total_goods(),
            'total_category' => $this->m_admin->total_category(),
            'total_user' => $this->m_admin->total_user(),
            'total_transfer' => $this->m_admin->total_transfer(), 
            'isi' => 'v_admin',

        );

        $this->load->view('lyout/v_wrapper_backend', $data, FALSE);
    }


    public function setting()
    {
        $this->form_validation->set_rules(
            'name_store',
            'Store Name',
            'required',
            array('required' => '%s Not Entered !!!')
        );
        $this->form_validation->set_rules(
            'city',
            'City',
            'required',
            array('required' => '%s Not Entered !!!')
        );
        $this->form_validation->set_rules(
            'address_store',
            'Store Address',
            'required',
            array('required' => '%s Not Entered !!!')
        );
        $this->form_validation->set_rules(
            'no_telepon',
            'No_Telepon',
            'required',
            array('required' => '%s Not Entered !!!')
        );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Setting',
                'setting' => $this->m_admin->data_setting(),
                'isi' => 'v_setting',
            );
            $this->load->view('lyout/v_wrapper_backend', $data, FALSE);
        } else {
            $data = array(
                'id' => 1,
                'location' => $this->input->post('city'),
                'name_store' => $this->input->post('name_store'),
                'address_store' => $this->input->post('address_store'),
                'no_telepon' => $this->input->post('no_telepon'),
            );
            $this->m_admin->edit($data);
            $this->session->set_flashdata('Great', 'You Have Update Your Setting!!!');
            redirect('admin/setting');
        }
    }

    public function order_income()
    {
        $data = array(
            'title' => 'Incoming Order',
            'order' => $this->m_order_income->order(),
            'order_proses' => $this->m_order_income->order_proses(),
            'order_send' => $this->m_order_income->order_send(),
            'order_finshed' => $this->m_order_income->order_finshed(),
            'isi' => 'v_order_income',
        );
        $this->load->view('lyout/v_wrapper_backend', $data, FALSE);
    }
    public function proses($id_transfer)
    {
        $data = array(
            'id_transfer' => $id_transfer,
            'status_order' => '1'
        );
        $this->m_order_income->update_order($data);
        $this->session->set_flashdata('Great', 'You Have Update Your Proses');
        redirect('admin/order_income');
    }

    public function send($id_transfer)
    {
        $data = array(
            'id_transfer' => $id_transfer,
            'no_resi' => $this->input->post('no_resi'),
            'status_order' => '2'
        );
        $this->m_order_income->update_order($data);
        $this->session->set_flashdata('Great', 'You Have Send Your Update');
        redirect('admin/order_income');
    }
}
