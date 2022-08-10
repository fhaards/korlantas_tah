<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API_Lokasi extends CI_Controller
{
    protected $table = 'laka_lokasi';
    protected $tbId = 'id_lokasi';
    protected $titles = 'lokasi';

    function __construct()
    {
        parent::__construct();
        // redirectIfNotLogin();
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('array');
        $this->load->helper('url');
        $this->load->library('crumbs');
        $this->load->library('form_validation');
        $this->load->model('modelFunction');
    }

    public function index()
    {
        $data['data'] = $this->modelFunction->getAll($this->table);
        echo json_encode($data);
    }

    public function show($id)
    {
        $data['data'] = $this->modelFunction->getAllById($this->table, $this->tbId, $id);
        echo json_encode($data);
    }

    public function showCounter($id)
    {
        $this->db->select('SUM(korban_meninggal) as korban_mati, SUM(korban_luka) as korban_luka');
        $this->db->select('SUM(korban_meninggal) + SUM(korban_luka) as korban_total');
        $this->db->select('COUNT(*) as total_insiden');
        $this->db->from('laka_data');
        $this->db->where('laka_data.id_lokasi', $id);
        $query = $this->db->get();
        $data['data'] = $query->result_array();
        echo json_encode($data);
    }


    public function insert()
    {
        $send = [
            'nm_lokasi' => $this->input->post('nm_lokasi'),
            'alamat_lokasi' => $this->input->post('alamat_lokasi'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $store = $this->modelFunction->insert($this->table, $send);
        if ($store) {
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
        $data = [
            'nm_lokasi' => $this->input->post('nm_lokasi'),
            'alamat_lokasi' => $this->input->post('alamat_lokasi'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude')
        ];
        $this->db->where($this->tbId, $id);
        $store = $this->db->update($this->table, $data);
        if ($store) {
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
        $storeFirst = $this->modelFunction->delete('laka_data', $this->tbId, $id);
        if ($storeFirst) {
            $store = $this->modelFunction->delete($this->table, $this->tbId, $id);
            if ($store) {
                echo json_encode(array(
                    "statusCode" => 200
                ));
            } else {
                echo json_encode(array(
                    "statusCode" => 201
                ));
            }
        }
    }
}
