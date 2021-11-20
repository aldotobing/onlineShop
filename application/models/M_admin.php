<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function total_goods()
    {
        return
            $this->db->get('tbl_goods')->num_rows();
    }

    public function total_category()
    {
        return
            $this->db->get('tbl_category')->num_rows();
    }
    public function total_user()
    {
        return
            $this->db->get('tbl_user')->num_rows();
    }
    public function total_transfer()
    {
        return
            $this->db->get('tbl_transfer')->num_rows();
    }

    public function data_setting()
    {
        $this->db->select('*');
        $this->db->from('tbl_setting');
        $this->db->where('id', 1);
        return
            $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_setting', $data);
    }
}
