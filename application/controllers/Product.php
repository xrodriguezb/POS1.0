<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductModel');
        if (! $this->session->userdata('logged_in')) {
            redirect('login', 'index');
        }
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('product/index');
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        $data['product_detail'] = $this->ProductModel->get($id);
        $this->load->view('templates/header');
        $this->load->view('product/edit', $data);
        $this->load->view('modals/edit_discount');
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->load->view('templates/header');
        $this->load->view('product/add');
        $this->load->view('templates/footer');
    }

    function update()
    {
        if ($this->input->is_ajax_request()) {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array(
                'response' => ($this->ProductModel->update($this->input->post())) ? 'ok' : 'error'
            )));
        }
    }

    public function get_list()
    {
        if ($this->input->is_ajax_request()) {
            $data['product_list'] = $this->ProductModel->get_list();
            $this->load->view('product/list', $data);
        }
    }

    public function get_discounts($is_view = TRUE)
    {
        if ($this->input->is_ajax_request()) {
            $discount_list = $this->ProductModel->get_discount_list($this->input->post('producto_id'));
            if ($is_view) {
                $data['discount_list'] = $discount_list;
                $this->load->view('product/discount_list', $data);
            } else {
                $this->output->set_content_type('application/json');
                $html_options = '<option value="0">Ninguno</option>';
                if (count($discount_list) > 0) {
                    foreach ($discount_list as $_dl) {
                        if ($_dl->activo == "Si")
                            $html_options .= '<option value="' . $_dl->id . '">' . $_dl->porcentaje_descuento . '% (' . $_dl->nombre_descuento . ')</option>';
                    }
                }
                $this->output->set_output(json_encode(array(
                    'response' => $discount_list,
                    'html' => $html_options
                )));
            }
        }
    }

    public function add_discount()
    {
        if ($this->input->is_ajax_request()) {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array(
                'response' => ($this->ProductModel->add_discount($this->input->post())) ? 'ok' : 'error'
            )));
        }
    }

    public function update_discount()
    {
        if ($this->input->is_ajax_request()) {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array(
                'server_response' => (count($this->ProductModel->update_discount($this->input->post())) > 0) ? 'ok' : 'error'
            )));
        }
    }

    function create_new_product()
    {
        if ($this->input->is_ajax_request()) {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array(
                'response' => ($this->ProductModel->add($this->input->post())) ? 'ok' : 'error'
            )));
        }
    }
    // Metodos para Venta
    function get_product_by_sku()
    {
        if ($this->input->is_ajax_request()) {
            // Calling for Magento API?
            
            $product_data = $this->ProductModel->get_by_magento_sku($this->input->post('barcode'));
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array(
                'request_response' => (count($product_data) > 0) ? 'OK' : 'NOT_FOUND',
                'product' => (isset($product_data[0])) ? $product_data[0] : array()
            )));
        }
    }
}
