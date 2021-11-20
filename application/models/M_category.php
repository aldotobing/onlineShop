<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_category extends CI_Model
{

    public function get_all_Data()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->order_by('id_category', 'desc');
        return $this->db->get()->result();
    }
    public function add($data)
    {

        $this->db->insert('tbl_category', $data);
    }
    public function edit($data)
    {
        $this->db->where('id_category', $data['id_category']);
        $this->db->update('tbl_category', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_category', $data['id_category']);
        $this->db->delete('tbl_category', $data);
    }
}
