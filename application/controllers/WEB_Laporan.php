<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WEB_Laporan extends CI_Controller
{
    protected $tbLokasi = 'laka_lokasi';
    protected $tbLokasiId = 'id_lokasi';

    protected $tbLaka = 'laka_data';
    protected $tbLakaId = 'id_laka';

    protected $tbKorban = 'laka_data_korban';
    protected $tbKorbanId = 'id_korban';

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
        $this->load->library('pdf');
        $this->load->helper('url');
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->helper('directory');
        $this->load->model('modelFunction');
    }


    public function laporanLokasi($id = "")
    {
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->setFileName = "laporan_lokasi.pdf";
        $data['title_pdf'] = 'Laporan Lokasi Kecelakaan';
        if (empty($id)) :
            $data['item'] = $this->modelFunction->getAll($this->tbLokasi);
            $this->pdf->loadView('pages/laporan/laporan-lokasi', $data);
        else :
            $data['item'] = $this->modelFunction->getAllById($this->tbLaka, $this->tbLokasiId, $id);
            $this->db->select('laka_lokasi.nm_lokasi,laka_lokasi.alamat_lokasi,laka_lokasi.id_lokasi,laka_lokasi.latitude,laka_lokasi.longitude');
            $this->db->select('laka_data.id_lokasi');
            $this->db->select('SUM(korban_meninggal) as korban_mati, SUM(korban_luka) as korban_luka');
            $this->db->select('SUM(korban_meninggal) + SUM(korban_luka) as korban_total');
            $this->db->select('COUNT(*) as total_insiden');
            $this->db->from($this->tbLokasi);
            $this->db->join('laka_data', 'laka_data.id_lokasi = laka_lokasi.id_lokasi');
            $this->db->where('laka_lokasi.id_lokasi', $id);
            $data['item2'] = $this->db->get()->row_array();
            $this->pdf->loadView('pages/laporan/laporan-lokasi-detail', $data);
        endif;
    }

    public function laporanLaka($id = "")
    {
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->setFileName = "laporan_lokasi.pdf";

        if (empty($id)) :
            $data['title_pdf'] = 'Laporan Data Keseluruhan Kecelakaan / Insiden';
            $this->db->select('laka_lokasi.nm_lokasi,laka_lokasi.alamat_lokasi');
            $this->db->select('laka_data.*');
            $this->db->from($this->tbLaka);
            $this->db->join('laka_lokasi', 'laka_lokasi.id_lokasi = laka_data.id_lokasi');
            $query = $this->db->get();
            $data['item'] = $query->result_array();
            $this->pdf->loadView('pages/laporan/laporan-laka', $data);
        else :
            $data['title_pdf'] = 'Laporan Kecelakaan :';
            $queryKorban = $this->modelFunction->getRawById($this->tbKorban, 'id_laka', $id);
            if ($queryKorban->num_rows() > 0) :
                $data['getKorban'] = 1;
                $data['item'] = $queryKorban->result_array();
            else :
                $data['getKorban'] = 0;
            endif;
            $this->db->select('laka_lokasi.nm_lokasi,laka_lokasi.alamat_lokasi,laka_lokasi.id_lokasi,laka_lokasi.latitude,laka_lokasi.longitude');
            $this->db->select('laka_data.id_lokasi,laka_data.id_laka');
            $this->db->select('SUM(korban_meninggal) as korban_mati, SUM(korban_luka) as korban_luka');
            $this->db->select('SUM(korban_meninggal) + SUM(korban_luka) as korban_total');
            $this->db->select('COUNT(*) as total_insiden');
            $this->db->from($this->tbLaka);
            $this->db->join('laka_lokasi', 'laka_lokasi.id_lokasi = laka_data.id_lokasi');
            $this->db->where('laka_data.id_laka', $id);
            $data['item2'] = $this->db->get()->row_array();
            $this->pdf->loadView('pages/laporan/laporan-laka-detail', $data);
        endif;
    }
}
