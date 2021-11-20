<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_customer extends CI_Model
{
    public function register($data)
    {


        $this->db->insert('tbl_customer', $data);
    }
}

/* End of file ModelName.php */
