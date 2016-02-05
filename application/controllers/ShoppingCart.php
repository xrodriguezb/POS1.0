<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ShoppingCart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ShoppingCartModel');
        if (! $this->session->userdata('logged_in')) {
            redirect('login', 'index');
        }
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('shoppingcart/index');
        $this->load->view('modals/set_product_discount');
        $this->load->view('templates/footer');
    }

    function get_shopping_cart()
    {
        if ($this->input->is_ajax_request()) {
            $cart_items = $this->ShoppingCartModel->get_items($this->input->post('cart_id'));
            $data['complete_detail'] = $cart_items;
            $formated_items = array();
            $total_amount = 0;
            $total_discount = 0;
            if (is_array($cart_items) && count($cart_items) > 0) {
                $products_SKUs = array();
                foreach ($cart_items as $item) {
                    // var_dump($item);
                    
                    if (! isset($formated_items[$item->producto_sku]['cantidad']))
                        $formated_items[$item->producto_sku]['cantidad'] = 0;
                    $formated_items[$item->producto_sku]['producto'] = $item->producto_sku;
                    $formated_items[$item->producto_sku]['nombre'] = $item->articulo;
                    $formated_items[$item->producto_sku]['cantidad'] += $item->cantidad;
                    $formated_items[$item->producto_sku]['precio'] = $item->precio;
                    $formated_items[$item->producto_sku]['associate_cart_id'] = $this->input->post('cart_id');
                    $total_amount += ($item->precio * $item->cantidad);
                    $formated_items[$item->producto_sku]['producto_id'] = $item->producto_id;
                    $formated_items[$item->producto_sku]['monto'] = $formated_items[$item->producto_sku]['cantidad'] * $item->precio;
                    $total_discount += ($item->precio * (int) $item->porcentaje_descuento) / 100;
                }
            }
            $data['cart_items'] = $cart_items;
            $data['grouped_cart_items'] = $formated_items;
            $data['total_discount'] = number_format($total_discount, 2);
            $data['total_amount'] = number_format(($total_amount - $total_discount), 2);
            $this->load->view('shoppingcart/shopping_cart', $data);
        }
    }

    function add_item()
    {
        if ($this->input->is_ajax_request()) {
            $transaction_response = $this->ShoppingCartModel->add_items_to_cart($this->input->post());
            
            $response_data = array(
                'server_response' => (! $transaction_response) ? 'failed' : 'ok',
                'generated_ids' => $transaction_response
            );
            
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($response_data));
        }
    }

    function delete_item_cart()
    {
        if ($this->input->is_ajax_request()) {
            
            $response_data = array(
                'server_response' => ($this->ShoppingCartModel->delete_item($this->input->post('item_id')) > 0) ? 'ok' : 'failed'
            );
            
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($response_data));
        }
    }

    function finish_sale()
    {
        if ($this->input->is_ajax_request()) {
            $this->output->set_content_type('application/json');
            if ($this->ShoppingCartModel->finish_sale($this->input->post('cart_id'))) {
                $cart_items = $this->ShoppingCartModel->get_items($this->input->post('cart_id'));
                foreach ($cart_items as $_item) {
                    // Calling for magento API : descuentos a inventarios
                }
                $response_data = array(
                    'server_response' => (! $transaction_response) ? 'failed' : 'ok'
                );
                $this->output->set_output(json_encode($response_data));
            }
        }
    }

    function add_discount_to_item_in_cart()
    {
        if ($this->input->is_ajax_request()) {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array(
                'server_response' => (count($this->ShoppingCartModel->add_discount($this->input->post())) > 0) ? 'ok' : 'error'
            )));
        }
    }
}
