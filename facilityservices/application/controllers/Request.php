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
        $kategori = $this->input->post('kategori_utama');
        $sub      = $this->input->post('sub_kategori');

        if (empty($_FILES['foto']['name'])) {
            $this->session->set_flashdata('pesan_gagal', 'Wajib melampirkan foto bukti!');
            redirect('request/form/' . strtolower($kategori) . '/' . strtolower($sub)); 
            return; 
        }

        $config['upload_path']   = './uploads/'; 
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 5120; 
        $config['encrypt_name']  = TRUE; 

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $this->session->set_flashdata('pesan_sukses', "Mantap! Tiket REQUEST " . strtoupper($kategori) . " berhasil dikirim.");
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Gagal upload foto: ' . $this->upload->display_errors('',''));
        }

        redirect('request/form/' . strtolower($kategori) . '/' . strtolower($sub)); 
    }
}