<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluhan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
        $this->load->model('Ticket_model'); // Load model database
    }

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
            'GIM'     => ['AC', 'Carpenter', 'Electric', 'Plumping'],
            'GA'      => ['ATK / Perlengkapan', 'Renovasi / Maintenance', 'Ticket']
        ];

        // Ambil opsi sesuai kategori, jika tidak ada set kosong
        $data['options'] = isset($sub_options[$kat]) ? $sub_options[$kat] : [];

        // Notifikasi flashdata
        $data['pesan_sukses'] = $this->session->flashdata('pesan_sukses');
        $data['pesan_gagal']  = $this->session->flashdata('pesan_gagal');

        $this->load->view('form_keluhan_view', $data);
    }

    public function submit()
    {
        // Mapping ID Kategori sesuai dbo.ticket_categories
        $map_kategori_id = [
            'FUEL'    => 4,
            'CARPOOL' => 5,
            'IT'      => 6,
            'GIM'     => 7,
            'GA'      => 8
        ];

        $kategori_id = isset($map_kategori_id[$kategori]) ? $map_kategori_id[$kategori] : 4;
        
        $kategori = strtoupper($this->input->post('kategori_utama'));

        // Config & Proses Upload Foto
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 5120;
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload', $config);

        $nama_foto = NULL;
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $nama_foto = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('pesan_gagal', 'Gagal upload foto: ' . $this->upload->display_errors('',''));
                redirect('keluhan/form/' . strtolower($kategori));
                return;
            }
        }

        // Simpan data opsional/dinamis ke JSON format
        $extra_data = [
            'lokasi'        => $this->input->post('location'),
            'detail_lokasi' => $this->input->post('detail_lokasi'),
            'foto_lampiran' => $nama_foto
        ];

        // Mapping Kolom Presisi ke SQL Server dbo.tickets
        $data_db = [
            'nomor_tiket'    => 'KLH-' . date('YmdHis') . rand(10,99),
            'pelapor_id'     => $this->input->post('id_user'), // TAMBAHKAN BARIS INI
            'jenis_tiket'    => 'KELUHAN',
            'sub_kategori'   => strtoupper($this->input->post('sub_kategori') ?: ''),
            'nama_pelapor'   => $this->input->post('nama'),
            'id_karyawan'    => $this->input->post('id_user'),
            'dept_pelapor'   => $this->input->post('departement'),
            'no_hp'          => $this->input->post('no_hp'),
            'judul_tiket'    => 'KELUHAN ' . $kategori,
            'deskripsi'      => $this->input->post('keluhan'),
            'priority_level' => 'Tinggi',
            'status'         => 'OPEN',
            'created_at'     => date('Y-m-d H:i:s'),
            'dynamic_data'   => json_encode($extra_data)
        ];

        // Simpan via Ticket_model
        $this->Ticket_model->simpan_tiket($data_db);
        $this->session->set_flashdata('pesan_sukses', 'Terima kasih! Tiket Keluhan (' . $data_db['nomor_tiket'] . ') berhasil disimpan.');

        redirect('keluhan/form/' . strtolower($kategori));
    }
}