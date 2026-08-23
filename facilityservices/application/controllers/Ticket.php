<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Pastikan baris ini ada!
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
        $this->load->model('Ticket_model');
    }

    public function buat($jenis = 'KELUHAN')
    {
        $data['jenis_default'] = strtoupper($jenis);
        $this->load->view('form_ticket_view', $data);
    }

    public function submit()
    {
        $jenis_tiket    = strtoupper($this->input->post('jenis_tiket'));
        $kategori_utama = strtoupper($this->input->post('kategori_utama'));
        $sub_kategori   = strtoupper($this->input->post('sub_kategori') ?: '');

        // Upload Foto
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 5120;
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload', $config);

        $nama_foto = NULL;
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $nama_foto = $this->upload->data('file_name');
            }
        }

        // Mapping ID Kategori
        $map_kategori_id = [
            'FUEL'            => 4,
            'CARPOOL'         => 5,
            'IT'              => 6,
            'GIM'             => 7,
            'GENERAL AFFAIRS' => 8
        ];
        $kategori_id = isset($map_kategori_id[$kategori_utama]) ? $map_kategori_id[$kategori_utama] : 4;

        // Generate Nomor Tiket Format: TKT-20260823-001
        $nomor_tiket = $this->Ticket_model->generate_nomor_tiket();

        // Extra Data JSON
        $extra_data = [
            'foto_lampiran' => $nama_foto
        ];

        // Tangkap Data Ekstra Carpool
        if ($kategori_utama == 'CARPOOL' && $jenis_tiket == 'REQUEST') {
            $extra_data['titik_jemput'] = $this->input->post('carpool_titik');
            $extra_data['titik_tujuan'] = $this->input->post('carpool_tujuan');
            $extra_data['jam']          = $this->input->post('carpool_jam');
            
            if ($sub_kategori == 'BOOKING') {
                $extra_data['tanggal']  = $this->input->post('carpool_tanggal');
            }
        }

        // Mapping Presisi ke SQL Server
        $data_db = [
            'nomor_tiket'    => $nomor_tiket,
            'pelapor_id'     => 1, // MUTLAK 1 MENGHINDARI ERROR FOREIGN KEY
            'kategori_id'    => $kategori_id,
            'jenis_tiket'    => $jenis_tiket,
            'sub_kategori'   => $sub_kategori,
            'nama_pelapor'   => $this->input->post('nama'),
            'id_karyawan'    => $this->input->post('id_user'),
            'dept_pelapor'   => $this->input->post('departement'),
            'no_hp'          => $this->input->post('no_hp'),
            'judul_tiket'    => $jenis_tiket . ' ' . $kategori_utama . ($sub_kategori ? ' - ' . $sub_kategori : ''),
            'deskripsi'      => $this->input->post('detail_tiket'),
            'priority_level' => ($jenis_tiket == 'KELUHAN') ? 'Tinggi' : 'Sedang',
            'status'         => 'OPEN',
            'created_at'     => date('Y-m-d H:i:s'),
            'dynamic_data'   => json_encode($extra_data)
        ];

        $this->Ticket_model->simpan_tiket($data_db);
        $this->session->set_flashdata('pesan_sukses', 'Mantap! Tiket ' . $nomor_tiket . ' berhasil dikirim.');

        redirect('ticket/buat/' . strtolower($jenis_tiket));
    }
}