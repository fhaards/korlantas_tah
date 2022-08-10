<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API_Korban extends CI_Controller
{
    protected $table  = 'laka_data_korban';
    protected $tbId   = 'id_korban';
    protected $titles = 'laka';

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

    public function show($id)
    {
        $data['data'] = $this->modelFunction->getAllById($this->table, 'id_laka', $id);
        echo json_encode($data);
    }

    public function showKorban($id)
    {
        $data['data'] = $this->modelFunction->getAllById($this->table, 'id_korban', $id);
        echo json_encode($data);
    }

    public function insert()
    {
        $id = $this->input->post('idlak');
        $send = [
            'id_laka' => $id,
            'nama' => $this->input->post('nama'),
            'umur' => $this->input->post('umur'),
            'jenis_kelamin' => $this->input->post('jk'),
            'kondisi' => $this->input->post('kondisi')
        ];

        $insert = $this->modelFunction->insert($this->table, $send);
        if ($insert) {
            echo json_encode(array(
                "statusCode" => 200
            ));
        } else {
            echo json_encode(array(
                "statusCode" => 201
            ));
        }
    }

    public function update($id)
    {
        // $id = $this->input->post('idlak');
        $data = [
            'nama' => $this->input->post('nama'),
            'umur' => $this->input->post('umur'),
            'jenis_kelamin' => $this->input->post('jk'),
            'kondisi' => $this->input->post('kondisi')
        ];

        $this->db->where($this->tbId, $id);
        $update = $this->db->update($this->table, $data);
        if ($update) {
            echo json_encode(array(
                "statusCode" => 200
            ));
        } else {
            echo json_encode(array(
                "statusCode" => 201
            ));
        }
    }

    public function delete($id)
    {
        $delete = $this->modelFunction->delete($this->table, $this->tbId, $id);
        if ($delete) {
            echo json_encode(array(
                "statusCode" => 200
            ));
        } else {
            echo json_encode(array(
                "statusCode" => 201
            ));
        }
    }

    public function showLokasi($id)
    {
        $data['data'] = $this->modelFunction->getAllById($this->table, 'id_lokasi', $id);
        echo json_encode($data);
    }
}
