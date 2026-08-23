<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Mencegah error "Undefined property: Ticket::$db"
    }

    public function simpan_tiket($data)
    {
        $this->db->insert('tickets', $data);
        return $this->db->insert_id();
    }

    public function generate_nomor_tiket()
    {
        $tanggal_hari_ini = date('Ymd');
        $prefix = 'TKT-' . $tanggal_hari_ini . '-';

        $this->db->select('nomor_tiket');
        $this->db->from('tickets');
        $this->db->like('nomor_tiket', $prefix, 'after');
        $this->db->order_by('nomor_tiket', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query && $query->num_rows() > 0) {
            $tiket_terakhir = $query->row()->nomor_tiket;
            $pecah = explode('-', $tiket_terakhir);
            $urutan_terakhir = (int) end($pecah);
            $urutan_baru = $urutan_terakhir + 1;
        } else {
            $urutan_baru = 1;
        }

        return $prefix . sprintf("%03d", $urutan_baru);
    }
}