<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API_Laka extends CI_Controller
{
    protected $table = 'laka_data';
    protected $tbId = 'id_laka';
    protected $table2 = 'laka_data_korban';
    protected $titles = 'Data Kecelakaan';

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

    public function show($id = '')
    {
        $this->db->select('laka_lokasi.nm_lokasi,laka_lokasi.alamat_lokasi');
        $this->db->select('laka_data.*');
        $this->db->from($this->table);
        $this->db->join('laka_lokasi', 'laka_lokasi.id_lokasi = laka_data.id_lokasi');
        if (!empty($id)) {
            $this->db->where('laka_data.id_lokasi', $id);
        }
        $query = $this->db->get();
        $data['data'] = $query->result_array();
        echo json_encode($data);
    }

    public function detail($id)
    {
        $this->db->select('laka_lokasi.nm_lokasi,laka_lokasi.alamat_lokasi,laka_lokasi.id_lokasi');
        $this->db->select('laka_data.*');
        $this->db->from($this->table);
        $this->db->join('laka_lokasi', 'laka_lokasi.id_lokasi = laka_data.id_lokasi');
        $this->db->where('laka_data.id_laka', $id);
        $data = $this->db->get()->result_array();
        echo json_encode($data);
    }


    public function insert()
    {
        // MAKE UNIQUE ID
        $id_lokasi = $this->input->post('id_lokasi');
        $tgl_insiden = $this->input->post('tgl_insiden');
        $tgl_conv = date("YmdHi", strtotime($tgl_insiden));
        $uid = "LK" . $tgl_conv . $id_lokasi;

        $korban_meninggal = $this->input->post('korban_meninggal');
        $korban_luka = $this->input->post('korban_luka');
        $korban_total = $korban_luka + $korban_meninggal;

        $send = [
            'id_laka' => $uid,
            'id_lokasi' => $id_lokasi,
            'tgl_insiden' => $tgl_insiden,
            'tipe_laka' => $this->input->post('tipe_laka'),
            'korban_meninggal' => $korban_meninggal,
            'korban_luka' => $korban_luka,
            'korban_total' => $korban_total,
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
        $korban_meninggal = $this->input->post('korban_meninggal');
        $korban_luka = $this->input->post('korban_luka');
        $korban_total = $korban_luka + $korban_meninggal;

        $data = [
            'id_lokasi' => $this->input->post('id_lokasi'),
            'tgl_insiden' => $this->input->post('tgl_insiden'),
            'tipe_laka' => $this->input->post('tipe_laka'),
            'korban_meninggal' => $korban_meninggal,
            'korban_luka' => $korban_luka,
            'korban_total' => $korban_total
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
        $storeFirst = $this->modelFunction->delete($this->table2, $this->tbId, $id);
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
