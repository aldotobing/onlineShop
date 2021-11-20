<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transfer extends CI_Model
{
    public function simpan_transfer($data)
    {
        $this->db->insert('tbl_transfer', $data);
    }

    public function simpan_rinci_transfer($datarinci)
    {
        $this->db->insert('tbl_rinci_transfer', $datarinci);
    }

    public function not_payment()
    {
        $this->db->select('*');
        $this->db->from('tbl_transfer');
        $this->db->where('id_customer', $this->session->userdata('id_customer'));
        $this->db->where('status_order=0');
        $this->db->order_by('id_transfer', 'desc');
        return $this->db->get()->result();
    }
    public function proses()
    {
        $this->db->select('*');
        $this->db->from('tbl_transfer');
        $this->db->where('id_customer', $this->session->userdata('id_customer'));
        $this->db->where('status_order=1');
        $this->db->order_by('id_transfer', 'desc');
        return $this->db->get()->result();
    }

    public function send()
    {
        $this->db->select('*');
        $this->db->from('tbl_transfer');
        $this->db->where('id_customer', $this->session->userdata('id_customer'));
        $this->db->where('status_order=2');
        $this->db->order_by('id_transfer', 'desc');
        return $this->db->get()->result();
    }
    public function finshed()
    {
        $this->db->select('*');
        $this->db->from('tbl_transfer');
        $this->db->where('id_customer', $this->session->userdata('id_customer'));
        $this->db->where('status_order=3');
        $this->db->order_by('id_transfer', 'desc');
        return $this->db->get()->result();
    }

    public function detail_order($id_transfer)
    {
        $this->db->select('*');
        $this->db->from('tbl_transfer');
        $this->db->where('id_transfer', $id_transfer);
        return $this->db->get()->row();
    }


    public function account()
    {
        $this->db->select('*');
        $this->db->from('tbl_account');
        return $this->db->get()->result();
    }

    public function upload_proof($data)
    {
        $this->db->where('id_transfer', $data['id_transfer']);
        $this->db->update('tbl_transfer', $data);
    }
}
