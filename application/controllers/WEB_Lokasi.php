<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WEB_Lokasi extends CI_Controller
{
    protected $table  = 'laka_lokasi';
    protected $titles = 'lokasi';
    protected $tbId   = 'id_lokasi';

    function __construct()
    {
        parent::__construct();
        redirectIfNotLogin();
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
        $this->crumbs->add($this->titles, base_url() . 'lokasi');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']      = APP_NAME;
        $data['pageTitle']  = $this->titles;
        $data['content']    = 'pages/lokasi/read';
        $this->load->view('master', $data);
    }

    public function add()
    {
        $this->crumbs->add($this->titles, base_url() . 'lokasi');
        $this->crumbs->add('Tambah Lokasi', base_url() . 'lokasi/add');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']      = APP_NAME;
        $data['pageTitle']  = $this->titles;
        $data['content']    = 'pages/lokasi/add';
        $this->load->view('master', $data);
    }

    public function detail($id)
    {
        $this->crumbs->add($this->titles, base_url() . 'lokasi');
        $this->crumbs->add('Detail', base_url() . 'lokasi/detail');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']      = APP_NAME;
        $data['pageTitle']  = $this->titles;
        $data['thisId']     = $id;
        $data['addForm']    = 'pages/laka/add';
        $data['editForm']   = 'pages/laka/edit';
        $data['content']    = 'pages/lokasi/detail';
        $this->load->view('master', $data);
    }
}
