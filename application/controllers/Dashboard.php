<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (! $this->session->userdata('logged_in')) {
            redirect('login', 'index');
        }
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }
}
