

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
    }


    public function index()
    {
        $data = array(
            'title' => 'HOME',
            'goods' => $this->m_home->get_all_data(),
            'isi' => 'v_home',
        );
        $this->load->view('lyout/v_wrapper_frontend', $data, FALSE);
    }


    public function category($id_category)
    {
        $category = $this->m_home->category($id_category);
        $data = array(
            'title' => 'Category Goods : ' . $category->name_category,
            'goods' => $this->m_home->get_all_data_goods($id_category),
            'isi' => 'v_Category_goods',
        );
        $this->load->view('lyout/v_wrapper_frontend', $data, FALSE);
    }


    public function detail_goods($id_goods)
    {
        $data = array(
            'title' => 'Detail Goods',
            'picture' => $this->m_home->picture_goods($id_goods),
            'goods' => $this->m_home->detail_goods($id_goods),
            'isi' => 'v_detail_goods',
        );
        $this->load->view('lyout/v_wrapper_frontend', $data, FALSE);
    }
}


/* End of file home.php */
