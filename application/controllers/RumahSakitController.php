<?php

class RumahSakitController extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        // load RumahSakitModel
        $this->load->model('RumahsakitModel');

    }

    public function index()
    {
    	$data['judul'] = 'Rumah Sakit';
        $data['user'] = $this->session->userdata('user');

        $this->load->view('templates/header', $data);
        $this->load->view('RumahSakit/index', $data);
        $this->load->view('templates/footer');
    }
	
    public function create()
    {
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('alamat','alamat','required');
        $this->form_validation->set_rules('notelp','notelp','required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Rumah Sakit';

            $this->load->view('templates/header', $data);
            $this->load->view('RumahSakit/create');
            $this->load->view('templates/footer');
        } else {
            $this->RumahSakitModel->addRumahSakit();
            // load rscon
            redirect('RumahSakitController');
        }

    }
}
