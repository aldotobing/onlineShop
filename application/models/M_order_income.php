<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_order_income extends CI_Model
{
    public function order()
    {
        $this->db->select('*');
        $this->db->from('tbl_transfer');
        $this->db->where('status_order=0');
        $this->db->order_by('id_transfer', 'desc');
        return $this->db->get()->result();
    }
    public function order_proses()
    {
        $this->db->select('*');
        $this->db->from('tbl_transfer');
        $this->db->where('status_order=1');
        $this->db->order_by('id_transfer', 'desc');
        return $this->db->get()->result();
    }
    public function order_send()
    {
        $this->db->select('*');
        $this->db->from('tbl_transfer');
        $this->db->where('status_order=2');
        $this->db->order_by('id_transfer', 'desc');
        return $this->db->get()->result();
    }
    public function order_finshed()
    {
        $this->db->select('*');
        $this->db->from('tbl_transfer');
        $this->db->where('status_order=3');
        $this->db->order_by('id_transfer', 'desc');
        return $this->db->get()->result();
    }

    public function update_order($data)
    {
        $this->db->where('id_transfer', $data['id_transfer']);
        $this->db->update('tbl_transfer', $data);
    }
}
