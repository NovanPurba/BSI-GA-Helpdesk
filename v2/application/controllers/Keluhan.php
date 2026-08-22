<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluhan extends CI_Controller {

    public function index()
    {
        $this->load->view('opsi_keluhan_view');
    }

    public function form($kategori = 'FUEL')
    {
        $kat = strtoupper($kategori);
        $data['kategori'] = $kat;

        // Opsi sub-kategori spesifik tiap jenis keluhan
        $sub_options = [
            'FUEL'    => ['SMU/Ring Tag', 'Fuel', 'Charging'],
            'IT'      => ['OT', 'SUPPORT', 'INFRA'],
            //'CARPOOL' => ['Kerusakan Unit', 'Kebersihan Mobil', 'Layanan Driver'],
            'GIM'     => ['AC', 'Carpenter', 'Electric', 'Plumping'],
            'GA'      => ['ATK / Perlengkapan', 'Renovasi / Maintenance', 'Ticket']
        ];

        // Ambil opsi sesuai kategori, jika tidak ada set kosong
        $data['options'] = isset($sub_options[$kat]) ? $sub_options[$kat] : [];

        $this->load->view('form_keluhan_view', $data);
    }
}