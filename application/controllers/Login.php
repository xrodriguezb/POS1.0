<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    public function index()
    {
        $this->load->view('login/index');
    }

    function check()
    {
        if ($this->input->is_ajax_request()) {
            $this->output->set_content_type('application/json');
            $loged_info = $this->LoginModel->check($this->input->post());
            $this->output->set_output(json_encode(array(
                'response' => (count($loged_info) > 0) ? 'ok' : 'error'
            )));
            if (count($loged_info) > 0)
                $this->session->set_userdata('logged_in', $loged_info);
        }
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'index');
    }
}
