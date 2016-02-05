<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('client/index');
        $this->load->view('templates/footer');
    }

    public function get_list()
    {
        $this->load->view('client/get_list');
    }
}
