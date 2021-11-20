<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_report extends CI_Model
{

    public function rep_daily($date, $month, $year)
    {
        $this->db->select('*');
        $this->db->from('tbl_rinci_transfer');
        $this->db->join('tbl_transfer', 'tbl_transfer.no_order = tbl_rinci_transfer.no_order', 'left');
        $this->db->join('tbl_goods', 'tbl_goods.id_goods = tbl_rinci_transfer.id_goods', 'left');
        $this->db->where('DAY(tbl_transfer.tgl_order)', $date);
        $this->db->where('MONTH(tbl_transfer.tgl_order)', $month);
        $this->db->where('YEAR(tbl_transfer.tgl_order)', $year);
        return $this->db->get()->result();
    }

    public function rep_monthly($month, $year)
    {
        $this->db->select('*');
        $this->db->from('tbl_transfer');
        $this->db->where('MONTH(tgl_order)', $month);
        $this->db->where('YEAR(tgl_order)', $year);
        $this->db->where('status_payment=1');
        return $this->db->get()->result();
    }

    public function rep_yearly( $year)
    {
        $this->db->select('*');
        $this->db->from('tbl_transfer');
        $this->db->where('YEAR(tgl_order)', $year);
        $this->db->where('status_payment=1');
        return $this->db->get()->result();
    }
}

/* End of file ModelName.php */
