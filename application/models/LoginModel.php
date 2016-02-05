<?php

class LoginModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function check($data = null)
    {
        if (is_null($data) || count($data) == 0)
            return FALSE;
        try {
            $query = $this->db->get_where('cn_usuarios', array(
                'usuario' => $data['usuario'],
                'password' => $data['password']
            ));
            return $query->result();
        } catch (Exception $e) {
            return FALSE;
        }
    }

    
}
