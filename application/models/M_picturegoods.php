<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_picturegoods extends CI_Model
{

    public function get_all_data()
    {
        $this->db->select('tbl_goods.*,COUNT(tbl_picture.id_goods) as total_picture');
        $this->db->from('tbl_goods');
        $this->db->join('tbl_picture', 'tbl_picture.id_goods = tbl_goods.id_goods', 'left');
        $this->db->group_by(' tbl_goods.id_goods');
        $this->db->order_by(' tbl_goods.id_goods', 'desc');
        return $this->db->get()->result();
    }
    public function get_data($id_picture)
    {
        $this->db->select('*');
        $this->db->from('tbl_picture');
        $this->db->where('id_picture', $id_picture);
        return $this->db->get()->row();
    }


    public function get_picture($id_goods)
    {
        $this->db->select('*');
        $this->db->from('tbl_picture');
        $this->db->where('id_goods', $id_goods);
        return $this->db->get()->result();
    }
    public function add($data)
    {

        $this->db->insert('tbl_picture', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_picture', $data['id_picture']);
        $this->db->delete('tbl_picture', $data);
    }
}
