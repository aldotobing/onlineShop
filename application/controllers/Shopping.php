
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shopping extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_transfer');
    }


    public function index()
    {
        if (empty($this->cart->contents())) {
            redirect('home');
        }
        $data = array(
            'title' => 'Basket',
            'isi' => 'v_shopping',
        );
        $this->load->view('lyout/v_wrapper_frontend', $data, FALSE);
    }


    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name'),
        );
        $this->cart->insert($data);
        // var_dump($data);
        redirect($redirect_page, 'refresh');  
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);

        redirect('shopping');
    }


    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' =>  $items['rowid'],
                'qty'   => $this->input->post($i . '[qty]'),

            );
            $this->cart->update($data);
            $i++;
        }
        $this->session->set_flashdata('Great', 'Shopping Cart Updated');
        redirect('shopping');
    }
    public function clear()
    {
        $this->cart->destroy();

        redirect('shopping');
    }


    public function checkout()
    {
        $this->customer_login->security_page();

        $this->form_validation->set_rules(
            'province',
            'Province',
            'required',
            array('required' => '%s  Not Entered !!!')
        );
        $this->form_validation->set_rules(
            'city',
            'City',
            'required',
            array('required' => '%s  Not Entered !!!')
        );
        $this->form_validation->set_rules(
            'expedition',
            'Expedition',
            'required',
            array('required' => '%s  Not Entered !!!')
        );
        $this->form_validation->set_rules(
            'package',
            'Package',
            'required',
            array('required' => '%s  Not Entered !!!')
        );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Check Out Shopping',
                'isi' => 'v_checkout',
            );
            $this->load->view('lyout/v_wrapper_frontend', $data, FALSE);
        } else {

            $data = array(
                'id_customer' => $this->session->userdata('id_customer'),
                'no_order' => $this->input->post('no_order'),
                'tgl_order' => date('y-m-d'),
                'name_penerima' => $this->input->post('name_penerima'),
                'hp_penerima' => $this->input->post('hp_penerima'),
                'province' => $this->input->post('province'),
                'city' => $this->input->post('city'),
                'address' => $this->input->post('address'),
                'code_pos' => $this->input->post('code_pos'),
                'expedition' => $this->input->post('expedition'),
                'package' => $this->input->post('package'),
                'estimasi' => $this->input->post('estimasi'),
                'ongkir' => $this->input->post('ongkir'),
                'weight' => $this->input->post('weight'),
                'grand_total' => $this->input->post('grand_total'),
                'total_payment' => $this->input->post('total_payment'),
                'status_payment' => '0',
                'status_order' => '0',
            );
            $this->m_transfer->simpan_transfer($data);

            $i = 1;
            foreach ($this->cart->contents() as $item) {
                $datarinci = array(
                    'no_order' => $this->input->post('no_order'),
                    'id_goods' => $item['id'],
                    'qty' => $this->input->post('qty' . $i++),
                );
                $this->m_transfer->simpan_rinci_transfer($datarinci);
            }

            //================================================
            $this->session->set_flashdata('Great', 'Request Have Processed');
            $this->cart->destroy();
            redirect('my_order');
        }
    }
}
