<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
    }

    public function index()
    {
        $this->load->view('opsi_request_view');
    }

    public function fuel_options()
    {
        $this->load->view('opsi_request_fuel_view');
    }

    public function carpool_options()
    {
        $this->load->view('opsi_request_carpool_view');
    }

    public function form($kategori = 'fuel', $sub = '')
    {
        $data['kategori'] = strtoupper($kategori);
        $data['sub']      = strtolower($sub);
        
        // Dropdown Kategori Khusus GIM Request
        if ($data['kategori'] === 'GIM') {
            $data['options'] = ['AC', 'Carpenter', 'Electric', 'Plumbing', 'Sipil'];
        }

        $data['pesan_sukses'] = $this->session->flashdata('pesan_sukses');
        $data['pesan_gagal']  = $this->session->flashdata('pesan_gagal');

        $this->load->view('form_request_view', $data);
    }

    public function proses_submit()
    {
        $this->load->model('Ticket_model');

        $map_kategori_id = [
            'FUEL'    => 4,
            'CARPOOL' => 5,
            'IT'      => 6,
            'GIM'     => 7,
            'GA'      => 8
        ];

        $kategori_id = isset($map_kategori_id[$kategori]) ? $map_kategori_id[$kategori] : 4;
    
        $kategori = strtoupper($this->input->post('kategori_utama'));
        $sub      = $this->input->post('sub_kategori');
    
        // Upload Foto Lampiran
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
                redirect('request/form/' . strtolower($kategori) . '/' . strtolower($sub));
                return;
            }
        }

    // Olah Sub Kategori
        $sub_kategori_final = $this->input->post('sub_kategori_gim') ?: $sub;

    // Kumpulkan data tambahan untuk dimasukkan ke kolom dynamic_data (JSON)
        $extra_data = [
            'lokasi'        => $this->input->post('location'),
            'detail_lokasi' => $this->input->post('detail_lokasi'),
            'tujuan'        => $this->input->post('tujuan'),
            'titik_jemput'  => $this->input->post('titik_penjemputan'),
            'tanggal'       => $this->input->post('tanggal'),
            'jam'           => $this->input->post('jam'),
            'foto_lampiran' => $nama_foto
        ];

        $data_db = [
            'nomor_tiket'    => 'REQ-' . date('YmdHis') . rand(10,99),
            'pelapor_id'     => $this->input->post('id_user'), // TAMBAHKAN BARIS INI
            'jenis_tiket'    => 'REQUEST',
            'sub_kategori'   => strtoupper($sub_kategori_final),
            'nama_pelapor'   => $this->input->post('nama'),
            'id_karyawan'    => $this->input->post('id_user'),
            'dept_pelapor'   => $this->input->post('departement'),
            ' no_hp'          => $this->input->post('no_hp'),
            'judul_tiket'    => 'REQUEST ' . $kategori . ($sub_kategori_final ? ' - ' . strtoupper($sub_kategori_final) : ''),
            'deskripsi'      => $this->input->post('detail_request') ?: $this->input->post('keperluan'),
            'priority_level' => $this->input->post('prioritas') ?: 'Sedang',
            'status'         => 'OPEN',
            'created_at'     => date('Y-m-d H:i:s'),
            'dynamic_data'   => json_encode($extra_data)
        ];

        $this->Ticket_model->simpan_tiket($data_db);
        $this->session->set_flashdata('pesan_sukses', 'Mantap! Tiket Request (' . $data_db['nomor_tiket'] . ') berhasil disimpan.');
    
        redirect('request/form/' . strtolower($kategori) . '/' . strtolower($sub)); 
    }
}