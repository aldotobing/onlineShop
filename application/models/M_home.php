<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{

    public function get_all_Data()
    {
        $this->db->select('*');
        $this->db->from('tbl_goods');
        $this->db->join('tbl_category', 'tbl_category.id_category = tbl_goods.id_category', 'left');
        $this->db->order_by('tbl_goods.id_goods', 'desc');
        $this->db->order_by('id_goods', 'desc');
        return $this->db->get()->result();
    }

    public function get_all_Data_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->order_by('id_category', 'desc');
        return $this->db->get()->result();
    }


    public function detail_goods($id_goods)
    {
        $this->db->select('*');
        $this->db->from('tbl_goods');
        $this->db->join('tbl_category', 'tbl_category.id_category = tbl_goods.id_category', 'left');
        $this->db->where('id_goods', $id_goods);
        return $this->db->get()->row();
    }

    public function detail_goods_discount($id_goods)
    {
        $this->db->select('*');
        $this->db->from('tbl_goods');
        $this->db->where('id_goods', $id_goods);
        return $this->db->get()->row();
    }


public function picture_goods($id_goods)
{
    $this->db->select('*');
    $this->db->from('tbl_picture');
    $this->db->where('id_goods', $id_goods);
    return $this->db->get()->result();

}



    public function category($id_category)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('id_category', $id_category);
        return $this->db->get()->row();
    }

    public function get_all_data_goods($id_category)
    {
        $this->db->select('*');
        $this->db->from('tbl_goods');
        $this->db->join('tbl_category', 'tbl_category.id_category = tbl_goods.id_category', 'left');
        $this->db->where('tbl_goods.id_category', $id_category);
        return $this->db->get()->result();
    }
}
