<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WEB_Statistik extends CI_Controller
{
    protected $table = 'laka_data';
    protected $titles = 'laka';
    protected $tbId = 'id_laka';

    function __construct()
    {
        parent::__construct();
        // redirectIfNotLogin();
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('array');
        $this->load->library('crumbs');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('modelFunction');
    }

    public function index()
    {
        return redirect('statistik/show');
    }

    public function showInsiden()
    {
        $this->crumbs->add('Data Statistik Kecelakaan', base_url() . 'statistik');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']      = APP_NAME;
        $data['pageTitle']  = "Statistik";
        $data['content']    = 'pages/statistik/read-insiden';
        $this->load->view('master', $data);
    }

    public function showKorban()
    {
        $this->crumbs->add('Data Statistik Kecelakaan', base_url() . 'statistik');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']      = APP_NAME;
        $data['pageTitle']  = $this->titles;
        $data['content']    = 'pages/statistik/read-korban';
        $this->load->view('master', $data);
    }
}
