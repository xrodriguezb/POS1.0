<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subcategory extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('subcategory/index');
        $this->load->view('templates/footer');
    }

    public function get_list()
    {
        $this->load->view('subcategory/get_list');
    }

    public function add_subcategory()
    {
        $this->load->view('templates/header');
        $this->load->view('subcategory/add');
        $this->load->view('templates/footer');
    }
}
