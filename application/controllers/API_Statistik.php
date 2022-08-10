<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API_Statistik extends CI_Controller
{
    protected $table = 'laka_data';
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

    public function statistikInsidenTahun($tahun)
    {
        $resultData = [];
        $getDeadData = "";
        $getInjuryData = "";
        $getTotalData = "";
        $months = ['01' => 'Jan', '02' => 'Feb.', '03' => 'Mar.', '04' => 'Apr.', '05' => 'Mei', '06' => 'Jun.', '07' => 'Jul.', '08' => 'Agu.', '09' => 'Sep.', '10' => 'Okt.', '11' => 'Nov.', '12' => 'Des.'];
        foreach ($months as $num => $name) {
            $setFill = $tahun . '-' . $num;
            $this->db->select('SUM(korban_meninggal) as dead');
            $this->db->select('SUM(korban_luka) as injury');
            $this->db->select('SUM(korban_total) as total_korban');
            $this->db->select('COUNT(id_laka) as total_insiden');
            $this->db->from($this->table);
            $this->db->where("DATE_FORMAT(tgl_insiden,'%Y-%m')", $setFill);
            $data = $this->db->get()->result_array();
            foreach ($data as $val) {

                $resultData[] = [
                    'bulan' => $name,
                    'dead' => (int)$val['dead'],
                    'injury' => (int)$val['injury'],
                    'total_korban' => (int)$val['total_korban'],
                    'total_insiden' => (int)$val['total_insiden']
                ];
            }
        }
        echo json_encode($resultData);
    }

    public function statistikInsidenJenisLakaByMonth($tahun)
    {
        $resultData = [];
        $setYears = [];
        $finalResults = [];

        $months = ['01' => 'Jan', '02' => 'Feb.', '03' => 'Mar.', '04' => 'Apr.', '05' => 'Mei', '06' => 'Jun.', '07' => 'Jul.', '08' => 'Agu.', '09' => 'Sep.', '10' => 'Okt.', '11' => 'Nov.', '12' => 'Des.'];
        foreach ($months as $num => $name) {
            $setFill = $tahun . '-' . $num;
            $this->db->select('SUM(case when tipe_laka = "Angle (Ra)" then 1 else 0 end) as angle_ra');
            $this->db->select('SUM(case when tipe_laka = "Head On (Ho)" then 1 else 0 end) as head_on');
            $this->db->select('SUM(case when tipe_laka = "Backing" then 1 else 0 end) as backing');
            $this->db->select('SUM(case when tipe_laka = "Rear End (Re)" then 1 else 0 end) as rear_end');
            $this->db->from($this->table);
            $this->db->where("DATE_FORMAT(tgl_insiden,'%Y-%m')", $setFill);
            $data = $this->db->get()->result_array();

            $setYears = [
                'years' => $tahun,
                'j1_name' => 'Angle (Ra)',
                'j2_name'  => 'Head On (Ho)',
                'j3_name'  => 'Backing',
                'j4_name' => 'Rear End (Re)'
            ];

            foreach ($data as $val) {
                $resultData['results'][] = [
                    'bulan' => $name,
                    'j1_count' => (int)$val['angle_ra'],
                    'j2_count'  => (int)$val['head_on'],
                    'j3_count'  => (int)$val['backing'],
                    'j4_count' => (int)$val['rear_end']
                ];
            }

            $finalResults = array_merge($setYears, $resultData);
        }
        echo json_encode($finalResults);
    }

    public function statistikInsidenJenisLakaAll($tahun)
    {
        $resultData = [];
        $this->db->select('SUM(case when tipe_laka = "Angle (Ra)" then 1 else 0 end) as angle_ra');
        $this->db->select('SUM(case when tipe_laka = "Head On (Ho)" then 1 else 0 end) as head_on');
        $this->db->select('SUM(case when tipe_laka = "Backing" then 1 else 0 end) as backing');
        $this->db->select('SUM(case when tipe_laka = "Rear End (Re)" then 1 else 0 end) as rear_end');
        $this->db->from($this->table);
        $this->db->where("DATE_FORMAT(tgl_insiden,'%Y')", $tahun);
        $query = $this->db->get();
        $data = $query->result_array();

        foreach ($data as $val) {
            $resultData['data'] = [
                'years' => $tahun,
                'j1_name' => 'Angle (Ra)',
                'j1_count' => (int)$val['angle_ra'],
                'j2_name'  => 'Head On (Ho)',
                'j2_count'  => (int)$val['head_on'],
                'j3_name'  => 'Backing',
                'j3_count'  => (int)$val['backing'],
                'j4_name' => 'Rear End (Re)',
                'j4_count' => (int)$val['rear_end']
            ];
        }
        echo json_encode($resultData);
    }
}
