<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WEB_Laka extends CI_Controller
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
        return redirect('laka/show');
    }

    public function show()
    {
        $this->crumbs->add('Data Kecelakaan', base_url() . 'lokasi');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']      = APP_NAME;
        $data['pageTitle']  = $this->titles;
        $data['addForm']   = 'pages/laka/add';
        $data['editForm']   = 'pages/laka/edit';
        $data['content']    = 'pages/laka/read';
        $this->load->view('master', $data);
    }

    public function detail($id)
    {
        $this->crumbs->add('Data Kecelakaan', base_url() . 'laka');
        $this->crumbs->add($id, base_url() . 'laka/detail');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']      = APP_NAME;
        $data['pageTitle']  = $this->titles;
        $data['getId'] = $id;
        $data['content']    = 'pages/laka/detail';
        $this->load->view('master', $data);
    }


    public function showLokasi($id)
    {
        $data['data'] = $this->modelFunction->getAllById($this->table, 'id_lokasi', $id);
        echo json_encode($data);
    }
}
