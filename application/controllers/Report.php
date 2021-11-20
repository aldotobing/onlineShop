
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_report');
    }


    public function index()
    {
        $data = array(
            'title' => 'Report',
            'isi' => 'v_report',
        );
        $this->load->view('lyout/v_wrapper_backend', $data, FALSE);
    }
    public function rep_daily()
    {
        $date = $this->input->post('date');
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        $data = array(
            'title' => 'Daily Report',
            'date' => $date,
            'month' => $month,
            'year' => $year,
            'report' => $this->m_report->rep_daily($date, $month, $year),
            'isi' => 'v_rep_daily',
        );
        $this->load->view('lyout/v_wrapper_backend', $data, FALSE);
    }

    public function rep_monthly()
    {
        $month = $this->input->post('month');
        $year = $this->input->post('year');

        $data = array(
            'title' => 'Monthly Report',
            'month' => $month,
            'year' => $year,
            'report' => $this->m_report->rep_monthly($month, $year),
            'isi' => 'v_rep_monthly',
        );
        $this->load->view('lyout/v_wrapper_backend', $data, FALSE);
    }

    public function rep_yearly()
    {
        $year = $this->input->post('year');
        $data = array(
            'title' => 'Yearly Report',
            'year' => $year,
            'report' => $this->m_report->rep_yearly($year),
            'isi' => 'v_rep_yearly',
        );
        $this->load->view('lyout/v_wrapper_backend', $data, FALSE);
    }
}

/* End of file Controllername.php */
