<?php

class ProductModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function add($data = null)
    {
        if (is_null($data) || count($data) < 0 || ! is_array($data))
            return FALSE;
        try {
            $this->db->insert('cn_producto', $data);
            return ($this->db->insert_id() > 0) ? TRUE : FALSE;
        } catch (Exception $e) {
            return FALSE;
        }
    }

    function add_discount($data = null)
    {
        if (is_null($data) || count($data) < 0 || ! is_array($data))
            return FALSE;
        try {
            $this->db->insert('cn_producto_descuentos', $data);
            return ($this->db->insert_id() > 0) ? TRUE : FALSE;
        } catch (Exception $e) {
            return FALSE;
        }
    }

    function get_discount_list($producto_id = null)
    {
        if (is_null($producto_id) || (int) $producto_id === 0)
            return FALSE;
        try {
            $query = $this->db->get_where('cn_producto_descuentos', array(
                'producto_id' => $producto_id
            ));
            return $query->result();
        } catch (Exception $e) {
            return FALSE;
        }
    }

    function update($data = null)
    {
        if (is_null($data) || count($data) < 0 || ! is_array($data))
            return FALSE;
        try {
            $id = $data['id'];
            unset($data['id']);
            $this->db->where('id', $id);
            return $this->db->update('cn_producto', $data);
        } catch (Exception $e) {
            return FALSE;
        }
    }

    function get($id = null)
    {
        if (is_null($id) || (int) $id === 0)
            return FALSE;
        try {
            $query = $this->db->get_where('cn_producto', array(
                'id' => $id
            ));
            return $query->result();
        } catch (Exception $e) {
            return FALSE;
        }
    }

    function get_by_magento_sku($sku = null)
    {
        if (is_null($sku) || strlen(trim($sku)) <= 0)
            return FALSE;
        try {
            $query = $this->db->get_where('cn_producto', array(
                'magento_sku' => $sku,
                'activo' => 'Si'
            ));
            return $query->result();
        } catch (Exception $e) {
            return FALSE;
        }
    }

    function get_list()
    {
        try {
            $query = $this->db->get('cn_producto');
            return $query->result();
        } catch (Exception $e) {
            return FALSE;
        }
    }

    function update_discount($data = null)
    {
        if (is_null($data) || count($data) < 0 || ! is_array($data))
            return FALSE;
        try {
            $this->db->where(array(
                'id' => $data['discount_id']
            ));
            $this->db->limit(1);
            $this->db->update('cn_producto_descuentos', array(
                'activo' => $data['discount_active'],
                'nombre_descuento' => $data['discount_name'],
                'porcentaje_descuento' => $data['discount_percent']
            ));
            return $this->db->affected_rows();
        } catch (Exception $e) {
            return FALSE;
        }
    }
}