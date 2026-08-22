<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

    public function index()
    {
        $this->load->view('opsi_request_view');
    }

    // Sub-menu FUEL (5 Opsi)
    public function fuel_options()
    {
        $this->load->view('opsi_request_fuel_view');
    }

    // Sub-menu CARPOOL (2 Opsi: Reguler / Booking)
    public function carpool_options()
    {
        $this->load->view('opsi_request_carpool_view');
    }

    // Form Handler Dinamis
    public function form($kategori = 'fuel', $sub = '')
    {
        $data['kategori'] = strtoupper($kategori);
        $data['sub']      = strtolower($sub);

        $this->load->view('form_request_view', $data);
    }
}