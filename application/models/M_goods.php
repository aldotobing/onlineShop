<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_goods extends CI_Model
{

    public function get_all_Data()
    {
        $this->db->select('*');
        $this->db->from('tbl_goods');

        $this->db->join('tbl_category', 'tbl_category.id_category = tbl_goods.id_category', 'left');

        $this->db->order_by('tbl_goods.id_goods', 'asc');

        // $this->db->order_by('id_goods', 'desc');
        return $this->db->get()->result();
    }


    public function get_data($id_goods)
    {
        $this->db->select('*');
        $this->db->from('tbl_goods');

        $this->db->join('tbl_category', 'tbl_category.id_category = tbl_goods.id_category', 'left');

        $this->db->where('id_goods', $id_goods);

        return $this->db->get()->row();
    }


    public function add($data)
    {

        $this->db->insert('tbl_goods', $data);
    }


    public function edit($data)
    {
        $this->db->where('id_goods', $data['id_goods']);
        $this->db->update('tbl_goods', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_goods', $data['id_goods']);
        $this->db->delete('tbl_goods', $data);
    }
}
