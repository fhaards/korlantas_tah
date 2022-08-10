<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PUB_Controller extends CI_Controller
{
    protected $table = 'laka_lokasi';
    protected $titles1 = 'lokasi';

    function __construct()
    {
        parent::__construct();
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
        return redirect('beranda');
    }

    public function showBeranda()
    {
        $this->crumbs->add('Beranda', base_url() . 'settings/about');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']      = APP_NAME;
        if (isLogin()) {
            $data['pageTitle']  = 'Hi, Welcome Back';
        } else {
            $data['pageTitle']  = 'Beranda';
        }
        $data['content']    = 'public/beranda';
        $this->load->view('master', $data);
    }

    public function showTitikRawan()
    {
        $this->crumbs->add($this->titles1, base_url() . 'lokasi');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']      = APP_NAME;
        $data['pageTitle']  = 'lokasi';
        $data['content']    = 'public/lokasi/read';
        $this->load->view('master', $data);
    }

    public function showStatistikInsiden()
    {
        $this->crumbs->add('Data Statistik Kecelakaan', base_url() . 'statistik');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']      = APP_NAME;
        $data['pageTitle']  = "Statistik";
        $data['content']    = 'public/statistik/read-insiden';
        $this->load->view('master', $data);
    }

    public function showStatistikKorban()
    {
        $this->crumbs->add('Data Statistik Kecelakaan', base_url() . 'statistik');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']      = APP_NAME;
        $data['pageTitle']  = "laka";
        $data['content']    = 'public/statistik/read-korban';
        $this->load->view('master', $data);
    }
}
