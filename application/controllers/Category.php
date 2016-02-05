<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('category/index');
        $this->load->view('templates/footer');
    }

    public function get_list()
    {
        sleep(1);
        // Calling for Magento API
        $data['category_list'] = array(
            array(
                'id' => 1,
                'name' => 'Category test 1',
                'active' => 'Si',
                'description' => 'Description for category 1'
            )
        );
        $this->load->view('category/get_list', $data);
    }

    public function add_category()
    {
        $this->load->view('templates/header');
        $this->load->view('category/add');
        $this->load->view('templates/footer');
    }
}
