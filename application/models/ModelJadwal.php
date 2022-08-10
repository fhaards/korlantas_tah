<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelJadwal extends CI_Model
{

    protected $table  = 'jadwal';
    protected $tbId   = 'id_jadwal';

    public function __construct()
    {
        $this->load->database();
    }
    public function show($id = '')
    {
        $this->db->select('jadwal.*');
        $this->db->select('trayek.*,bus.*,trayek.*,jalur.*');
        $this->db->select('kr1.id_karyawan as idkr1, kr1.nm_karyawan as nmkr1');
        $this->db->select('kr2.id_karyawan as idkr2, kr2.nm_karyawan as nmkr2');
        $this->db->select('kr3.id_karyawan as idkr3, kr3.nm_karyawan as nmkr3');
        $this->db->select('kr4.id_karyawan as idkr4, kr4.nm_karyawan as nmkr4');
        $this->db->from($this->table);
        $this->db->join('bus', 'bus.id_bus = jadwal.jadwal_bus');
        $this->db->join('trayek', 'trayek.id_trayek = jadwal.jadwal_trayek');
        $this->db->join('jalur', 'jalur.id_jalur = jadwal.jadwal_jalur');
        $this->db->join('karyawan as kr1', 'kr1.id_karyawan = jadwal.pagi_supir');
        $this->db->join('karyawan as kr2', 'kr2.id_karyawan = jadwal.pagi_kondektur');
        $this->db->join('karyawan as kr3', 'kr3.id_karyawan = jadwal.siang_supir');
        $this->db->join('karyawan as kr4', 'kr4.id_karyawan = jadwal.siang_kondektur');
        if (!empty($id)) {
            $this->db->where('id_jadwal', $id);
            return $this->db->get();
        } else {
            return $this->db->get();
        }
    }
}
